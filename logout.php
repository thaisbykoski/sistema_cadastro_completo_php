<?php
    /* Destroys the session and redirects the user to the index.php page */
    
    session_start();
    session_unset();
	session_destroy();
    header("Location: index.php");
    
?>