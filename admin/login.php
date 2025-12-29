<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Loja</title>
    <!-- Link para o Bootstrap via CDN para garantir visualização, mas o usuário pode trocar pelo local -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h3 class="text-center mb-4">Acesso Administrador</h3>

        <?php if (isset($_GET['erro'])): ?>
            <div class="alert alert-danger text-center">
                Usuário ou senha inválidos!
            </div>
        <?php endif; ?>

        <form action="auth.php" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" id="email" class="form-label form-control" placeholder="Login"
                    required>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" name="senha" id="senha" class="form-control" placeholder="******" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
        </form>
        <br>
        <?php if (isset($_GET['msg']) && $_GET['msg'] == 'saiu'): ?>
            <div class="alert alert-info text-center">
                Você saiu do sistema com sucesso!
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['msg']) && $_GET['msg'] == 'cadastro_sucesso'): ?>
            <div class="alert alert-info text-center">
                Cadastro Realizado com Sucesso! Acesse ao Sistema
            </div>
        <?php endif; ?>
        
        <div class="text-center mt-3">
            <a href="../public/index.php" class="text-decoration-none small">Voltar para a loja</a>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>