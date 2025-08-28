<?php
require __DIR__ . '/lib/auth.php';     // Garante sessão carregada
session_destroy();                      // Apaga a sessão inteira
header('Location: index.php');         // Volta para o login
exit;                                   // Encerra a execução
