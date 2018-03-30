<?php

namespace Code\Cliente;

class ClienteTest extends \PHPUnit_Framework_TestCase
{

    public function testVerificaSeSetGetNome()
    {

        $cliente = new Cliente();
        $cliente->setNome('Felipe');

        $this->assertEquals('Felipe', $cliente->getNome());
    }

    public function testVerificaSeSetGetEMail()
    {

        $cliente = new Cliente();
        $cliente->setEMail('felipe@gmail.com');

        $this->assertEquals('felipe@gmail.com', $cliente->getEmail());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testVerificaSeEmailSetadoEInvalido()
    {
        $cliente = new Cliente();
        $cliente->setEMail('Felipe');
    }

}