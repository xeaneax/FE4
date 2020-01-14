<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Exercise1 extends Controller
{
    /**
    * Handle the incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function __invoke(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'operation' => 'required|in:addition,subtraction,multiplication,division',
                'x' => 'required|numeric',
                'y' => 'required|numeric',
            ]
        );
        switch($validator->fails()) {
            case false: {
                switch ($request->operation) {
                    case 'addition': {
                        $response = $request->x + $request->y;
                        break;
                    }
                    case 'subtraction': {
                        $response = $request->x - $request->y;
                        break;
                    }
                    case 'multiplication': {
                        $response = $request->x * $request->y;
                        break;
                    }
                    case 'division': {
                        $response = $request->x / $request->y;
                        break;
                    }
                }
                return response()->json(['response' => $response ?? null], 200, [], JSON_PRETTY_PRINT);
            }
            default: {
                return response()->json(['response' => 'bad request'], 400, [], JSON_PRETTY_PRINT);
                break;
            }
        }
    }
}
