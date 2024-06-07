<?php
session_start();
include "../includes/db.php"; 
session_destroy();

// header('Location: ' . ROOT_URL);
header('Location: ' . $_SERVER['HTTP_REFERER']);
die();