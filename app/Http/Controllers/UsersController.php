<?php

namespace App\Http\Controllers;

use harmonic\InertiaTable\Facades\InertiaTable;
use Inertia\Inertia;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\User;

class UsersController extends Controller {
    public function index() {
        $user = new User();
        return InertiaTable::index($user, ['id', 'name', 'email', 'deleted_at']);
    }

    public function create() {
        return Inertia::render('Users/Create');
    }

    public function store() {
        Auth::user()->create(
            Request::validate([
                'name' => ['required', 'max:50'],
                'email' => ['required', 'max:50', 'email', Rule::unique('users')],
                'password' => ['nullable'],
            ])
        );

        return Redirect::route('users');
    }

    public function edit(User $user) {
        return Inertia::render('Users/Edit', [
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'deleted_at' => $user->deleted_at,
            ],
        ]);
    }

    public function update(User $user) {
        Request::validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'max:50', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable'],
        ]);

        $user->update(Request::only('name', 'email'));

        if (Request::get('password')) {
            $user->update(['password' => Request::get('password')]);
        }

        return Redirect::route('users.edit', $user);
    }

    public function destroy(User $user) {
        $user->delete();

        return Redirect::route('users.edit', $user);
    }

    public function restore(User $user) {
        $user->restore();

        return Redirect::route('users.edit', $user);
    }
}
