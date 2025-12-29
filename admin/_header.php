<?php
require_once 'protecao_admin.php';
// ... resto do código da página
if (!isset($tituloPagina)) { $tituloPagina = 'Administraodor'; }

?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($tituloPagina) ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand" href="../admin/index.php">Administrador</a>
    <div class="navbar-nav">
      <a class="nav-link" href="../admin/produtos_list.php">Lista de Produtos</a>
      <a class="nav-link" href="../admin/index.php">Ver Catálogo</a>
      <a class="nav-link" href="usuarios_cadastro.php">Cadastrar Usuário</a>        
      <a class="nav-link" href="logout.php">Sair do Sistema</a>            
    </div>
  </div>
</nav>
<div class="container mb-5">
