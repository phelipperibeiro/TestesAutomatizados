<?php

namespace Code;

class CrazyTest extends \PHPUnit_Framework_TestCase
{

    public function testVerificaSeRetornaUmaFrasePassandoParametro()
    {
        $crazy = new Crazy;
        $crazy->setFrase('Minha frase');

        $this->assertEquals('Minha frase', $crazy->getFrase());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testverificaSeRetornaLoopException()
    {
        $crazy = new Crazy;
        $crazy->getLoop('vdsdvsdvdsv');
    }

    public function testverificaSeRetornaLoop()
    {
        $crazy = new Crazy;

        $data = $crazy->getLoop(10);
        $array = range(0, 10);

        $this->assertEquals($array, $data);
    }

    public function testVerificaSomaDeDoisNumeros()
    {
        $crazy = new Crazy;
        $result = $crazy->soma(10, 20);

        $this->assertEquals(30, $result);
    }

}
