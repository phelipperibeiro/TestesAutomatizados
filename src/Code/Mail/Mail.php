<?php

namespace Code\Mail;

use Code\Cliente\Cliente;

class Mail
{

    private $from;
    private $to;
    private $subject;
    private $messagem;
    private $cliente;

    public function getCliente()
    {
        return $this->cliente;
    }

    public function getFrom()
    {
        return $this->from;
    }

    public function getTo()
    {
        return $this->to;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function getMessagem()
    {
        return $this->messagem;
    }

    public function setCliente(Cliente $cliente)
    {
        $this->cliente = $cliente;
        $this->to = $this->cliente->getEmail();
    }

    public function setFrom($v)
    {
        $this->from = $v;
    }

    public function setTo($v)
    {
        $this->to = $v;
    }

    public function setSubject($v)
    {
        $this->subject = $v;
    }

    public function setMessagem($v)
    {
        $this->messagem = $v;
    }

    public function send()
    {
        echo "enviou o email";
        return true;
    }

}
