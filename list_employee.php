<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Consulta de Funcionários</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
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
        <div class="container mb-3">

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
                        <div class="card-title text-dark p-1 mb-2 border-0 bg-light">
                            <h1 class="text-center text-sm">Consulta de Funcionários</h1>
                        </div>

                        <!-- Employee Lookup Table  -->
                        <div class="card-body">
                            <table class="table table-striped" id="myTable">
                                <thead class="thead-list" style="background-color: #C6E2FF;">
                                    <tr>
                                    <th scope="col">Registro do Funcionário</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Cargo</th>
                                    <th scope="col">Departamento</th>
                                    <th scope="col">Data de Admissão</th>
                                    <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tr>
                                <?php
                                
                                    $sql = "SELECT * FROM `employees` order by 'name' ASC";
                                    $search = mysqli_query($connection,$sql);

                                    while ($array = mysqli_fetch_array($search)) {
                                        $id_employee = $array['id_employee'];
                                        $re = $array['re'];
                                        $name = $array['name'];
                                        $role = $array['role'];
                                        $department = $array['department'];
                                        $admission_date = $array['admission_date'];
                                ?>
                                    <td><?php echo $re ?></td>
                                    <td><?php echo $name ?></td>
                                    <td><?php echo $role ?></td>
                                    <td><?php echo $department ?></td>
                                    <td><?php echo $admission_date ?></td>
                                    <td> 
                                        <?php
                                            if(($level == 1)||($level == 2)) {
                                        ?>

                                            <a href="employee_crud_functions/_edit_employee.php?id=<?php echo $id_employee ?>" role="button" class="btn btn-warning btn-sm"><i class="far fa-edit"></i> Editar</a>
                                        
                                        <?php }

                                            if(($level == 1)) {
                                        ?>

                                            <a href="#" role="button" href="#" onclick="javascript: if (confirm('Você realmente deseja excluir este registro?'))location.href='employee_crud_functions/_delete_employee.php?id=<?php echo $id_employee ?>'" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Excluir</a>
                                        
                                        <?php }  ?>                               
                                    
                                    </td>
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