<?php

namespace App\Http\Livewire\Admin\Word;

use App\Repository\Admin\Word\EloquentWordRepository;
use App\Services\DBTransaction;
use App\Services\SweetAlert;
use Livewire\Component;

class Edit extends Component
{
    public int $word_id = 0;
    public string $word = '';
    public string $definition = '';

    protected array $rules = [
        'word' => 'required|string|max:128',
        'definition' => 'required|string|max:512',
    ];

    public function mount($word){
        $this->word = $word->word;
        $this->definition = $word->definition;
        $this->word_id = $word->id;
    }

    public function update()
    {
        $validatedData = $this->validate();

        DBTransaction::run(function () use ($validatedData) {
            (new EloquentWordRepository())->update([
                'word' => $validatedData['word'],
                'definition' => $validatedData['definition'],
            ],$this->word_id);
            SweetAlert::alertSuccess($this, 'updated successfully');
        }, function ($exception) {
            SweetAlert::alertError($this, $exception->getMessage());
        });

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.word.edit');
    }
}
