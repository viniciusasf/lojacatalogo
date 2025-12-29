<?php
session_start();

// Verifica se o usuário está logado e se é administrador
if (!isset($_SESSION['usuario_logado']) || $_SESSION['usuario_nivel'] !== 'admin') {
    // Se não for admin, redireciona para o login ou para a loja pública
    header("Location: login.php");
    exit;
}
?>
