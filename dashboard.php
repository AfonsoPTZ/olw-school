<?php
// Carrega helpers de autenticação (start da sessão, etc)
require __DIR__ . '/lib/auth.php';
// Exige que o usuário esteja logado (qualquer papel)
require_login(null);
// Pega os dados do usuário logado da sessão
$u = current_user();
// Guarda o papel (aluno|professor|responsavel)
$role = $u['role'];
// Define o título da página (vai pro <title>)
$title = 'Dashboard — ' . ucfirst($role);
?>

<?php
// Inclui o cabeçalho HTML compartilhado (abre <html><head><body><div class="container">)
include __DIR__ . '/partials/header.php';
?>

<!-- Barra superior com nome/email e ações -->
<div class="d-flex justify-content-between align-items-center mb-3">
  <!-- Mostra nome e email do usuário logado -->
  <h4 class="mb-0">Bem-vindo, <?= htmlspecialchars($u['name']) ?> (<?= htmlspecialchars($u['email']) ?>)</h4>
  <!-- Botões do canto direito -->
  <div class="d-flex gap-2">
    <?php if ($role === 'professor'): // Mostra atalho só para professor ?>
      <a class="btn btn-outline-primary btn-sm" href="list_users.php">Ver usuários</a>
    <?php endif; ?>
    <a class="btn btn-outline-secondary btn-sm" href="logout.php">Sair</a>
  </div>
</div>

<?php if ($role === 'aluno'): // Bloco específico: Aluno ?>
  <!-- Alerta azul indicando a seção do aluno -->
  <div class="alert alert-primary">Painel do Aluno</div>
  <!-- Lugar para listar as tarefas do aluno -->
  <p class="text-muted">Aqui você vai listar <strong>tarefas</strong>, prazos e status do aluno.</p>

<?php elseif ($role === 'professor'): // Bloco específico: Professor ?>
  <!-- Alerta verde indicando a seção do professor -->
  <div class="alert alert-success">Painel do Professor</div>
  <!-- Lugar para criar tarefa e gerenciar -->
  <p class="text-muted">Aqui entra o <strong>formulário de criar tarefa</strong> e gerenciamento de alunos/turmas.</p>

<?php elseif ($role === 'responsavel'): // Bloco específico: Responsável ?>
  <!-- Alerta amarelo indicando a seção do responsável -->
  <div class="alert alert-warning">Painel do Responsável</div>
  <!-- Lugar para notificações do(s) filho(s) -->
  <p class="text-muted">Aqui você exibirá as <strong>notificações</strong> sobre o(s) aluno(s) associado(s).</p>

<?php else: // Caso improvável: papel desconhecido ?>
  <!-- Alerta cinza para estados inesperados -->
  <div class="alert alert-secondary">Papel desconhecido.</div>
<?php endif; ?>

<?php
// Inclui o rodapé HTML compartilhado (fecha container/body/html)
include __DIR__ . '/partials/footer.php';
