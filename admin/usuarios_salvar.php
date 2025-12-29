<?php
// admin/usuarios_salvar.php
require_once __DIR__ . '/../Models/Usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $nivel = $_POST['nivel'] ?? 'cliente';

    // 1. Verifica se o e-mail já existe
    if (Usuario::buscarPorEmail($email)) {
        header("Location: usuarios_cadastro.php?erro=email_existe");
        exit;
    }

    // 2. Tenta criar o usuário
    $dados = [
        'nome' => $nome,
        'email' => $email,
        'senha' => $senha,
        'nivel' => $nivel
    ];

    if (Usuario::criar($dados)) {
        // Cadastro com sucesso, redireciona para o login
        header("Location: login.php?msg=cadastro_sucesso");
        exit;
    } else {
        header("Location: usuarios_cadastro.php?erro=1");
        exit;
    }
}
?>
