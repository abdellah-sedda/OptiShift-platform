<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController as BaseController;

class RegisterController extends BaseController
{

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'birthdate' => $data['birthdate'],
            'image' => $data['image'] ?? null,
            'phone' => $data['phone'] ?? null,
            'address' => $data['address'] ?? null,
            'identity_card' => $data['identityCard'] ?? null,
            'type' => $data['type']
        ]);

        if ($user->type === 'client') {
            $user->client()->create();
        } elseif ($user->type === 'depot') {
            $user->depot()->create();
        } elseif ($user->type === 'deliveryman') {
            $user->deliveryman()->create();
        }

        return $user;
    }


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'birthdate' => ['nullable', 'date'],
            'image' => ['nullable', 'image'],
            'phone' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'identityCard' => ['nullable', 'string', 'max:255'],
            'type' => ['required', 'string', Rule::in(['admin', 'client', 'depot', 'deliveryman'])]
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        event(new Registered($user = $this->create($request->all())));

        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $success['user'] =  $user;

        return $this->sendResponse($success, 'User register successfully.');
    }


    /**
    * Login api
    *
    * @return \Illuminate\Http\Response
    */
    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (Auth::attempt($credentials)) {
                $user = Auth::user();

                $success['token'] =  $user->createToken('MyApp')->plainTextToken; 
                $success['user'] =  $user;
                return $this->sendResponse($success, 'User login successfully.');
            } else {
                return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
            }

        } catch (ValidationException $e) {
            return response()->json(['error' => $e->validator->errors()->first()], 422);
        }
    }

    /**
     * Logout api
     * 
     * 
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'User logged out successfully'], 200);
    }
}
