<?php

namespace App\Http\Livewire\Admin\Word;

use App\Repository\Admin\User\EloquentUserRepository;
use App\Repository\Admin\Word\EloquentWordRepository;
use App\Services\DBTransaction;
use App\Services\Pagination;
use App\Services\SweetAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete(int $id)
    {
        DBTransaction::run(function () use ($id) {
            (new EloquentWordRepository())->delete($id);
            SweetAlert::alertSuccess($this, 'deleted successfully');
        }, function ($exception) {
            SweetAlert::alertError($this, $exception->getMessage());
        });
    }


    public function render()
    {
        $words = (new EloquentWordRepository())->searchWithPaginationAndGetUsers($this->search, Pagination::perPage('word'));
        return view('livewire.admin.word.index', [
            'words' => $words
        ]);
    }
}
