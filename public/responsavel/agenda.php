<?php


require_once __DIR__ . '/../../includes/auth.php';
require_once __DIR__ . '/../../db/conexao.php';



require_once __DIR__ . '/../../api/agenda/read.php';



require_login();
require_role('responsavel');



$semana = readAgenda();

$labels = [
  'segunda' => 'Segunda-feira',
  'terca'   => 'Terça-feira',
  'quarta'  => 'Quarta-feira',
  'quinta'  => 'Quinta-feira',
  'sexta'   => 'Sexta-feira'
];


?>


<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>OlwSchool — Agenda da Semana</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<body class="bg-light">

  <?php include __DIR__ . '/navbar.php'; ?>

  <div class="flex-grow-1" style="margin-left: 220px;">
    <div class="container py-4">

      <h3 class="fw-bold mb-4">📘 Agenda da Semana</h3>

      <?php foreach ($labels as $diaKey => $diaLabel): ?>
        <?php $aulas = $semana[$diaKey]; ?>

        <div class="card shadow-sm mb-3">

          <div class="card-header fw-semibold bg-primary text-white">
            <?= $diaLabel ?>
          </div>

          <div class="card-body">

            <?php if (empty($aulas)): ?>
              <p class="text-muted mb-0">Sem aulas cadastradas.</p>
            <?php else: ?>

              <ul class="mb-0">
                <?php foreach ($aulas as $aula): ?>
                  <li><?= $aula['inicio'] ?> – <?= $aula['fim'] ?> • <?= htmlspecialchars($aula['disciplina']) ?></li>
                <?php endforeach; ?>
              </ul>

            <?php endif; ?>

          </div>
        </div>

      <?php endforeach; ?>

    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
