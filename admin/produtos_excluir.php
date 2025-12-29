<?php
// C:\wamp64\www\loja\admin\produtos_excluir.php

// 1. Importa a Model Produto (ajuste o caminho se necessário)
// Como o arquivo está em admin/ e a Model em Models/, o caminho deve subir um nível
require_once __DIR__ . '/../Models/Produto.php';
require_once 'protecao_admin.php';
// ... resto do código da página

// 2. Verifica se o ID foi passado via URL
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    // 3. Utiliza o método estático da classe Produto para excluir
    try {
        if (Produto::excluir($id)) {
            // Redireciona de volta para a listagem com uma mensagem de sucesso
            header("Location: produtos_list.php");
            exit;
        } else {
            echo "Erro ao tentar excluir o produto.";
        }
    } catch (Exception $e) {
        echo "Erro no sistema: " . $e->getMessage();
    }
} else {
    // Se não houver ID, redireciona para a lista
    header("Location: produtos_list.php");
    exit;
}
?>
