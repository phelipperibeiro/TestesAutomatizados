<?php

namespace Code;

class MathTest extends \PHPUnit_Framework_TestCase
{

    public function testVerificaSeOTipoDaClassseEstaCorreto()
    {
        $this->assertInstanceOf("Code\Math", new \Code\Math());
    }

    public function somaProvider()
    {
        return [
            [2, 2, 4],
            [20, 20, 40],
            [3, 2, 5],
            [21, 7, 28],
            [20, 28, 48]
        ];
    }

    /**
     * @dataProvider somaProvider
     */
    public function testVerificaSeConsegueSomarComProvider($x, $y, $resultadoEsperado)
    {
        $math = new \Code\Math();

        $resultadoSoma = $math->soma($x, $y);
        $this->assertEquals($resultadoEsperado, $resultadoSoma);
    }

    public function testVerificaSeConsegueSomar()
    {
        $math = new \Code\Math();

        $resultado = $math->soma(10, 12); // dever ser 22
        $this->assertEquals(22, $resultado);

        $resultado = $math->soma(10, 5); // dever ser 15
        $this->assertEquals(15, $resultado);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testVerificaSeConsegueSomarQuandoValorNaoForNumerico()
    {
        $math = new \Code\Math();
        $math->soma(10, 'Isso e um teste'); // deve gerar uma excecao do tipo InvalidArgumentException
    }

}

// php bin/phpunit -c tests/phpunit.xml
