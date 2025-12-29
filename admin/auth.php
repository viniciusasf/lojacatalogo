<?php
// admin/auth.php
session_start();
require_once __DIR__ . '/../Models/Usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    // Busca o usuário no banco de dados através da Model
    $usuario = Usuario::autenticar($email, $senha);

    if ($usuario) {
        // Define as variáveis de sessão com os dados reais do banco
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome'];
        $_SESSION['usuario_email'] = $usuario['email'];
        $_SESSION['usuario_nivel'] = $usuario['nivel']; // 'admin' ou 'cliente'
        $_SESSION['usuario_logado'] = true;

        // Redirecionamento baseado no nível de acesso
        if ($usuario['nivel'] === 'admin') {
            header("Location: index.php");
        } else {
            header("Location: ../index.php");
        }
        exit;
    } else {
        // Falha na autenticação
        header("Location: login.php?erro=1");
        exit;
    }
}
?>
