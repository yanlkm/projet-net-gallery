
<?php 
session_start();

    unset($_SESSION['login']);
    unset($_SESSION['mdp']);
    session_destroy();
    header("Location:session.php");
?>

