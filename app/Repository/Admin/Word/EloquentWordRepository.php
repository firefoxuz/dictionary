<?php

namespace App\Repository\Admin\Word;

use App\Models\TempWord;
use App\Models\User;
use App\Models\Word;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class EloquentWordRepository implements IWordRepository
{
    public function searchWithPagination($search = '', $count = 15): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return Word::query()
            ->when($search != '', function ($query) use ($search) {
                return $query->where('word', 'like', '%' . $search . '%');
            })
            ->paginate($count);
    }

    public function searchTempWithPagination($search = '', $count = 15): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return TempWord::query()
            ->when($search != '', function ($query) use ($search) {
                return $query->where('word', 'like', '%' . $search . '%');
            })
            ->paginate($count);
    }

    public function searchWithPaginationAndGetUsers($search = '', $count = 15): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return Word::query()
            ->when($search != '', function ($query) use ($search) {
                return $query->where('word', 'like', '%' . $search . '%');
            })
            ->with('user')
            ->paginate($count);
    }

    /**
     * Return all users
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Word::query()->select([
            'id',
            'name',
            'email',
            'created_at'
        ])->get();
    }

    /**
     * Create a new user
     * @param array $data
     * @return User
     */
    public function create(array $data)
    {
        return Word::query()->create($data);
    }

    /**
     * Update user by id
     * @param array $data Data to be updated
     * @param int $id User id
     * @return int
     */
    public function update(array $data, $id)
    {
        return Word::query()->where('id', $id)->update($data);
    }

    /**
     * Delete user by id
     * @param int $id User id
     * @return Model
     * @throws \Exception
     */
    public function delete(int $id)
    {
        $word = $this->find($id);

        if (!$word->delete()) {
            throw new \Exception('can not delete a word');
        }

        return $word;
    }

    /**
     * Find user by id
     * @param int $id User id
     * @return Model
     */
    public function find($id)
    {
        return Word::query()->findOrFail($id);
    }
}
