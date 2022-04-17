<?php

namespace App\Entities;

final class Usuario
{
    /** @var integer|null */
    private $_id = null;
    /** @var string|null */
    private $_nome = null;
    /** @var string|null */
    private $_senha = null;


    public function __construct()
    {
    }

    /** @return null|int */
    public function getId()
    {
        return $this->_id;
    }

    public function setId(int $value = null): Usuario
    {
        $this->_id = $value;
        return $this;
    }


    /** @return null|string */
    public function getNome()
    {
        return $this->_nome;
    }

    public function setNome(string $value = null): Usuario
    {
        $this->_nome = $value;
        return $this;
    }


    /** @return null|string */
    public function getSenha()
    {
        return $this->_senha;
    }

    public function setSenha(string $value = null): Usuario
    {
        $this->_senha = $value;
        return $this;
    }
}
