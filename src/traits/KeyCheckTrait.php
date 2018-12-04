<?php

namespace App\traits;
use App\exceptions\KeyCheckException;

class KeyCheckTrait
{
    /**
     * @param $key
     */
    static public function keyValidate($key)
    {
        if(is_string($key) || is_int($key)) {
            return true;
        }
        throw new KeyCheckException(\sprintf("You can't use %s type for key", gettype($key)));
    }
}