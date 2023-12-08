<?php
session_start();
    unset($_SESSION['Email_U']);
    unset($_SESSION['Senha_U']);
    header('location: Index.html');
?>