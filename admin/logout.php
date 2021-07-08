<?php
session_start();

if (isset($_SESSION['user']) && $_SESSION['user'] == 'admin') {
    unset($_SESSION['user']);
    header('Location: index.php');
}
