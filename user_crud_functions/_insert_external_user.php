<!-- <?php

    include '../db/connection.php';
    include '../script/password.php';

    $username = $_POST['username'];
    $mail = $_POST['usermail'];
    $password = $_POST['userpassword'];
    $status = 'Inativo';

    $sql = "INSERT INTO users ( user_name, user_mail, user_password, status) VALUES ('$username','$mail',sha1('$password'),'$status')";

    $insert = mysqli_query($connection, $sql);

?> -->

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

        <div class="container mb-3">

            <div class="row">
                <!-- Confirmation Card -->
                <div class="col-sm-12 pl-0 pr-0 border border-dark border-5 rounded-top">
                    <div class="card text-center del-conf border-success h-50">
                        <img class="card-img-top img-ok rounded float-left" src="../img/ok.png" alt="Imagem de capa do card">
                        <div class="card-body">
                            <h5 class="card-title border-0" style="margin-bottom: 10px;">Usuário Cadastrado com Sucesso, esperando aprovação.</h5>
                            <div class="return-button">
                                <a href="../index.php" role="button" class="btn btn-lg btn-primary"> Cadastrar novo Usuário </a>
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
