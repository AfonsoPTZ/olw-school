<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}


session_unset();
session_destroy();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
    echo json_encode(['success' => true]);
    exit;
}



header("Location: /owl-school/public/index.php");
exit;
