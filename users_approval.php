<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Aprovar Usuário</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js" data-auto-a11y="true"></script>
        <script>
            $(function(){
                $("#btn-mensagem").click(function(){
                    $("#modal-message").modal();
                });
            });
        </script> 
    </head>

    <body>
        <div class="container mb-3">

        <?php

            // Checks if the user is logged in
            session_start();
            $user = $_SESSION['user'];

            if (!isset($_SESSION['user'])) {
                header('Location: index.php');
            }

            include 'db/connection.php';

            // Controls what each user level can access
            $sql = "SELECT user_level FROM users WHERE user_mail = '$user' and status='Ativo'";
            $search = mysqli_query($connection, $sql);
            $array = mysqli_fetch_array($search);
            $level = $array['user_level'];

        ?>

            <!-- Menu -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="home.php"><i class="fas fa-home"></i> Home</a>
                        </li>

                        <?php

                            // User Level
                            if(($level == 1)||($level == 2)) {
                                
                        ?>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-plus-square" style="color: green;"></i>
                            Cadastros
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="register_new_employee.php">Adicionar Funcionário</a>
                            </div>
                        </li>
                        <?php  } ?>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search" style="color: blue;"></i>
                            Consultar
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="list_employee.php">Lista de Funcionários</a>
                            </div>
                        </li>

                        <?php 

                            // User Level
                            if(($level == 1)) {
                        ?>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user" style="color: #000;"></i>
                                Usuários
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="user_registration.php">Cadastrar Usuário</a>
                                <a class="dropdown-item" href="users_approval.php">Aprovar Usuário</a>
                            </div>
                        </li>

                        <?php } ?>
                    </ul>       
                </div>
                <div class="buttons">
                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-item" style="text-align: right;">
                            <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt" style="color: red;"></i> Sair</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End of Menu -->

            <div class="row">
                <div class="col-sm-12 pl-0 pr-0 border border-dark border-5 rounded-top">
                    <div class="card">
                        <!-- Department Lookup Table  -->
                        <div class="card-body">
                            <div class="card-title text-dark p-1 mb-2 border-0 bg-light">
                                <h3 class="text-center text-sm">Aprovação de Usuários</h3>
                            </div>
                            <table class="table table-striped" >
                                <thead class="thead-list" style="background-color: #C6E2FF;">
                                    <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Nível</th>
                                    <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tr>
                                <?php
                                
                                    $sql = "SELECT * FROM `users` WHERE status = 'Inativo'";
                                    $search = mysqli_query($connection,$sql);

                                    while ($array = mysqli_fetch_array($search)) {
                                        $id_user = $array['id_user'];
                                        $user_name = $array['user_name'];
                                        $mail = $array['user_mail'];
                                        $level = $array['user_level'];

                                ?>
                                    <td><?php echo $user_name ?></td>
                                    <td><?php echo $mail ?></td>
                                    <td><?php echo $level ?></td>
                                    <!-- <td>
                                       
                                    </td> -->

                                    <td> 
                                        <a class="btn btn-success btn-sm" style="color:#fff;" href="_approve_user.php?id=<?php echo $id_user ?>&level=1" role="button"><i class="far fa-smile-beam"></i> Administrador </a>
                                        <a class="btn btn-warning btn-sm" style="color:#fff;" href="_approve_user.php?id=<?php echo $id_user ?>&level=2" role="button"><i class="far fa-smile-beam"></i> Funcionário </a>
                                        <a class="btn btn-dark btn-sm" style="color:#fff;" href="_approve_user.php?id=<?php echo $id_user ?>&level=3" role="button"><i class="far fa-smile-beam"></i> Conferente </a>


                                        
                                        <a class="btn btn-danger btn-sm" href="#" role="button" href="#" onclick="javascript: if (confirm('Você realmente deseja excluir este registro?'))location.href='_delete_user.php?id=<?php echo $id_user ?>'"><i class="far fa-trash-alt"></i> Excluir</a>                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</html>