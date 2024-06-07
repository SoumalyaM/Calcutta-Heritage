<?php 
require "stripe-php/init.php"; 
require "includes/db.php";

$publishable_key="pk_test_51POOuS01dKe8QDzvMGbePet43h1AqcdoCzg87hcaLFZrkJ33MdI1kZzlHXp0v2D47VIlUjj0dXBKGl4JCdvEyGno00fOrz9gYJ";
$secret_key="sk_test_51POOuS01dKe8QDzvramXL7pyRpXgmAKIr6plocDhZ4kLSqxTW1UnNb3r24mKUpfhoXMPoWPYH54rdoe4ZBLEAxUh00hulz2lAz";


\Stripe\Stripe::setApiKey($secret_key);
?>

