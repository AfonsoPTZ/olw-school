<?php session_start(); ?>                                  <!-- Sessão (para manter padrão) -->
<!doctype html>
<html lang="pt-br" data-bs-theme="light">
<head>
  <meta charset="utf-8">
  <title>Cadastrar usuário</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap -->
</head>
<body class="bg-light p-4">                                <!-- Fundo claro + padding -->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-body">
          <h4 class="mb-3">Cadastro</h4>

          <?php if(!empty($_GET['ok'])): ?>                <!-- Sucesso -->
            <div class="alert alert-success">Usuário cadastrado com sucesso!</div>
          <?php elseif(!empty($_GET['err'])): ?>           <!-- Erro -->
            <div class="alert alert-danger"><?= htmlspecialchars($_GET['err']) ?></div>
          <?php endif; ?>

          <form method="post" action="process_register.php">  <!-- Envia para process_register -->
            <div class="mb-3">
              <label class="form-label">Nome</label>
              <input class="form-control" type="text" name="name" required>   <!-- Nome -->
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input class="form-control" type="email" name="email" required> <!-- Email -->
            </div>
            <div class="mb-3">
              <label class="form-label">Senha</label>
              <input class="form-control" type="password" name="password" required> <!-- Senha -->
            </div>
            <div class="mb-3">
              <label class="form-label">Papel</label>                           <!-- Papel -->
              <div>
                <label class="me-3"><input type="radio" name="role" value="aluno"> Aluno</label>
                <label class="me-3"><input type="radio" name="role" value="professor"> Professor</label>
                <label class="me-3"><input type="radio" name="role" value="responsavel"> Responsável</label>
              </div>
            </div>
            <button class="btn btn-primary w-100">Cadastrar</button>             <!-- Botão -->
          </form>

          <div class="text-center mt-3"><a href="index.php">Voltar ao login</a></div> <!-- Voltar -->
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
