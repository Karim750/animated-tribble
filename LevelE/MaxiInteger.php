<?php

namespace Hackathon\LevelE;

class MaxiInteger
{
    private $value;
    private $reverse;

    public function __construct($value)
    {
        $this->setValue($value);
    }

    /**
     * @FIX : CAN BE UPDATED
     *
     * @param MaxiInteger $other
     * @return $this|MaxiInteger
     */
    public function add(MaxiInteger $other)
    {
        if (is_null($other)) {
            return $this;
        }

        /**
         * You can delete this part of the code
         */
        $maxLength = max(strlen($this->getValue()), strlen($other->getValue()));
        if ($maxLength) {
            $other = $other->fillWithZero($maxLength);
            $this->setValue($this->fillWithZero($maxLength)->getValue());
        }

        return $this->realSum($this, $other);
    }

    /**
     * @TODO
     *
     * @param MaxiInteger $a
     * @param MaxiInteger $b
     * @return MaxiInteger
     */
    private function realSum( $a, $b)
    {
        $a = $a->getValue();
        $b = $b->getValue();
        $result = '';
        $carry = 0;
        $i = strlen($a) - 1;
        $j = strlen($b) - 1;
        while ($i >= 0 || $j >= 0) {
            $sum = $carry;
            if ($j >= 0) {
                $sum += $b[$j--];
            }
            if ($i >= 0) {
                $sum += $a[$i--];
            }
            $result = ($sum % 10) . $result;
            $carry = (int)($sum / 10);
        }
        if ($carry) {
            $result = $carry . $result;
        }
        return new MaxiInteger($result);
    }

    private function setValue($value)
    {
        $this->value = $value;
        $this->reverse = $this->createReverseValue($value);
    }

    public function getValue()
    {
        return $this->value;
    }

    private function getNthOfMaxiInteger($n)
    {
        return $this->value[$n];
    }
    private function createReverseValue($value)
    {
        return strrev($value);
    }

    private function fillWithZero($totalLength)
    {
        return new self(strrev(str_pad($this->reverse, $totalLength, '0')));
    }
}
