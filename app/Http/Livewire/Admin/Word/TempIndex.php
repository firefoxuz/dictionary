<?php

namespace App\Http\Livewire\Admin\Word;

use App\Models\TempWord;
use App\Models\Word;
use App\Repository\Admin\Word\EloquentWordRepository;
use App\Services\DBTransaction;
use App\Services\Pagination;
use App\Services\SweetAlert;
use Livewire\Component;
use Livewire\WithPagination;

class TempIndex extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function add(int $id)
    {
        DBTransaction::run(function () use ($id) {
            $temp = TempWord::query()->findOrFail($id);
            $arr = $temp->toArray();
            $arr['user_id'] = auth()->id();
            Word::query()->create($arr);
            $temp->delete();
            SweetAlert::alertSuccess($this, 'added successfully');
        }, function ($exception) {
            SweetAlert::alertError($this, $exception->getMessage());
        });

    }

    public function delete(int $id)
    {
        DBTransaction::run(function () use ($id) {
            TempWord::query()->findOrFail($id)->delete();
            SweetAlert::alertSuccess($this, 'deleted successfully');
        }, function ($exception) {
            SweetAlert::alertError($this, $exception->getMessage());
        });
    }


    public function render()
    {
        $words = (new EloquentWordRepository())->searchTempWithPagination($this->search, Pagination::perPage('word'));
        return view('livewire.admin.word.temp-index', [
            'words' => $words
        ]);
    }
}
