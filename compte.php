<?php 
session_start(); 
require 'inc/function.php';

?>

<?php require 'inc/header.php'; ?>

    <div class="container-fluid">
        <h1>Votre compte</h1>

        <p class="alert alert-success">Votre compte à été crée avec success cliquer <a href="#">ICI</a></p>
    </div>
    
    
    <?php debug($_SESSION); ?>

<?php require 'inc/footer.php'; ?>