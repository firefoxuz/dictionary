<?php

namespace App\Http\Livewire\Admin\Word;

use App\Repository\Admin\Word\EloquentWordRepository;
use App\Services\DBTransaction;
use App\Services\SweetAlert;
use Livewire\Component;

class Create extends Component
{
    public string $word = '';
    public string $definition = '';

    protected array $rules = [
        'word' => 'required|string|max:128',
        'definition' => 'required|string|max:512',
    ];


    /**
     * Store a newly created user in database.
     *
     * @return void
     */
    public function create()
    {
        $validatedData = $this->validate();

        DBTransaction::run(function () use ($validatedData) {
            (new EloquentWordRepository())->create([
                'word' => $validatedData['word'],
                'definition' => $validatedData['definition'],
                'user_id' => auth()->user()->id,
            ]);
            SweetAlert::alertSuccess($this, 'created successfully');
        }, function ($exception) {
            SweetAlert::alertError($this, $exception->getMessage());
        });

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.word.create');
    }
}
