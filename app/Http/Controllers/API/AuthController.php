<?php

namespace App\Http\Controllers\API;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
          // 'photo' => 'image|mimes:jpeg,png,jpg|max:5048',
          'name' => 'required|string|max:255',
          'email' => 'required|string|max:255|unique:users',
          'phone_number' => 'required|max:15|unique:users,phone_number',
          'password' => 'required|string|min:8',
          // 'level_id' => 'required',
        ]);

        if ($validator->fails()) {
          return response()->json($validator->errors());
        }
        
        $photo = $request->file('photo');
        
        if ($photo) {
          $fileName = time().'_'.$photo->getClientOriginalName();
          $filePath = $photo->storeAs('images/users', $fileName, 'public');
        }
        
        // $phone_number = $request['phone_number'];
          
        // if ($request['phone_number'][0] == "0") {
        //   $phone_number = substr($phone_number, 1);
        // }

        // if ($phone_number[0] == "8") {
        //   $phone_number = "62" . $phone_number;
        // }

        $user = new user;
        $user->photo = $filePath ?? null;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make($request->password);
        $user->save();
        $token = $user->createToken('auth_token')->plainTextToken;
          
        return response()->json([
          'data' => $user,
          'access_token' => $token,
          'token_type' => 'Bearer'
        ]);
    }

    public function login(Request $request)
    {
        //
      if (! Auth::attempt($request->only('phone_number', 'password'))) {
        return response()->json([
          'message' => 'Unauthorized'
        ], 401);
      }

      $user = User::where('phone_number', $request->phone_number)->firstOrFail();
      $token = $user->createToken('auth_token')->plainTextToken;
        
      return response()->json([
        'message' => 'Login success',
        'access_token' => $token,
        'token_type' => 'Bearer'
      ]);
    }

    public function logout()
    {
      Auth::user()->tokens()->delete();

      return response()->json([
        'message' => 'logout success'
      ]);
    }
}
