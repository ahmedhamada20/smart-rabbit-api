<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResources;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }


    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {

            return response($validator->errors(), 422);
        }

        $findUser = User::where('email',$request->email)->first();
        if($findUser){
            if ($findUser->type == "admin"){
                return response()->json([
                    'status' => 'error',
                    'message' => 'The User Not permission',
                ], 401);
            }
        }


        $credentials = $request->only('email', 'password');

        $token = Auth::guard('api')->attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Auth::guard('api')->user();
        return response()->json([
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ],
            'status' => 'success',
            'user' => new UserResources($user),

        ]);

    }


    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'type_user' => 'required|in:male,female',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|numeric|unique:users,phone',
            'password' => 'required|string|confirmed|min:6',
//            'photo_person' => 'required|image',
//            'photo_driving' => 'required|image',
        ]);

        if ($validator->fails()) {

            return response($validator->errors(), 422);
        }

//        if ($request->hasFile('photo_person')) {
//            $imageName = time() . '.' . $request->photo_person->extension();
//            // Public Folder
//            $files = $request->photo_person->move('images', $imageName);
//        }
//        if ($request->hasFile('photo_driving')) {
//            $imageName = time() . '.' . $request->photo_driving->extension();
//            // Public Folder
//            $files2 = $request->photo_driving->move('images', $imageName);
//        }

        $user = User::create([
            'type' => 'client',
            'status' => 'active',
            'type_user' => $request->type_user,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        $token = Auth::guard('api')->login($user);

        return response()->json([
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ],
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => new UserResources($user),

        ]);
    }

    public function logout()
    {
        Auth::guard('api')->logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }


    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::guard('api')->user(),
            'authorisation' => [
                'token' => Auth::guard('api')->refresh(),
                'type' => 'bearer',
            ]
        ]);
    }
}
