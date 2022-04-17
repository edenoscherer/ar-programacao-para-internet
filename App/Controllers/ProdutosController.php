<?php

namespace App\Controllers;

use App\Entities\Produto;
use App\Models\ProdutosModel;

final class ProdutosController
{
    public static function listar()
    {
        $error = !isset($_GET['error']) ? null : trim($_GET['error']);
        $produtos = (new ProdutosModel())->Listar();
        include VIEW_PATH . 'produtos-listar.php';
    }

    public static function cadastrarProduto()
    {
        $error = !isset($_GET['error']) ? null : trim($_GET['error']);
        include VIEW_PATH . 'produtos-cadastrar.php';
    }

    public static function cadastrarProdutoSalvar()
    {
        try {
            $nome = isset($_POST['nome']) ? trim($_POST['nome']) : null;
            $descricao = isset($_POST['descricao']) ? trim($_POST['descricao']) : null;
            $cod_barras = isset($_POST['cod_barras']) ? trim($_POST['cod_barras']) : null;
            $fabricante = isset($_POST['fabricante']) ? trim($_POST['fabricante']) : null;
            $validade = isset($_POST['validade']) ? trim($_POST['validade']) : null;


            if (empty($nome) || empty($descricao) || empty($cod_barras) || empty($fabricante)) {
                header("Location: cadastrar-produto?error=Dados inválidos");
                exit;
            }

            $prod = new Produto();
            $prod->setNome($nome);
            $prod->setDescricao($descricao);
            $prod->setCodBarras($cod_barras);
            $prod->setFabricante($fabricante);
            $prod->setValidade(empty($validade) ? null : $validade);

            $model = new ProdutosModel();
            $model->cadastrar($prod);
            header("Location: produtos");
            exit;
        } catch (\Throwable $th) {
            header("Location: cadastrar-produto?error=Erro interno. " . $th->getMessage());
            exit;
        }
    }


    public static function editarProduto()
    {
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;
        $produto = null;
        if ($id > 0) {
            $model = new ProdutosModel();
            $produto = $model->getProdutoById($id);
        }
        $error = !isset($_GET['error']) ? null : trim($_GET['error']);
        if (empty($produto)) {
            $error = 'Produto não encontrado';
            $produto = new Produto();
        }

        include VIEW_PATH . 'produtos-editar.php';
    }

    public static function editarProdutoSalvar()
    {
        try {
            $model = new ProdutosModel();
            $id = isset($_POST['id']) ? intval($_POST['id']) : null;
            $prod = $model->getProdutoById($id);
            if (empty($prod)) {
                header("Location: editar-produto?id=$id&error=Produto não encontrado. ");
                exit;
            }
            $nome = isset($_POST['nome']) ? trim($_POST['nome']) : null;
            $descricao = isset($_POST['descricao']) ? trim($_POST['descricao']) : null;
            $cod_barras = isset($_POST['cod_barras']) ? trim($_POST['cod_barras']) : null;
            $fabricante = isset($_POST['fabricante']) ? trim($_POST['fabricante']) : null;
            $validade = isset($_POST['validade']) ? trim($_POST['validade']) : null;


            $prod->setNome($nome);
            $prod->setDescricao($descricao);
            $prod->setCodBarras($cod_barras);
            $prod->setFabricante($fabricante);
            $prod->setValidade(empty($validade) ? null : $validade);

            $model = new ProdutosModel();
            $model->atualizar($prod);
            header("Location: produtos");
            exit;
        } catch (\Throwable $th) {
            header("Location: editar-produto?error=Erro interno. " . $th->getMessage());
            exit;
        }
    }
    public static function deleteProduto()
    {
        try {
            $id = isset($_GET['id']) ? intval($_GET['id']) : null;
            if ($id < 0) {
                header("Location: produtos?error=Produto não encontrado. ");
                exit;
            }
            $model = new ProdutosModel();
            $model->delete($id);
            header("Location: produtos");
            exit;
        } catch (\Throwable $th) {
            header("Location: produtos?error=Erro interno. " . $th->getMessage());
            exit;
        }
    }
}
