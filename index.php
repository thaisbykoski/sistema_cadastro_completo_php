<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title>Login</title>
</head>
<body>

    <div class="container mb-3 screen-login">
        <div style="padding:10px;">
            <center>
                <img src="img/lock.png" alt="" width="125px" height="125px">
            </center>
            
            <form action="index1.php" method="post">
                <div class="form-group">
                    <label for="user"> Usuário </label>
                    <input type="text" name="user" class="form-control" placeholder="Usuário" autocomplete="off" required>
                </div>
                <div class="form-group">
                    <label for="password"> Senha </label>
                    <input type="password" name="password" class="form-control" placeholder="Senha" autocomplete="off" required>
                </div>
                
                <div class="buttons">
                    <button type="submit" class="btn btn-lg btn-success">Entrar</button>
                </div>
            </form>
        </div>
    </div>
    
    <center class="mb-5" style="color: #fff">
        <p> Você não possui cadastro? Clique <a href="external_user_registration.php" style="color: #FFFF00; font-weight: 500;">aqui</a></p>
    </center>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


</body>
</html>