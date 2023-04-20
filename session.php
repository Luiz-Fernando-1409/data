<?php
    session_start();
    if(isset($_GET['logout']) && $_GET['logout']==1){
        session_destroy();
        unset($_SESSION);
        header('location:index.php');
    }
    if(!isset($_SESSION['user']))      
        header('location:index.php');
?>