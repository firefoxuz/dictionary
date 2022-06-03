<?php

namespace App\Http\Controllers\Api\Word;

use App\Actions\Api\StoreTempWordAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTempWordRequest;
use Illuminate\Http\Request;

class TempWordController extends Controller
{
    public function store(StoreTempWordRequest $request, StoreTempWordAction $storeTempWordAction)
    {
       $tempWord =  $storeTempWordAction->execute($request);

        return response()->json($tempWord);
    }
}
