<?php

namespace App\Models;

use PDO;
use App\Libs\Database;
use App\Entities\Usuario;


final class UsuariosModel
{

    private PDO $pdo;

    public function __construct()
    {
        $db = Database::getInstance();
        $this->pdo = $db->getPdo();
    }

    /**
     * Cadastrar um novo usuário
     *
     * @param Usuario $usuario
     * @return Usuario
     */
    public function cadastrar(Usuario &$usuario): Usuario
    {
        $stmt = $this->pdo->prepare("INSERT INTO usuarios (nome, senha) VALUES(:nome,:senha)");
        $stmt->execute([
            ':nome' => $usuario->getNome(),
            ':senha' => password_hash($usuario->getSenha(), PASSWORD_BCRYPT),
        ]);
        $usuario->setId($this->pdo->lastInsertId());

        return $usuario;
    }

    /**
     * @param Usuario $usuario
     * @return void|Usuario
     */
    public function login(Usuario $usuario)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE nome = :nome");
        $stmt->execute([
            ':nome' => $usuario->getNome(),
        ]);

        $userDB = $stmt->fetchObject();
        if (empty($userDB) || password_verify($usuario->getSenha(), $userDB->senha)) {
            $usuario->setId($userDB->id);
            $usuario->setSenha(null);
            return $usuario;
        }
    }

    /**
     * @param int $id
     * @return null|Usuario
     */
    public function getUsuarioById(int $id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $stmt->execute([
            ':id' => $id,
        ]);

        $userDB = $stmt->fetchObject();
        if ($userDB) {
            $user = new Usuario();
            $user->setId($id);
            $user->setNome($userDB->nome);
            return $user;
        }
        return null;
    }
}


// password_verify