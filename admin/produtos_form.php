<?php
require_once __DIR__ . '/../models/Produto.php';
require_once 'protecao_admin.php';
// ... resto do código da página

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$produto = $id > 0 ? Produto::buscarPorId($id) : null;

$tituloPagina = $id ? 'Editar produto' : 'Novo produto';
include '_header.php';
?>

<h1 class="mb-4"><?= htmlspecialchars($tituloPagina) ?></h1>

<form action="produtos_salvar.php" method="post" enctype="multipart/form-data" class="row g-3">
  <?php if ($id): ?>
    <input type="hidden" name="id" value="<?= (int)$id ?>">
  <?php endif; ?>

  <div class="col-md-6">
    <label class="form-label">Nome</label>
    <input type="text" name="nome" class="form-control" required
           value="<?= htmlspecialchars($produto['nome'] ?? '') ?>">
  </div>

  <div class="col-md-3">
    <label class="form-label">Preço</label>
    <input type="number" name="preco" step="0.01" min="0" class="form-control" required
           value="<?= htmlspecialchars($produto['preco'] ?? '0.00') ?>">
  </div>

  <div class="col-md-3">
    <label class="form-label">Estoque</label>
    <input type="number" name="estoque" min="0" class="form-control" required
           value="<?= htmlspecialchars($produto['estoque'] ?? '0') ?>">
  </div>

  <div class="col-12">
    <label class="form-label">Descrição</label>
    <textarea name="descricao" rows="4" class="form-control"><?= htmlspecialchars($produto['descricao'] ?? '') ?></textarea>
  </div>

  <div class="col-md-6">
    <label class="form-label">Imagem (arquivo)</label>
    <input type="file" name="imagem" class="form-control">
    <?php if (!empty($produto['imagem'])): ?>
      <small class="text-muted d-block mt-1">
        Atual: <?= htmlspecialchars($produto['imagem']) ?>
      </small>
    <?php endif; ?>
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary">
      Salvar
    </button>

    <a href="produtos_list.php" class="btn btn-secondary">Cancelar</a>

  </div>
</form>

<?php include '_footer.php'; ?>

