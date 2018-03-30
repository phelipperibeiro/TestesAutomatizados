<?php

namespace Code\Cliente;

class ClienteAgregatorTest extends \PHPUnit_Framework_TestCase
{

    public function testVerificaFuncionamentoDoClienteAgregatorUnitario()
    {

        $cliente = $this->getMock('Code\Cliente\Cliente', array('getNome', 'getEmail'));

        $cliente->expects($this->any())
                ->method('getNome')
                ->willReturn('Felipe Ribeiro');

        $cliente->expects($this->any())
                ->method('getEmail')
                ->willReturn('felipe@gmail.com');

        $cliente2 = $this->getMock('Code\Cliente\Cliente', array('getNome', 'getEmail'));

        $cliente2->expects($this->any())
                ->method('getNome')
                ->willReturn('Thiago Ribeiro');

        $cliente2->expects($this->any())
                ->method('getEmail')
                ->willReturn('thiago@gmail.com');

        $clienteAgregator = new ClienteAgregator();
        $clienteAgregator->addCliente($cliente);
        $clienteAgregator->addCliente($cliente2);


        $clientes = $clienteAgregator->getClientes();

        $this->assertEquals('Felipe Ribeiro', $clientes[0]->getNome());
        $this->assertEquals('felipe@gmail.com', $clientes[0]->getEmail());

        $this->assertEquals('Thiago Ribeiro', $clientes[1]->getNome());
        $this->assertEquals('thiago@gmail.com', $clientes[1]->getEmail());
    }

    public function testVerificaFuncionamentoDoClienteAgregatorFuncional()
    {

        $cliente = new Cliente;
        $cliente->setEmail('felipe@gmail.com');
        $cliente->setNome('Felipe Ribeiro');

        $cliente2 = new Cliente;
        $cliente2->setEmail('thiago@gmail.com');
        $cliente2->setNome('Thiago Ribeiro');

        $clienteAgregator = new ClienteAgregator();
        $clienteAgregator->addCliente($cliente);
        $clienteAgregator->addCliente($cliente2);


        $clientes = $clienteAgregator->getClientes();

        $this->assertEquals('Felipe Ribeiro', $clientes[0]->getNome());
        $this->assertEquals('felipe@gmail.com', $clientes[0]->getEmail());

        $this->assertEquals('Thiago Ribeiro', $clientes[1]->getNome());
        $this->assertEquals('thiago@gmail.com', $clientes[1]->getEmail());
    }

}
