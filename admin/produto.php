<?php
require_once __DIR__ . '/../models/Produto.php';
require_once 'protecao_admin.php';
// ... resto do código da página

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$produto = Produto::buscarPorId($id);

if (!$produto) {
    http_response_code(404);
    die('Produto não encontrado');
}

$tituloPagina = $produto['nome'];
include '_header.php';
?>

<div class="row">
  <div class="col-md-5">
    <img src="../assets/img/<?= htmlspecialchars($produto['imagem']) ?>"
         class="img-fluid rounded mb-3"
         alt="<?= htmlspecialchars($produto['nome']) ?>">
  </div>
  <div class="col-md-7">
    <h1><?= htmlspecialchars($produto['nome']) ?></h1>
    <p class="lead">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
    <p><?= nl2br(htmlspecialchars($produto['descricao'])) ?></p>
    <a href="index.php" class="btn btn-outline-secondary mt-3">Voltar ao catálogo</a>
  </div>
</div>

<?php include '_footer.php'; ?>
