<?php

    include 'db/connection.php';
    include 'script/password.php';

    $user = $_POST['user'];
    $userpassword = $_POST['password'];

    $sql = "SELECT user_mail,user_password FROM users WHERE user_mail = '$user' and status='Ativo'";

    $search = mysqli_query($connection,$sql); 

    $total = mysqli_num_rows($search);

    while ($array = mysqli_fetch_array($search)) {
        
        $password = $array['user_password'];

        $encryptedpassword = sha1($userpassword); 
        
        
        
        if ($total > 0) {
            
            if ($encryptedpassword == $password) {
                

                session_start();
                $_SESSION['user'] = $user;
                header('Location: home.php');

            } else {
                
                header('Location: error.php');
            
            }
                    
        } else {
            
            header('Location: error.php');
        }
        
    }


?>