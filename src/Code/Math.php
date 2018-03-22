<?php

namespace Code;

class Math
{

    public function soma($x, $y)
    {
        if (!is_numeric($x) OR !is_numeric($y)) {
            throw new \InvalidArgumentException("Os valores devem ser numericos");
        }

        return $x + $y;
    }

}
