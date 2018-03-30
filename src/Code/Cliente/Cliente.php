<?php

namespace Code\Cliente;

class Cliente
{

    private $nome;
    private $email;

    public function getNome()
    {
        return $this->nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setNome($v)
    {
        $this->nome = $v;
    }

    public function setEmail($v)
    {
        if (!filter_var($v, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("Email invalido");
        }
        
        $this->email = $v;
    }

}
