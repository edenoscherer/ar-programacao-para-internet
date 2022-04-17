<?php

namespace App\Entities;

final class Produto
{
    /** @var integer|null */
    private $_id = null;
    /** @var string|null */
    private $_nome = null;
    /** @var string|null */
    private $_descricao = null;
    /** @var string|null */
    private $_cod_barras = null;
    /** @var string|null */
    private $_fabricante = null;
    /** @var string|null */
    private $_validade = null;

    public function __construct()
    {
    }

    /** @return null|int */
    public function getId()
    {
        return $this->_id;
    }

    public function setId(int $value = null): Produto
    {
        $this->_id = $value;
        return $this;
    }

    /** @return null|string */
    public function getNome()
    {
        return $this->_nome;
    }

    public function setNome(string $value = null): Produto
    {
        $this->_nome = $value;
        return $this;
    }

    /** @return null|string */
    public function getDescricao()
    {
        return $this->_descricao;
    }

    public function setDescricao(string $value = null): Produto
    {
        $this->_descricao = $value;
        return $this;
    }

    /** @return null|string */
    public function getCodBarras()
    {
        return $this->_cod_barras;
    }

    public function setCodBarras(string $value = null): Produto
    {
        $this->_cod_barras = $value;
        return $this;
    }

    /** @return null|string */
    public function getFabricante()
    {
        return $this->_fabricante;
    }

    public function setFabricante(string $value = null): Produto
    {
        $this->_fabricante = $value;
        return $this;
    }


    /** @return null|string */
    public function getValidade()
    {
        return $this->_validade;
    }

    public function setValidade(string $value = null): Produto
    {
        $this->_validade = $value;
        return $this;
    }
}
