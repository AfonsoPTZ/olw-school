<?php
session_start();                                                // Habilita sessão
$err = $_GET['error'] ?? '';                                   // Lê código de erro (querystring)
$msg = [                                                       // Mapa de mensagens
  'missing' => 'Preencha email, senha e selecione um papel.',
  'invalid' => 'Credenciais inválidas.',
  'auth'    => 'Faça login para acessar.',
][$err] ?? '';                                                 // Seleciona mensagem
?>
<!doctype html>
<html lang="pt-br" data-bs-theme="light">                      <!-- HTML5 + idioma + tema -->
<head>
  <meta charset="utf-8">                                       <!-- UTF-8 -->
  <title>Login — OwlSchool</title>                             <!-- Título -->
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Responsivo -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- CSS Bootstrap -->
</head>
<body class="bg-light d-flex align-items-center" style="min-height:100vh"> <!-- Fundo claro + centraliza -->
<div class="container">                                        <!-- Container Bootstrap -->
  <div class="row justify-content-center">                     <!-- Linha centralizada -->
    <div class="col-11 col-sm-8 col-md-6 col-lg-5">            <!-- Coluna responsiva -->
      <div class="card shadow-sm">                             <!-- Card com sombra -->
        <div class="card-body p-4">                            <!-- Corpo do card -->
          <h4 class="mb-3 text-center">Login</h4>              <!-- Título -->

          <?php if($msg): ?>                                   <!-- Se há mensagem, mostra -->
            <div class="alert alert-danger"><?= htmlspecialchars($msg) ?></div> <!-- Alerta com escape -->
          <?php endif; ?>

          <form method="post" action="process_login.php">      <!-- Form envia para process_login.php -->
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input class="form-control" type="email" name="email" required> <!-- Campo email -->
            </div>
            <div class="mb-3">
              <label class="form-label">Senha</label>
              <input class="form-control" type="password" name="password" required> <!-- Campo senha -->
            </div>
            <div class="mb-3">
              <label class="form-label d-block">Papel</label>  <!-- Grupo de rádio -->
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="role" value="aluno"> <!-- Aluno -->
                <label class="form-check-label">Aluno</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="role" value="professor"> <!-- Professor -->
                <label class="form-check-label">Professor</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="role" value="responsavel"> <!-- Responsável -->
                <label class="form-check-label">Responsável</label>
              </div>
            </div>
            <button class="btn btn-primary w-100">Entrar</button>          <!-- Botão enviar -->
          </form>

          <div class="text-center mt-3">                                   <!-- Link cadastro -->
            <a href="register.php">Criar conta</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
