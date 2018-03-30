<?php

namespace Code\Mail;

use Code\Cliente\Cliente;
use Code\Mail\Mail;

class MailTest extends \PHPUnit_Framework_TestCase
{

    public function testVerificaSeOSetClienteEstaModificandoValoresDosGetters()
    {
        $cliente = $this->getMock('Code\Cliente\Cliente', array('getNome', 'getEmail'));

        $cliente->expects($this->any())
                ->method('getNome')
                ->willReturn('Felipe Ribeiro');

        $cliente->expects($this->any())
                ->method('getEmail')
                ->willReturn('felipe@gmail.com');

        $mail = new Mail();
        $mail->setCliente($cliente);

        $this->assertEquals('felipe@gmail.com', $mail->getTo());
    }

    public function testVerificaSeOSetClienteEstaModificandoValoresDosGettersFuncional()
    {
        $cliente = new Cliente;
        $cliente->setEmail('felipe@gmail.com');
        $cliente->setNome('Felipe Ribeiro');

        $mail = new Mail();
        $mail->setCliente($cliente);

        $this->assertEquals('felipe@gmail.com', $mail->getTo());
    }

}
