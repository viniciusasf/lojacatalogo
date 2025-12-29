<?php
// admin/logout.php

// 1. Inicia a sessão para ter acesso aos dados atuais
session_start();

// 2. Limpa todas as variáveis de sessão
$_SESSION = array();

// 3. Se desejar destruir completamente a sessão, apague também o cookie de sessão.
// Nota: Isso destruirá a sessão e não apenas os dados da sessão!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 4. Por último, destrói a sessão
session_destroy();

// 5. Redireciona para a página de login ou para a home da loja
header("Location: login.php?msg=saiu");
exit;
?>
