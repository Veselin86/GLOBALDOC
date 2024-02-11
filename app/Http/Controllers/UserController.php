<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Type;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('layouts.users', compact('users'));
    }

    public function destroy($nia)
    {
        $user = User::findOrFail($nia);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User successfully deleted.');
    }

    public function show($nia)
    {
        $user = User::where('nia', $nia)->firstOrFail();
        return view('users.show', compact('user'));
    }

    public function edit($nia)
    {
        $user = User::findOrFail($nia);
        $types = Type::where('model', 'User')->get();

        return view('users.edit', compact('user', 'types'));
    }

    public function create()
    {
        $types = Type::where('model', 'User')->get();
        return view('users.edit', compact('types'));
    }

    public function update(Request $request, $nia)
    {
        $user = User::findOrFail($nia);

        $user->update($request->all());

        return redirect()->route('users.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nia' => 'required',
            'name' => 'required',
            'type_id' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($request->password);

        User::create($input);

        return redirect()->route('users.index');
    }
}
