<?php
session_start();
unset($_SESSION['prometheus']);
header('Location: index.php');
?>