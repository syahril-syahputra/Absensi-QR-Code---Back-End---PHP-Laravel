<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthMobileController extends Controller
{
    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validate->fails()) {
            $respon = [
                'status' => 'error',
                'msg' => 'Validator error',
                'errors' => $validate->errors(),
                'content' => null,
            ];
            return response()->json($respon, 200);
        } else {



            $user = Employe::where('username', $request->username)->where('password', $request->password)->first();
            if (!is_null($user)) {



                $tokenResult = $user->createToken('token-auth')->plainTextToken;
                $respon = [
                    'status' => 'success',
                    'msg' => 'Login successfully',
                    'errors' => null,
                    'content' => [
                        'status_code' => 200,
                        'access_token' => $tokenResult,
                        'token_type' => 'Bearer',
                    ]
                ];
                return response()->json($respon, 200);
            }else
            {
                $respon = [
                    'status' => 'fail',

                ];
                return response()->json($respon, 401);
            }
        }
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();
        $respon = [
            'status' => 'success',
            'msg' => 'Logout successfully',
            'errors' => null,
            'content' => null,
        ];
        return response()->json($respon, 200);
    }
}
