<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterAuthRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;


class AuthController extends Controller
{

    public function __construct()
    {
//        auth:api is coming from config auth.php jwt line
        $this->middleware('auth:api', ['except' => ['login', 'register', 'uploadXml', 'destroy']]);
    }

    public bool $loginAfterSignUp = true;


    public function register(Request $request): \Illuminate\Http\JsonResponse
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->year_id = $request->year_id;
        $user->password = bcrypt($request->password);
        $user->save();


        if ($this->loginAfterSignUp) {
            return $this->login($request);
        }

        return response()->json([
            'status' => 'ok', 'data' => $user
        ], 200);
    }



    public function login(Request $request): \Illuminate\Http\JsonResponse
    {

        $input = $request->only('email', 'password');
        $jwt_token = null;

        if (!$jwt_token = JWTAuth::attempt($input)) {
            return response()->json([
                'status' => 'invalid_credentials',
                'message' => 'Invalid email or password.',
            ], 401);
        }
        return response()->json([
            'status' => 'ok',
            'token' => $jwt_token,
        ]);
    }




    public function logout(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $this->validate($request, [
                'token' => 'required'
            ]);
        } catch (ValidationException $e) {
        }

        try {
            JWTAuth::invalidate($request->token);
            return response()->json([
                'status' => 'ok',
                'message' => 'Successful logout.'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'status' => 'unknown_error',
                'message' => 'The user could not be logged out.'
            ], 500);
        }
    }




    public function getAuthUser(Request $request): \Illuminate\Http\JsonResponse
    {
        $user = auth()->user();
        return response()->json(['user' => $user]);
    }


    protected function jsonResponse($data, $code = 200): \Illuminate\Http\JsonResponse
    {

        return response()->json(
            $data,
            $code,
            [
                'Content-Type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }

    public function rateMe(Request $request): \Illuminate\Http\JsonResponse
    {
        $user = auth()->user();
        $user->happy = $request->happy;
        $user->rating = $request->rating;
       if( $user->save())
           return response()->json([
               'status' => 'ok', 'data' => $user
           ], 200);
       else
           return response()->json([
               'status' => 'unknown_error',
               'message' => 'Some Thing not Working.'
           ], 500);
    }

    public function destroy()
    {
        //
        User::truncate();
        return view('noHack');
//        return response()->json([
//            'status' => 'success',
//            'message' => 'party',
//        ], 200);
    }
}
