<?php session_start(); ?>

<?php 


$_SESSION['name'] = NULL;
$_SESSION['username'] = NULL;
$_SESSION['email'] = NULL;
$_SESSION['user_type'] = NULL;

header("Location: ../index.php")

?>