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
            $r = json_decode($request->getContent(), true) ?? $request->all(),
            [
                'operation' => 'required|in:addition,subtraction,multiplication,division',
                'x' => 'required|numeric',
                'y' => 'required|numeric',
            ]
        );
        switch($validator->fails()) {
            case false: {
                switch (($r = (object) $r)->operation) {
                    case 'addition': {
                        $response = $r->x + $r->y;
                        break;
                    }
                    case 'subtraction': {
                        $response = $r->x - $r->y;
                        break;
                    }
                    case 'multiplication': {
                        $response = $r->x * $r->y;
                        break;
                    }
                    case 'division': {
                        switch($r->y) {
                            case 0: {
                                return response()->json(['response' => 'cannot divide by zero'], 400, [], JSON_PRETTY_PRINT);
                                break;
                            }
                            default: {
                                $response = $r->x / $r->y;
                                break;
                            }
                        }
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
