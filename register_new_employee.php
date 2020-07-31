<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulário de Cadastro</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js" data-auto-a11y="true"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
        <script>
            // Cpf Mask
            $(document).ready(function () { 
                var $seuCampoCpf = $("#CPF");
                $seuCampoCpf.mask('000.000.000-00', {reverse: true});
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
                header('Location: index.php'); // Salvar este código em todas as páginas.
            }

            include 'db/connection.php';

            // Controls what each user level can access
            $sql = "SELECT user_level FROM users WHERE user_mail = '$user' and status='Ativo'";
            $search = mysqli_query($connection, $sql);
            $array = mysqli_fetch_array($search);
            $level = $array['user_level'];

        ?>
           
            <div class="row">

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

                <div class="col-sm-12 pl-0 pr-0 border border-dark border-5 rounded-top">
                    <div class="card">
                        <div class="card-title text-dark p-1 mb-2 border-0 bg-light">
                            <h3 class="text-center text-sm">Cadastro de Funcionário</h3>
                        </div>
                        <!-- Register Form -->
                        <div class="card-body">
                            <form action="employee_crud_functions/_insert_employee.php" method="post" style="margin-top: 2rem;">
                                <div class="form-group">
                                    <label class="sr-only" for="name">Nome</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">Nome</div>
                                        </div>
                                        <input type="text" class="form-control" name="name" placeholder="Informe o nome completo" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="sr-only" for="name">E-mail</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">E-mail</div>
                                        </div>
                                        <input type="email" class="form-control" name="email" placeholder="Informe apenas um e-mail" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="sr-only" for="re">Registro do Funcionário</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">Registro do Funcionário</div>
                                        </div>
                                        <input type="number" class="form-control" name="re" placeholder="Informe o registro acadêmico" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="sr-only" for="name">CPF</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">CPF</div>
                                        </div>
                                        <input type="text" class="form-control" name="cpf" id="CPF" placeholder="Informe o número do documento" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="sr-only" for="address">Endereço</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">Endereço</div>
                                        </div>
                                        <input type="text" class="form-control" name="address" placeholder="Informe o endereço" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="sr-only" for="role">Função</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">Função</div>
                                        </div>
                                        <input type="text" class="form-control" name="role" placeholder="Informe a função ocupada" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="sr-only" for="department">Departamento</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">Departamento</div>
                                        </div>
                                        <select class="form-control" name="department">
                                            <option selected disabled >Selecione um departamento</option>
                                            <option> Administrativo </option>
                                            <option> Comercial </option>
                                            <option> Compras </option>
                                            <option> Desenvolvimento </option>
                                            <option> Financeiro </option>
                                            <option> Produção </option>
                                            <option> Recursos Humanos </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="sr-only" for="admission_date">Data de Admissão</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">Data de Admissão</div>
                                        </div>
                                        <input type="date" class="form-control" name="admission_date" value="<?php echo $admission_date ?>">
                                    </div>
                                </div>

                                <div class="buttons">
                                    <button type="reset" class="btn btn-danger btn-lg w-10 button-cancel"><a href="list_employee.php"> Cancelar </a></button>
                                    <button type="submit" class="btn btn-success btn-lg w-10"> Salvar </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</html>