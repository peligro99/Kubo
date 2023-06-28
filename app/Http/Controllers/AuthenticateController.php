<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccessRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticateController extends Controller
{
   public function register(RegisterRequest $request){
    $user = new User();
    $user-> name = $request->name;
    $user-> email = $request->email;
    $user-> password = bcrypt($request->password);
    $user-> save();

    return response()->json([
        'res' => true,
        'msg' => 'Usuario registrado correctamente'
    ],200);

   }
   public function access(AccessRequest $request)
   {
    $user = User::where('email', $request->email)->first();
 
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'msg' => ['Las credenciales son incorrectas.'],
        ]);
    }
    $token = $user->createToken($request->email)->plainTextToken;

    return response()->json([
        'res' => true,
        'token' => $token
    ],200);
   }
   public function logoutSession(Request $request)
   {
    $request->user()->currentAccessToken()->delete();
    return response()->json([
        'res' => true,
        'msg' => 'Token eliminado correctamente'
    ],200);
   }
}
