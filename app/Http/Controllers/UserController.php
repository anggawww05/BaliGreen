<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function storeNewUser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = \App\Models\User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ]);

        return redirect()->route('login.index')->with('success', 'User registered successfully.');
    }

    public function showTableUsers()
    {
        $users = \App\Models\User::all();
        return view('admin.users.index', compact('users'));
    }

    public function showEditUser($id)
    {
        $user = \App\Models\User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function storeUpdateUser(Request $request, $id)
    {
        $user = \App\Models\User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'sometimes|nullable|string|min:8|confirmed',
            'address' => 'sometimes|nullable|string',
            'phone' => 'sometimes|nullable|string|max:20',
        ]);

        if (isset($validatedData['password'])) {
            $validatedData['password'] = $validatedData['password'];
        } else {
            unset($validatedData['password']);
        }

        $user->update($validatedData);

        return redirect()->back()->with('success', 'User updated successfully.');
    }

    public function showDetailUser($id)
    {
        $user = \App\Models\User::findOrFail($id);
        return view('admin.users.detail', compact('user'));
    }

    // public function deleteUser($id)
    // {
    //     $user = \App\Models\User::findOrFail($id);
    //     $user->delete();

    //     return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    // }

    public function indexHome()
    {
        return view('user.landing-page.home');
    }

    public function indexProfile()
    {
        // $user = auth()->user();
        return view('user.profile.profile');
        // return view('user.profile', compact('user'));
    }

    public function indexEditProfile()
    {
        // $user = auth()->user();
        return view('user.profile.edit-profile', compact('user'));
    }

    public function indexSchedule()
    {
        return view('user.schedule.schedule');
    }

    public function indexScheduleForm()
    {
        return view('user.schedule.schedule-form');
    }

    public function indexTransaction()
    {
        return view('user.transaction.transaction');
    }

    public function storeAddUser(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'password' => 'required|string|min:8',
            'role' => 'required|in:warga,desa',
        ]);

        \App\Models\User::create([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'phone' => $validate['phone'],
            'address' => $validate['address'],
            'password' => $validate['password'],
            'role' => $validate['role'],
        ]);

        return redirect()->route('admin.manage-user.index')->with('success', 'User berhasil ditambahkan!');
    }

    public function UpdateUser(Request $request, $id)
    {
        $user = \App\Models\User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'role' => 'required|in:warga,desa',
            'password' => 'nullable|string|min:8',
        ]);

        if (empty($validated['password'])) unset($validated['password']);

        $user->update($validated);

        return redirect()->route('admin.manage-user.index')->with('success', 'User updated.');
    }

    public function deleteUser($id)
    {
        $user = \App\Models\User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.manage-user.index')->with('success', 'User deleted successfully.');
    }
}
