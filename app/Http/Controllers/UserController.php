<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Carbon\Exceptions\Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
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
    }

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
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return response()->json(['user' => $user], 201);
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (Auth::attempt($credentials)) {
                $user = auth()->user();
                info('Login successful', ['user' => $user]);

                return response()->json([
                    'message' => 'Login successful', 'user' => $user
                ], 200);
            } else {
                return response()->json(['error' => "Email et/ou mot de passe incorrect(s)."], 422);
            }

        } catch (ValidationException $e) {
            return response()->json(['error' => $e->validator->errors()->first()], 422);
        }
    }
    
    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return response()->json(['message' => 'Logout successful'], 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Logout failed'], 400);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
