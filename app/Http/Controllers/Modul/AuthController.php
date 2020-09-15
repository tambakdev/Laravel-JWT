<?php

namespace App\Http\Controllers\Modul;

use JWTAuth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Transformers\ProfileTransformer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Fractal\Facades\Fractal;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // add lastlogin
        DB::table('users')
            ->where('email', '=', $request->email)
            ->update([
                'last_login_at'    => now(),
                'last_login_ip'    => $this->request->ip(),
            ]);

        return $this->createNewToken($token);
    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    // public function register(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|string|between:2,100',
    //         'email' => 'required|string|email|max:100|unique:users',
    //         'password' => 'required|string|confirmed|min:6',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json($validator->errors()->toJson(), 400);
    //     }

    //     $user = User::create(array_merge(
    //         $validator->validated(),
    //         ['password' => bcrypt($request->password)]
    //     ));

    //     return response()->json([
    //         'message' => 'User successfully registered',
    //         'user' => $user
    //     ], 201);
    // }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refreshToken()
    {
        return $this->createNewToken(auth()->refresh());
    }


    public function getUserAuth()
    {
        $data = User::find(Auth::user()->id);
        $response = fractal()
            ->item($data)
            ->transformWith(new ProfileTransformer)
            ->toArray();
        return response()->json($response, 200);
    }


    public function updateUserAuth(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5'
        ]);

        $updateUser = User::find(Auth::user()->id);
        $updateUser->name = ucwords($request->name);
        $updateUser->save();

        $response = fractal()
                ->item($updateUser)
                ->transformWith(New ProfileTransformer)
                ->addMeta(['message' => 'Hore, profile berhasil diperbarui'])
                ->toArray();

        return response()->json($response, 200);
    }

    public function updatepasswordUserAuth(Request $request)
    {

        $current_password = auth()->user()->password;
        if (Hash::check($request->oldpass, $current_password)) {
            $this->validate($request, [
                'newpass' => 'required|min:6',
                'repass' => 'required|same:newpass'
            ]);

            User::find(Auth::user()->id)
                ->update(['password' => Hash::make($request->repass)]);
            return response()->json(['message' => 'Hore, password berhasil diperbarui'], 200);
        } else {
            return response()->json(['message' => 'Hemm, Password lama tidak cocok'], 400);
        }
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}
