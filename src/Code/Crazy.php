<?php

namespace Code;

class Crazy
{

    private $frase;

    public function setFrase($frase)
    {
        $this->frase = $frase;
    }

    public function getFrase()
    {
        return $this->frase;
    }

    public function getLoop($valor)
    {
        if (!is_int($valor)) {
            throw new \InvalidArgumentException("Valor invalido: {$valor}");
        }

        return range(0, $valor);
    }

    public function soma($x, $y)
    {
        return $x + $y;
    }

}
