<?php
require_once __DIR__ . '/../database/conexao.php';

class Produto
{
    public static function listarTodos($limite = 12, $offset = 0) {
        $pdo = getConnection();
        $sql = "SELECT id, nome, descricao, preco, imagem, estoque
                FROM produtos 
                ORDER BY nome 
                LIMIT :limite OFFSET :offset";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':limite', (int)$limite, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function buscarPorId($id) {
        $pdo = getConnection();
        $stmt = $pdo->prepare(
            "SELECT id, nome, descricao, preco, imagem, estoque
             FROM produtos WHERE id = :id"
        );
        $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    // ... listarTodos() e buscarPorId() já mostrados

    public static function criar(array $dados) {
        $pdo = getConnection();
        $sql = "INSERT INTO produtos (nome, descricao, preco, imagem, estoque)
                VALUES (:nome, :descricao, :preco, :imagem, :estoque)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':nome', $dados['nome']);
        $stmt->bindValue(':descricao', $dados['descricao']);
        $stmt->bindValue(':preco', $dados['preco']);
        $stmt->bindValue(':imagem', $dados['imagem']);
        $stmt->bindValue(':estoque', $dados['estoque'], PDO::PARAM_INT);
        return $stmt->execute();
    }

    public static function atualizar(int $id, array $dados) {
        $pdo = getConnection();
        $sql = "UPDATE produtos
                   SET nome = :nome,
                       descricao = :descricao,
                       preco = :preco,
                       imagem = :imagem,
                       estoque = :estoque
                 WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':nome', $dados['nome']);
        $stmt->bindValue(':descricao', $dados['descricao']);
        $stmt->bindValue(':preco', $dados['preco']);
        $stmt->bindValue(':imagem', $dados['imagem']);
        $stmt->bindValue(':estoque', $dados['estoque'], PDO::PARAM_INT);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public static function excluir(int $id) {
        $pdo = getConnection();
        $stmt = $pdo->prepare("DELETE FROM produtos WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}

