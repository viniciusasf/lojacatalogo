<?php
require_once __DIR__ . '/../models/Produto.php';
require_once 'protecao_admin.php';
// ... resto do código da página

$tituloPagina = 'Gerenciar produtos';
$produtos = Produto::listarTodos(1000, 0); // ou um método específico de listagem admin

include '../admin/_header.php';


?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h3 mb-0">Produtos</h1>
  <a href="produtos_form.php" class="btn btn-primary">Novo produto</a>
</div>

<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Nome</th>
      <th>Preço</th>
      <th>Estoque</th>
      <th style="width: 160px;">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($produtos as $p): ?>
      <tr>
        <td><?= (int)$p['id'] ?></td>
        <td><?= htmlspecialchars($p['nome']) ?></td>
        <td>R$ <?= number_format($p['preco'], 2, ',', '.') ?></td>
        <td><?= (int)$p['estoque'] ?></td>
        <td>
          <a href="produtos_form.php?id=<?= (int)$p['id'] ?>" class="btn btn-sm btn-warning">
            Editar
          </a>
          
          <a href="produtos_excluir.php?id=<?= (int)$p['id'] ?>"
             class="btn btn-sm btn-danger"
             onclick="return confirm('Confirma excluir este produto?');">
            Excluir
          </a>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include '_footer.php'; ?>

