<?php
require __DIR__ . '/lib/db.php';                   // Importa a conexão

$pdo = get_pdo();                                   // Abre o banco

$pdo->exec("                                       // Cria tabela se não existir
CREATE TABLE IF NOT EXISTS users (
  id INTEGER PRIMARY KEY AUTOINCREMENT,            -- ID auto
  name TEXT NOT NULL,                              -- Nome
  email TEXT NOT NULL,                             -- Email
  password_hash TEXT NOT NULL,                     -- Hash da senha
  role TEXT NOT NULL CHECK(role IN ('aluno','professor','responsavel')), -- Papel
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,   -- Data criação
  UNIQUE(email, role)                              -- Email+papel único
);
");

function seed($pdo, $name, $email, $pass, $role) { // Função para inserir exemplo
    $hash = password_hash($pass, PASSWORD_DEFAULT);// Gera hash da senha
    $stmt = $pdo->prepare(                         // Prepara INSERT
        "INSERT OR IGNORE INTO users (name,email,password_hash,role) VALUES (?,?,?,?)"
    );
    $stmt->execute([$name, $email, $hash, $role]); // Executa com dados
}

seed($pdo, 'Alice Aluna', 'aluno@teste.com', '123456', 'aluno');         // Usuário demo
seed($pdo, 'Pedro Professor', 'prof@teste.com', '123456', 'professor');  // Usuário demo
seed($pdo, 'Rita Responsável', 'resp@teste.com', '123456', 'responsavel');// Usuário demo

echo "Banco inicializado! <a href='index.php'>Ir para o login</a>";     // Mensagem final
