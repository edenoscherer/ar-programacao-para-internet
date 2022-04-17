<?php

use App\Controllers\ProdutosController;
use App\Controllers\UsuariosController;

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'config.php';

$uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
$dirname = basename(dirname(__FILE__));
$uri = str_replace('/' . $dirname, '', $uri);
$pos = strpos($uri, '?');
if ($pos > 0) {
    $uri = substr($uri, 0, strpos($uri, '?'));
}

function checkLogin()
{
    if (empty(AUTH_USER)) {
        header("Location: login");
        exit;
    }
}

switch ($uri) {
    case '/login':
        UsuariosController::login();
        break;
    case '/login-validar':
        UsuariosController::validarLogin();
        break;
    case '/cadastrar-usuario':
        UsuariosController::cadastrarUsuario();
        break;
    case '/cadastrar-usuario-salvar':
        UsuariosController::cadastrarUsuarioSalvar();
        break;
    case '/':
    case '/produtos':
        checkLogin();
        ProdutosController::listar();
        break;
    case '/cadastrar-produto':
        checkLogin();
        ProdutosController::cadastrarProduto();
        break;
    case '/cadastrar-produto-salvar':
        checkLogin();
        ProdutosController::cadastrarProdutoSalvar();
        break;
        break;
    case '/editar-produto':
        checkLogin();
        ProdutosController::editarProduto();
        break;
    case '/editar-produto-salvar':
        checkLogin();
        ProdutosController::editarProdutoSalvar();
        break;
    case '/deletar-produto':
        checkLogin();
        ProdutosController::deleteProduto();
        break;

    default:
        include "App/Views/error-404.php";
        var_dump($uri);
        break;
}
