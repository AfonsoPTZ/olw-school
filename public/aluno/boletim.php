<?php
require_once __DIR__ . '/../../includes/auth.php';
require_once __DIR__ . '/../../db/conexao.php';

require_login();
require_role('aluno');
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>OlwSchool — Minhas Notas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

  <?php include __DIR__ . '/navbar.php'; ?>

  <div class="flex-grow-1" style="margin-left: 220px;">
    <main class="container py-4">

      <!-- ============================== -->
      <!-- Notas -->
      <!-- ============================== -->
      <h1 class="h5 mb-3">📊 Minhas Notas</h1>
      <table class="table table-striped align-middle">
        <thead>
          <tr>
            <th>Prova</th>
            <th>Data</th>
            <th class="text-end">Nota</th>
          </tr>
        </thead>
        <tbody id="tbodyNotas"></tbody>
      </table>

    </main>
  </div>

  <script src="/afonso/owl-school/public/assets/js/api/utils/nota/nota_aluno.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
