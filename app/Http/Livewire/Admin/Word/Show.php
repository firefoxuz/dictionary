<?php

namespace App\Http\Livewire\Admin\Word;

use Livewire\Component;

class Show extends Component
{
    public $word;

    public function mount($word)
    {
        $this->word = $word;
    }

    public function render()
    {
        return view('livewire.admin.word.show',[
            'word'=>$this->word,
            'splited_definition' => explode(' ', $this->word->definition),
        ]);
    }
}
