<?php

namespace Hackathon\LevelD;

class Bobby
{
    public $wallet = array();
    public $total;

    public function __construct($wallet)
    {
        $this->wallet = $wallet;
        $this->computeTotal();
    }

    /**
     * @TODO
     *
     * @param $price
     *
     * @return bool|int|string
     */
    public function giveMoney($price)
    {
        if ($this->total < $price)
            return false;
        
        $rest = $price;
        while ($rest > 0) {
            $max = 1;
            foreach ($this->wallet as $elt) {
                if (is_numeric($elt)) {
                    if ($elt > $max){
                        $max = $elt;
                    }
                }
                
            }
            $rest -= $max;
            $this->total -= $max;
            unset($this->wallet[array_search($max, $this->wallet)]);
        }
        return true;
    }

    /**
     * This function updates the amount of your wallet
     */
    private function computeTotal()
    {
        $this->total = 0;

        foreach ($this->wallet as $element) {
            if (is_numeric($element)) {
                $this->total += $element;
            }
        }
    }
}
