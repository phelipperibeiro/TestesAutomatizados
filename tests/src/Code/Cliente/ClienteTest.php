<?php

namespace Code\Cliente;

use \Code\Mail\SendMail;
use \Code\Cliente\Cliente;

class ClienteTest extends \PHPUnit_Framework_TestCase
{

    private $cliente;
    private $db;

    public function setUp()
    {
        //$this->cliente = new Cliente;
        //$this->db = new \PDO('mysql:host=127.0.0.1;dbname=fsc', 'root', '123456');
    }

    public function tearDown()
    {
        //unset($this->cliente);
        //unset($this->db);
    }

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

        //$this->assertTrue($cliente->sendMail());
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
