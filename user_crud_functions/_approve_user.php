<?php

    include '../db/connection.php';

    $id = $_GET['id'];
    $level = $_GET['level'];

    if ($level == 1) {
        
        $update = "UPDATE users SET status= 'Ativo', user_level = 1 WHERE id_user = $id";
        $modify = mysqli_query($connection, $update);
        echo "ADMINISTRADOR APROVADO";
    }

    if ($level == 2) {
        
        $update = "UPDATE users SET status= 'Ativo', user_level = 2 WHERE id_user = $id";
        $modify = mysqli_query($connection, $update);
        echo "FUNCIONÁRIO APROVADO";
    }

    if ($level == 3) {
        
        $update = "UPDATE users SET status= 'Ativo', user_level = 3 WHERE id_user = $id";
        $modify = mysqli_query($connection, $update);
        echo "CONFERENTE APROVADO";
    }

    header("Location: ../users_approval.php"); // Redirect to the approval page


?>