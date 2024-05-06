<?php

session_start();
if (!isset($_SESSION['Firstname'])) {
    header('Location: ' . 'login.php');
};

session_destroy();

header("Location: ./login.php");
exit;