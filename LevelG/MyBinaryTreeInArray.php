<?php

namespace Hackathon\LevelG;

class MyBinaryTreeInArray
{
    private $tree = array();

    public function __construct()
    {
        $this->tree[1] = null;
    }

    public function isEmpty()
    {
        return count($this->tree);
    }

    public function getRightValue($index)
    {
        return (array_key_exists($index * 2 + 1, $this->tree)) ? $this->tree[$index * 2 + 1] : false;
    }

    public function getLeftValue($index)
    {
        return (array_key_exists($index * 2, $this->tree)) ? $this->tree[$index * 2] : false;
    }

    public function getFather($index)
    {
        if (1 === $index) {
            return false;
        }

        return $this->tree[$index % 2];
    }

    public function add($value)
    {
        $root = $this->tree[1];
        if (is_null($root)) {
            $this->tree[1] = $value;

            return $this;
        }
        $index = $this->course(1, $value); //on démarre le parcours par la root
        $this->tree[$index] = $value;

        return $this;
    }

    public function hasValue($val2find)
    {
        foreach ($this->tree as $key => $value) {
            if ($val2find === $value) {
                return $key;
            }
        }

        return null;
    }

    /**
     * @param $index
     * @param $value
     * @TODO
     * @return mixed
     */
    public function course($index, $value)
    {
        //index = root
        if($this->tree[1] == null){
            return 1;
        }
        $ind = 1;
        while(array_key_exists($ind, $this->tree)){
            if($value < $this->tree[$ind]){
                $ind = $ind * 2;
            }
            else{
                $ind = $ind * 2 + 1;
            }
        }
        return $ind;
    }

    /**
     * @TOOLBOX
     * @param $index
     * @return bool
     */
    private function nodeExist($index)
    {
        return array_key_exists($index, $this->tree);
    }

    /**
     * @TOOLBOX
     * @param $index
     * @return bool
     */
    private function getRightIndex($index)
    {
        return $index * 2 + 1;
    }

    /**
     * @TOOLBOX
     * @param $index
     * @return bool
     */
    private function getLeftIndex($index)
    {
        return $index * 2;
    }
}
