

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário - Loja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body { background-color: #f8f9fa; height: 100vh; display: flex; align-items: center; justify-content: center; }
        .register-container { max-width: 500px; width: 100%; padding: 30px; background: white; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
    

<div class="register-container">
    
    <h3 class="text-center mb-4">Criar Nova Conta</h3>
    
    <?php if (isset($_GET['erro'])): ?>
        
        <div class="alert alert-danger">
            <?php 
                if($_GET['erro'] == 'email_existe') echo "Este e-mail já está cadastrado!";
                else echo "Erro ao realizar cadastro. Tente novamente.";
            ?>
        </div>
    <?php endif; ?>

    <form action="usuarios_salvar.php" method="POST">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome Completo</label>
            <input type="text" name="nome" id="nome" class="form-control" placeholder="Ex: João Silva" required>
        </div>
        
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="exemplo@email.com" required>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" name="senha" id="senha" class="form-control" required minlength="6">
            </div>
            <div class="col-md-6 mb-3">
                <label for="nivel" class="form-label">Nível de Acesso</label>
                <select name="nivel" id="nivel" class="form-select">
                    <option value="cliente">Cliente</option>
                    <option value="admin">Administrador</option>
                </select>
            </div>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-success">Finalizar Cadastro</button>           
        </div>
    </form>
</div>

</body>
</html>
