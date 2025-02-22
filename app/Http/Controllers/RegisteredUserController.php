<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;

class RegisteredUserController extends Controller
{

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userAttr = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users', 'max:255'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $employerAttr = $request->validate([
            'employer' => 'required',
            'logo' => ['required', File::types(['png', 'jpg', 'jpeg', 'webp'])],
        ]);

        $user = User::create($userAttr);

        $logoPath = $request->logo->store('logos');

        $user->employer()->create([
            'name' => $employerAttr['employer'],
            'logo' => $logoPath
        ]);

        Auth::login($user);

        return redirect('/success');
    }

    public function success() {
        return view('auth.success');
    }

}
