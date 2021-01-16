<?php
// declare(strict_types = 1);

namespace Easy\AdminUser\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;

use Easy\AdminUser\Http\Requests\LoginRequest;
use Easy\AdminUser\Models\User;


class LoginController extends Controller
{

    public function login(LoginRequest $request)
    {
      $user = User::where('email', $request->email)->first();

      if (! $user || ! Hash::check($request->password, $user->password)) {
          throw ValidationException::withMessages([
              'email' => ['The provided credentials are incorrect.'],
          ]);
      }
      return $user->createToken($request->device_name)->plainTextToken;
    }
}
