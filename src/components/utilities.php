<?php

class Utilities
{
    public static function parseInt($string, $min=null, $max=null)
    {
        if(!is_numeric($string))
            throw new UnexpectedValueException();
        $int = (int) $string;
        if(($min != null) && ($int < $min))
            throw new OutOfBoundsException();
        if(($max != null) && ($int > $max))
            throw new OutOfBoundsException();
        return $int;
    }
}
