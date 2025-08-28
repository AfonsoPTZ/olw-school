<?php
require __DIR__ . '/lib/db.php';                             // Conexão

$name = trim($_POST['name'] ?? '');                          // Lê nome
$email = trim($_POST['email'] ?? '');                        // Lê email
$pass = $_POST['password'] ?? '';                            // Lê senha
$role = $_POST['role'] ?? '';                                // Lê papel

if ($name=='' || $email=='' || $pass=='' || $role=='') {     // Validação simples
  header('Location: register.php?err=Preencha todos os campos'); exit;
}

try {
  $pdo = get_pdo();                                          // Abre banco
  $hash = password_hash($pass, PASSWORD_DEFAULT);            // Gera hash da senha
  $stmt = $pdo->prepare("INSERT INTO users (name,email,password_hash,role) VALUES (?,?,?,?)"); // Prepara INSERT
  $stmt->execute([$name,$email,$hash,$role]);                // Executa com dados
  header('Location: register.php?ok=1');                     // Sucesso
} catch (PDOException $e) {
  header('Location: register.php?err=Erro no cadastro');     // Erro genérico (pode melhorar)
}
