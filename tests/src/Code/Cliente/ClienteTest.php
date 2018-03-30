<?php

namespace Code\Cliente;

use \Code\Mail\SendMail;

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
        $cliente->setEmail('felipe@gmail.com');

        $this->assertEquals('felipe@gmail.com', $cliente->getEmail());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testVerificaSeEmailSetadoEInvalido()
    {
        $cliente = new Cliente();
        $cliente->setEmail('Felipe');
    }

    public function testVerificaSeConsegueEnviarEmailIntegracao()
    {
        $mailTransport = new SendMail();

        $cliente = new Cliente();
        $cliente->setMailTransport($mailTransport);

        $this->assertTrue($cliente->sendMail());
    }
    
    public function testVerificaSeConsegueEnviar()
    {    
        $mailTransport = $this->getMock('\Code\Mail\SendMail', array('send'));

        $mailTransport->expects($this->once())
                ->method('send')
                ->willReturn(true);        

        $cliente = new Cliente();
        $cliente->setMailTransport($mailTransport);

        $this->assertTrue($cliente->sendMail());
    }

}
