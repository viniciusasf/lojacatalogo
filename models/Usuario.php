<?php
// Models/Usuario.php
require_once __DIR__ . '/../database/conexao.php';

class Usuario
{
    public static function buscarPorEmail(string $email) {
        $pdo = getConnection();
        $sql = "SELECT id, nome, email, senha, nivel FROM usuarios WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Opcional: Método para verificar a senha (útil se usar password_hash)
    public static function autenticar(string $email, string $senha) {
        $usuario = self::buscarPorEmail($email);
        
        //if ($usuario) {
            // Se você estiver usando senhas criptografadas (recomendado):
          if (password_verify($senha, $usuario['senha'])) 
            { return $usuario; 
        }
            
            // Se estiver usando texto puro (apenas para teste inicial):
            //if ($senha === $usuario['senha']) {
            //    return $usuario;
            //}
        //}
        return false;
    }

    public static function criar(array $dados) {
        $pdo = getConnection();
        $sql = "INSERT INTO usuarios (nome, email, senha, nivel) 
                VALUES (:nome, :email, :senha, :nivel)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':nome', $dados['nome']);
        $stmt->bindValue(':email', $dados['email']);
        
        // Criptografando a senha para maior segurança
        $senhaHash = password_hash($dados['senha'], PASSWORD_DEFAULT);
        $stmt->bindValue(':senha', $senhaHash);
        
        $stmt->bindValue(':nivel', $dados['nivel'] ?? 'cliente');
        return $stmt->execute();
    }
}
