<?php

namespace App\Controllers;

use App\Entities\Usuario;
use App\Models\UsuariosModel;

final class UsuariosController
{

    public static function login()
    {
        $error = !isset($_GET['error']) ? null : trim($_GET['error']);
        include VIEW_PATH . 'login.php';
    }


    public static function validarLogin()
    {
        $nome = isset($_POST['nome']) ? trim($_POST['nome']) : null;
        $senha = isset($_POST['senha']) ? trim($_POST['senha']) : null;

        if (empty($nome) || empty($senha)) {
            header("Location: login?error=Dados inválidos");
            exit;
        }

        try {
            $usuario = new Usuario();
            $usuario->setNome($nome)->setSenha($senha);
            $model = new UsuariosModel();
            $usuario = $model->login($usuario);
            if (!$usuario) {
                header("Location: login?error=Nome ou senha inválidos");
                exit;
            }
            $_SESSION['AUTH_USER'] = $usuario->getId();
            header("Location: produtos");
        } catch (\Throwable $th) {
            header("Location: login?error=Erro interno. " . $th->getMessage());
            exit;
        }
    }


    public static function cadastrarUsuario()
    {
        $error = !isset($_GET['error']) ? null : trim($_GET['error']);
        include VIEW_PATH . 'cadastrar-usuario.php';
    }

    public static function cadastrarUsuarioSalvar()
    {
        try {
            $nome = isset($_POST['nome']) ? trim($_POST['nome']) : null;
            $senha = isset($_POST['senha']) ? trim($_POST['senha']) : null;
            if (empty($nome) || empty($senha)) {
                header("Location: cadastrar-usuario?error=Dados inválidos");
                exit;
            }
            $usuario = new Usuario();
            $usuario->setNome($nome)->setSenha($senha);
            $model = new UsuariosModel();
            $model->cadastrar($usuario);
            header("Location: login");
            exit;
        } catch (\Throwable $th) {
            header("Location: cadastrar-usuario?error=Erro interno. " . $th->getMessage());
            exit;
        }
    }
}
