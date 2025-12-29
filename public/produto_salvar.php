<?php
require_once __DIR__ . '/../models/Produto.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$id       = isset($_POST['id']) ? (int)$_POST['id'] : 0;
$nome     = trim($_POST['nome'] ?? '');
$descricao= trim($_POST['descricao'] ?? '');
$preco    = (float)($_POST['preco'] ?? 0);
$estoque  = (int)($_POST['estoque'] ?? 0);
$imagem   = $id && !empty($_POST['imagem_atual']) ? $_POST['imagem_atual'] : null;

// upload básico de imagem
if (!empty($_FILES['imagem']['name'])) {
    $nomeArquivo = time() . '_' . basename($_FILES['imagem']['name']);
    $destino = __DIR__ . '/../assets/img/' . $nomeArquivo;

    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $destino)) {
        $imagem = $nomeArquivo;
    }
}

$dados = [
    'nome'      => $nome,
    'descricao' => $descricao,
    'preco'     => $preco,
    'imagem'    => $imagem,
    'estoque'   => $estoque,
];

if ($id > 0) {
    Produto::atualizar($id, $dados);
} else {
    Produto::criar($dados);
}

header('Location: index.php');
exit;
