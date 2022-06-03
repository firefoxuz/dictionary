<?php

namespace App\Http\Controllers\Api\Word;

use App\Http\Controllers\Controller;
use App\Http\Requests\WordSearchRequest;
use App\Models\Word;

class WordController extends Controller
{
    public function index()
    {
        return Word::select([
            'id',
            'word',
            'definition'
        ])->paginate(30);
    }

    public function show(Word $word)
    {
        return $word->only([
            'id',
            'word',
            'definition',
            'created_at'
        ]);
    }

    public function search(WordSearchRequest $request)
    {
        return Word::query()->select([
            'id',
            'word',
            'definition',
            'created_at'
        ])->where('word', 'like', '%' . $request->key . '%')
            ->get();
    }
}
