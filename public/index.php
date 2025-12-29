<?php
require_once __DIR__ . '/../models/Produto.php';

$tituloPagina = 'Catálogo de Produtos';
$pagina = isset($_GET['p']) ? max(1, (int)$_GET['p']) : 1;
$porPagina = 12;
$offset = ($pagina - 1) * $porPagina;

$produtos = Produto::listarTodos($porPagina, $offset);

include '_header.php';
?>

<h1 class="mb-4">Catálogo de Produtos</h1>
<div class="row g-4">
  <?php foreach ($produtos as $p): ?>
    <div class="col-sm-6 col-md-4 col-lg-3">
      <div class="card h-100">
        <img src="../assets/img/<?= htmlspecialchars($p['imagem']) ?>"
             class="card-img-top" alt="<?= htmlspecialchars($p['nome']) ?>">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title text-truncate"><?= htmlspecialchars($p['nome']) ?></h5>
          <p class="card-text small text-muted flex-grow-1">
            <?= htmlspecialchars(mb_strimwidth($p['descricao'], 0, 80, '...')) ?>
          </p>
          <p class="fw-bold mb-2">
            R$ <?= number_format($p['preco'], 2, ',', '.') ?>
          </p>
          <a href="produto.php?id=<?= (int)$p['id'] ?>" class="btn btn-primary btn-sm mt-auto">
            Ver detalhes
          </a>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<?php include '_footer.php'; ?>
