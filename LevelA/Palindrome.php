<?php

namespace Hackathon\LevelA;

class Palindrome
{
    private $str;

    public function __construct($str)
    {
        $this->str = $str;
    }

    /**
     * This function creates a palindrome with his $str attributes
     * If $str is abc then this function return abccba
     *
     * @TODO
     * @return string
     */
    public function generatePalindrome()
    {
        /** @TODO */
        $tmp = utf8_decode($this->str);
        $tmp = strrev($tmp);
        $reverse = utf8_encode($tmp);
        return $this->str.$reverse;
    }

}