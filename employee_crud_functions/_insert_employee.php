<?php

    include '../db/connection.php';

    //Receives the attribute value
    $name = $_POST['name'];
    $email = $_POST['email'];
    $re = $_POST['re'];
    $cpf = $_POST['cpf'];
    $address = $_POST['address'];
    $role = $_POST['role'];
    $department = $_POST['department'];
    $admission_date = $_POST['admission_date'];
    
    $sql = "INSERT INTO `employees`(`name`, `email`, `re`, `cpf`, `address`, `role`, `department`, `admission_date`) VALUES ('$name','$email',$re,'$cpf','$address', '$role', '$department', '$admission_date')";


    $insert = mysqli_query($connection,$sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Confirmação de Cadastro</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style.css">
        <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js" data-auto-a11y="true"></script>
    </head>

    <body>

        <?php

            // Checks if the user is logged in
            session_start();
            $user = $_SESSION['user'];

            if (!isset($_SESSION['user'])) {
                header('Location: ../index.php');
            }

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
                            <a class="nav-link" href="../home.php"><i class="fas fa-home"></i> Home</a>
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
                                <a class="dropdown-item" href="../register_new_employee.php">Adicionar Funcionário</a>
                            </div>
                        </li>
                        <?php  } ?>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search" style="color: blue;"></i>
                            Consultar
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="../list_employee.php">Lista de Funcionários</a>
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
                                <a class="dropdown-item" href="../user_registration.php">Cadastrar Usuário</a>
                                <a class="dropdown-item" href="../users_approval.php">Aprovar Usuário</a>
                            </div>
                        </li>

                        <?php } ?>
                    </ul>       
                </div>
                <div class="buttons">
                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-item" style="text-align: right;">
                            <a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt" style="color: red;"></i> Sair</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End of Menu -->

            <div class="row">
                <!-- Confirmation Card -->
                <div class="col-sm-12 pl-0 pr-0 border border-dark border-5 rounded-top">
                    <div class="card text-center del-conf border-success h-50">
                        <img class="card-img-top img-ok rounded float-left" src="../img/ok.png" alt="Imagem de capa do card">
                        <div class="card-body">
                            <h5 class="card-title border-0" style="margin-bottom: 10px;">Funcionário cadastrado com sucesso!</h5>
                            <div class="return-button">
                                <a href="../register_new_employee.php" role="button" class="btn btn-lg btn-primary"> Cadastrar novo Funcionário </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap Script -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</html>