<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Inertia\Inertia;

class LoginPageController extends Controller
{

    public function index()
    {
        $users = User::all();

        return inertia('List', ['users' => $users]);
    }

    public function store(LoginRequest $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $request->authenticate();

        $request->session()->regenerate();

        return redirect('/landing')->with('success', 'Login Successfully');
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('loginPage')->with('logout', 'Logout Successfully');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        // $user = new User();

        // $user->name = $request->username;
        // $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        // $user->email_verified_at = now();
        // $user->remember_token = Str::random(10);

        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        if ($user->save()) {
            return redirect('loginPage')->with('create', 'User Created Successfully');
        }
        return redirect('registerPage')->with('error', 'User not Created');
    }

    public function edit(User $user)
    {
        // dd($user);
        return Inertia::render('edit', ['users' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'nullable'
        ]);

        $user->update($validated);

        return redirect('list')->with('edit', 'User Edited Successfully');
    }

    public function delete(User $user)
    {
        $userId = $user->id;
        $user->delete();

        if ($userId == auth()->user()->id) {
            return redirect()->route('loginPage')->with('delete', 'User deleted Successfully');
        }

        return redirect('landing')->with('delete', 'User deleted successfully');
    }
}
