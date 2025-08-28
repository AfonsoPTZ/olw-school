<?php
// Usa $title vindo da página que incluiu este arquivo; se não vier, usa "App"
$__title = isset($title) ? $title : 'App';
?>
<!doctype html> <!-- Declara HTML5 -->
<html lang="pt-br"> <!-- Define idioma da página -->
<head>
  <meta charset="utf-8"> <!-- Suporte a acentos -->
  <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Responsivo -->
  <title><?= htmlspecialchars($__title) ?></title> <!-- Título da aba -->
  <!-- CSS do Bootstrap via CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<!-- Corpo com fundo claro e padding -->
<body class="bg-light p-4">
  <!-- Container central do Bootstrap -->
  <div class="container">
