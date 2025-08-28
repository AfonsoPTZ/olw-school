<?php
// Inicia a sessão (necessário para guardar o usuário logado)
session_start();
// Importa a conexão com o banco (PDO SQLite)
require __DIR__ . '/lib/db.php';

// Lê os campos enviados pelo formulário de login
$email = trim($_POST['email'] ?? '');   // Email
$password = $_POST['password'] ?? '';   // Senha
$role = $_POST['role'] ?? '';           // Papel escolhido (aluno|professor|responsavel)

// Validação básica: todos os campos são obrigatórios
if ($email === '' || $password === '' || $role === '') {
    // Se faltar algo, volta para o login com erro
    header('Location: index.php?error=missing');
    exit;
}

// Abre a conexão com o SQLite
$pdo = get_pdo();
// Prepara consulta segura (evita SQL Injection)
$stmt = $pdo->prepare("SELECT * FROM users WHERE email=? AND role=? LIMIT 1");
// Executa com os parâmetros informados
$stmt->execute([$email, $role]);
// Busca o usuário correspondente
$user = $stmt->fetch();

// Se não encontrou usuário ou a senha não confere
if (!$user || !password_verify($password, $user['password_hash'])) {
    // Redireciona de volta com erro de credenciais
    header('Location: index.php?error=invalid');
    exit;
}

// Guarda todos os dados do usuário na sessão
$_SESSION['user'] = $user;

// Redireciona SEMPRE para o dashboard (uma página única)
header('Location: dashboard.php');
exit; // Finaliza a execução
