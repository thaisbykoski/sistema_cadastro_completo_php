<?php

    include '../db/connection.php';

    $id = $_GET['id'];

    $delete = "DELETE FROM users WHERE id_user = $id";

    $row = mysqli_query($connection, $delete);

    header("Location: ../users_approval.php"); // Redirect to the approval page


?>