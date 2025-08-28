<?php
require __DIR__ . '/lib/auth.php';                           // Auth (require_login)
require_login('professor');                                  // Restringe a professor
require __DIR__ . '/lib/db.php';                             // Conexão
$pdo = get_pdo();                                            // Abre banco
$users = $pdo->query("SELECT id,name,email,role,created_at FROM users ORDER BY id DESC")->fetchAll(); // Lista usuários
?>
<!doctype html>
<html lang="pt-br" data-bs-theme="light">
<head>
  <meta charset="utf-8">
  <title>Usuários</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap -->
</head>
<body class="bg-light p-4">
<div class="container">
  <div class="d-flex justify-content-between align-items-center mb-3"> <!-- Cabeçalho -->
    <h4 class="mb-0">Usuários cadastrados</h4>
    <div>
      <a class="btn btn-sm btn-outline-primary" href="register.php">Novo usuário</a> <!-- Atalho cadastro -->
      <a class="btn btn-sm btn-outline-secondary" href="logout.php">Sair</a>         <!-- Sair -->
    </div>
  </div>

  <div class="card shadow-sm">                                 <!-- Card da tabela -->
    <div class="card-body p-0">
      <div class="table-responsive">                           <!-- Tabela responsiva -->
        <table class="table table-sm table-hover mb-0">        <!-- Tabela compacta -->
          <thead class="table-light">
            <tr><th>#</th><th>Nome</th><th>Email</th><th>Papel</th><th>Criado em</th></tr> <!-- Cabeçalho -->
          </thead>
          <tbody>
            <?php if ($users): foreach ($users as $u): ?>       <!-- Loop de usuários -->
              <tr>
                <td><?= htmlspecialchars($u['id']) ?></td>      <!-- ID -->
                <td><?= htmlspecialchars($u['name']) ?></td>    <!-- Nome -->
                <td><?= htmlspecialchars($u['email']) ?></td>   <!-- Email -->
                <td><span class="badge text-bg-secondary"><?= htmlspecialchars($u['role']) ?></span></td> <!-- Papel -->
                <td><?= htmlspecialchars($u['created_at']) ?></td> <!-- Data -->
              </tr>
            <?php endforeach; else: ?>                          <!-- Sem dados -->
              <tr><td colspan="5" class="text-center text-muted py-3">Sem usuários.</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</body>
</html>
