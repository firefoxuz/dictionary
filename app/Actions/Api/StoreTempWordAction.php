<?php

namespace App\Actions\Api;

use App\Models\TempWord;
use Illuminate\Http\Request;

class StoreTempWordAction
{
    public function execute(Request $request)
    {
        $tempWord = TempWord::query()->create([
            'word' => $request->word,
            'definition' => $request->definition,
        ]);

        return $tempWord;
    }
}
