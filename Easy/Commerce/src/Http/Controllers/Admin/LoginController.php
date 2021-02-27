<?php
declare(strict_types = 1);

namespace Easy\Commerce\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;

use Easy\Commerce\Http\Requests\Admin\LoginRequest;
use Easy\Commerce\Models\User\Admin;


class LoginController extends Controller
{
    public function requestToken(LoginRequest $request) : Object
    {
        $user = Admin::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        return response()->json([
          'user' => $user,
          'token' => $user->createToken($request->device_name)->plainTextToken
        ]);
    }
}
