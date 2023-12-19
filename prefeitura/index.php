<?php
session_start();

if (isset($_SESSION['id'])) {
    header('Location: inicial.php');
    exit();

} else {
    header('Location: login.php');
}
?>