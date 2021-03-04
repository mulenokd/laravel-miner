<?php

namespace App\Http\Livewire;

use Livewire\Component;

class GameField extends Component
{
    public $field;

    public function openCell($row, $cell)
    {
        dd($this->field);
        $this->refresh();
    }

    public function render()
    {
        return view('livewire.game-field');
    }
}
