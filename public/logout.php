<?php
// owl-school/public/logout.php
declare(strict_types=1);
if (session_status() !== PHP_SESSION_ACTIVE) { session_start(); }
$_SESSION = [];
session_destroy();
header("Location: ./index.php");
exit;
