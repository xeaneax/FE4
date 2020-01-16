<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ExerciseFinal extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'username' => 'required|string',
                'password' => 'required|string',
            ]
        );

        switch($validator->fails()) {
            case false: {
                if($user = User::where(['username' => $request->username])->first()) {
                    if(Hash::check($request->password, $user->password)) {
                        return response()->json(['response' => 'success'], 200, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
                    } else {
                        return response()->json(['response' => 'wrong credentials'], 401, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
                    }
                } else {
                    return response()->json(['response' => 'user not found'], 404, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
                }
                break;
            }
            default: {
                return response()->json($validator->failed(), 400, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
            }
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'username' => 'required|string|min:4|max:20|alpha_num',
                'password' => 'required|string|confirmed|min:4|max:20',
            ]
        );

        switch($validator->fails()) {
            case false: {
                if(User::where(['username' => $request->username])->first()) {
                    return response()->json(['response' => 'username already exists'], 409, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
                } else {
                    User::create([
                        'username' => $request->username,
                        'password' => Hash::make($request->password)
                    ]);
                    return response()->json(['response' => 'user successfully created'], 200, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
                }
                break;
            }
            default: {
                return response()->json($validator->failed(), 400, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
            }
        }
    }

}
