<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

        <div class="container registration">
            <div style="padding:10px;">
                <div class="card-header mb-3 text-center">
                    <h1> Cadastro de Usuário </h1>
                </div>
                <div class="buttons">
                    <a href="index.php" role="button" class="btn btn-sm btn-primary" style="width:8vw; font-size: 1rem"> Voltar </a>
                </div>
                <center>
                    <img src="img/user.png" alt="" width="125px" height="125px">
                </center>
                <div class="card-body">
                    <form action="user_crud_functions/_insert_external_user.php" method="POST">
                        <div class="form-group">
                            <label> Nome do Usuário </label>
                            <input type="text" name="username" class="form-control" required autocomplete="off" placeholder="Nome Completo">
                        </div>

                        <div class="form-group">
                            <label> E-mail </label>
                            <input type="email" name="usermail" class="form-control" required autocomplete="off" placeholder="Seu E-mail">
                        </div>

                        <div class="form-group">
                            <label> Senha do Usuário </label>
                            <input id="txtPassword" type="password" name="userpassword" class="form-control" required autocomplete="off" placeholder="Senha">
                        </div>

                        <div class="form-group">
                            <label> Repetir Senha </label>
                            <input type="password" name="userpassword2" class="form-control" required autocomplete="off" placeholder="Repetir Senha" oninput="validPassword(this)">
                            <small> Precisa ser igual a senha digitada acima. </small>
                        </div>

                        <div class="buttons">
                            <button type="submit" class="btn btn-lg btn-success"> Cadastrar </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

        <script>
            function validPassword (input){ 
                if (input.value != document.getElementById('txtPassword').value) {
                input.setCustomValidity('Repita a senha corretamente');
                } else {
                    input.setCustomValidity('');
                }
            } 
        </script>
    </body>
</html>

