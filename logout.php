<?php
session_start();
// session_destroy();
if (isset($_SESSION['session_id'])) {
    unset($_SESSION['session_id']);
}

$_SESSION['warning'] = ' <strong>Goodbye!</strong> You are no longer logged in';
header('Location: index.php');
