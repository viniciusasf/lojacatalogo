<?php
// admin/protecao_admin.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 1. Verifica se o usuário está logado
// 2. Verifica se o nível é 'admin'
if (!isset($_SESSION['usuario_logado']) || $_SESSION['usuario_nivel'] !== 'admin') {
    // Se não for admin, destrói qualquer sessão parcial e manda para o login
    header("Location: login.php?acesso_negado=1");
    exit;
}
?>
