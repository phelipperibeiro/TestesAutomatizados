<?php

namespace Code\Cliente;

class Cliente
{

    private $nome;
    private $email;
    private $mailTransport;

    public function getNome()
    {
        return $this->nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getMailTransport()
    {
        return $this->mailTransport;
    }

    public function setMailTransport($v)
    {
        $this->mailTransport = $v;
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

    public function sendMail()
    {
        if ($this->mailTransport->send("phelipperibeiro@hotmail.com", "Assunto", "Msg")) {
            return true;
        }
    }

}
