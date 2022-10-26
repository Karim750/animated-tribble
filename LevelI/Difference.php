<?php

namespace Hackathon\LevelI;

/**
 * Class Difference
 */
class Difference
{
    private $a;     // Chaine A
    private $b;     // Chaine A
    public $cost;   // Coût de changement

    /**
     * @param $a    // Chaine A
     * @param $b    // Chaine B
     */
    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
        $this->cost = $this->whatIsTheCostPlease($a, $b);
    }

    /**
     * @param $this->a
     * @param $this->b
     *
     * @return mixed
     */
    public function whatIsTheCostPlease($a, $b)
    {
        // @ TODO
        $lenA = strlen($this->a);
        $lenB = strlen($this->b);
        $dis = range(0,$lenB);
        
        for ($i = 1; $i <= $lenA; $i++) {
            $dis_new[0] = $i;
            for ($j = 1; $j <= $lenB; $j++) {
                $c = ($this->a[$i - 1] === $this->b[$j - 1]) ? 0 : 1;
                $dis_new[$j] = min($dis[$j] + 1, $dis_new[$j - 1] + 1, $dis[$j - 1] + $c);
            }
            $dis = $dis_new;
        }

        return $dis[$lenB];
    }
}
