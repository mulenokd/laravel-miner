<?php
namespace App\Classes;

class Game 
{
    public $fieldWidth;
    public $fieldHeight;
    public $bombCount;
    public $field = [];

    public function __construct($width = 3, $height = 3, $bombCount = 3)
    {
        $this->fieldWidth = $width;
        $this->fieldHeight = $height;
        $this->bombCount = $bombCount;
        $this->generateField();
        $this->placeBombs();
        
        return $this->field;
    }

    private function generateField()
    {   
        for ( $i = 0; $i < $this->fieldWidth; $i++) { 
            for ( $j = 0; $j < $this->fieldHeight; $j++) {
                $this->field[$i][$j] = 0;
            }
        }
    }

    private function placeBombs()
    {
        for ($i = 0; $i < $this->bombCount; $i ++) { 
            $this->generateBomb();
        }
    }

    private function generateBomb()
    {
        $width = random_int(0, $this->fieldWidth - 1);
        $height = random_int(0, $this->fieldHeight - 1);
        
        if ($this->field[$width][$height] === 'B'){
            $this->generateBomb();
        } else {
            $this->field[$width][$height] = 'B';
            $this->generateLabels($width, $height);
        }
    }

    private function generateLabels($width, $height)
    {

        if (isset($this->field[$width - 1][$height - 1])){
            if ($this->field[$width - 1][$height - 1] !== 'B'){
                $this->field[$width - 1][$height - 1] ++;
            }
        }

        if (isset($this->field[$width][$height - 1])){
            if ($this->field[$width][$height - 1] !== 'B'){
                $this->field[$width][$height - 1] ++;
            }
        }

        if (isset($this->field[$width + 1][$height - 1])){
            if ($this->field[$width + 1][$height - 1] !== 'B'){
                $this->field[$width + 1][$height - 1] ++;
            }
        }

        if (isset($this->field[$width - 1][$height])){
            if ($this->field[$width - 1][$height] !== 'B'){
                $this->field[$width - 1][$height] ++;
            }
        }

        if (isset($this->field[$width + 1][$height])){
            if ($this->field[$width + 1][$height] !== 'B'){
                $this->field[$width + 1][$height] ++;
            }
        }

        if (isset($this->field[$width - 1][$height + 1])){
            if ($this->field[$width - 1][$height + 1] !== 'B'){
                $this->field[$width - 1][$height + 1] ++;
            }
        }

        if (isset($this->field[$width][$height + 1])){
            if ($this->field[$width][$height + 1] !== 'B'){
                $this->field[$width][$height + 1] ++;
            }
        }

        if (isset($this->field[$width + 1][$height + 1])){
            if ($this->field[$width + 1][$height + 1] !== 'B'){
                $this->field[$width + 1][$height + 1] ++;
            }
        }

    }

}