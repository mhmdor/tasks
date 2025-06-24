<?php

namespace App\Http\Controllers\Api;



use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use App\Traits\RestfulTrait;




class UserController extends Controller
{

    use RestfulTrait;


    public function index()
    {
        $user = User::get();
        return $this->apiResponse(['user' => $user], self::STATUS_OK, 'get User successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with(['tasks', 'categories'])->find($id);
        if (!$user) {
            return $this->apiResponse(null, self::STATUS_NOT_FOUND, 'Not Found');
        }
        return $this->apiResponse(['user' => $user], self::STATUS_OK, 'get User successfully');
    }


    /**
     * Get Profile For Customer.
     */
    public function profile()
    {
        $user = User::with(['tasks', 'categories'])->find(auth()->id());
        if (!$user) {
            return $this->apiResponse(null, self::STATUS_NOT_FOUND, 'Not Found');
        }
        return $this->apiResponse(['user' => $user], self::STATUS_OK, 'get User successfully');
    }


    public function login(LoginRequest $request)
    {

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('eventRight')->accessToken;
                return $this->apiResponse(['user' => $user, 'token' => $token], self::STATUS_CREATED, 'login successfully');
            } else {
                return $this->apiResponse(null, self::STATUS_UNAUTHORIZED, 'your password is invalid');
            }
        } else {
            return $this->apiResponse(null, self::STATUS_UNAUTHORIZED, 'your email is invalid');
        }
    }


    public function register(RegisterRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('eventRight')->accessToken;
        return $this->apiResponse(['user' => $user, 'token' => $token], self::STATUS_CREATED, 'create user successfully');
    }


    public function destroy(string $id)
    {
        $user = User::find($id);
        if (!$user) {
            return $this->apiResponse(null, self::STATUS_NOT_FOUND, 'Not Found');
        }
        User::where('id', $id)->delete();
        return $this->apiResponse(null, self::STATUS_OK, 'delete User successfully');
    }
}
