<?php

namespace App\Models;

use PDO;
use stdClass;
use App\Entities\Produto;
use App\Libs\Database;

final class ProdutosModel
{
    private PDO $pdo;

    public function __construct()
    {
        $db = Database::getInstance();
        $this->pdo = $db->getPdo();
    }
    /**
     * @return Produto[]
     */
    public function Listar()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM produtos ORDER BY nome");
        $stmt->execute();

        $produtos = $stmt->fetchAll(PDO::FETCH_OBJ);
        if (!$produtos) {
            return [];
        }
        return array_map(self::class . '::asProduto', $produtos);
    }
    /**
     * Cadastrar um novo produto
     *
     * @param Produto $produto
     * @return Produto
     */
    public function cadastrar(Produto &$produto): Produto
    {
        $stmt = $this->pdo->prepare("INSERT INTO produtos (nome, descricao, cod_barras, fabricante, validade) VALUES (:nome, :descricao, :cod_barras, :fabricante, :validade);");
        $stmt->execute([
            ':nome' => $produto->getNome(),
            ':descricao' => $produto->getDescricao(),
            ':cod_barras' => $produto->getCodBarras(),
            ':fabricante' => $produto->getFabricante(),
            ':validade' => $produto->getValidade()
        ]);
        $produto->setId($this->pdo->lastInsertId());

        return $produto;
    }
    /**
     * Atualizar um produto
     *
     * @param Produto $produto
     * @return Produto
     */
    public function atualizar(Produto &$produto): Produto
    {
        $stmt = $this->pdo->prepare("UPDATE produtos SET nome=:nome, descricao=:descricao, cod_barras=:cod_barras, fabricante=:fabricante, validade=:validade WHERE id=:id;");
        $stmt->execute([
            ':id' => $produto->getId(),
            ':nome' => $produto->getNome(),
            ':descricao' => $produto->getDescricao(),
            ':cod_barras' => $produto->getCodBarras(),
            ':fabricante' => $produto->getFabricante(),
            ':validade' => $produto->getValidade()
        ]);

        return $produto;
    }
    public function delete(int $id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM produtos WHERE  id=:id;");
        $stmt->execute([
            ':id' => $id,
        ]);
    }

    /**
     * @param int $id
     * @return null|Produto
     */
    public function getProdutoById(int $id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM produtos WHERE id = :id");
        $stmt->execute([
            ':id' => $id,
        ]);

        $prodDB = $stmt->fetchObject();
        if ($prodDB) {
            return self::asProduto($prodDB);
        }
        return null;
    }

    public static function asProduto(stdClass $produto): Produto
    {
        $prod = new Produto();
        $prod->setId($produto->id);
        $prod->setNome($produto->nome);
        $prod->setDescricao($produto->descricao);
        $prod->setCodBarras($produto->cod_barras);
        $prod->setFabricante($produto->fabricante);
        $prod->setValidade($produto->validade);

        return $prod;
    }
}
