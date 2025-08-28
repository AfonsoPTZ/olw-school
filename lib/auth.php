<?php
session_start();                                          // Inicia sessão para usar $_SESSION

function is_logged_in(): bool {                            // Verifica se há usuário logado
    return isset($_SESSION['user']);                       // Retorna true se existir
}

function require_login(?string $role = null): void {       // Exige login (e papel opcional)
    if (!is_logged_in() || ($role && $_SESSION['user']['role'] !== $role)) { // Falhou?
        header('Location: index.php?error=auth');          // Redireciona para login com erro
        exit;                                              // Para execução
    }
}

function current_user(): ?array {                          // Retorna dados do usuário logado
    return $_SESSION['user'] ?? null;                      // Ou null se não houver
}
