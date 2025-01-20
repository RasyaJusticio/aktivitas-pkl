<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class RegisterUserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterUserRequest $request)
    {
        $validatedData = $request->validated();

        $user = User::create([
            'name' => explode('@', $validatedData['email'])[0],
            'email' => $validatedData['email'],
            'password' => $validatedData['password']
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('home'));
    }
}
