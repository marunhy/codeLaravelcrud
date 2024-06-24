<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Models\User;



class UserService
{

    public function index()
    {
        // Exclude admin users
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })->orderBy('id', 'desc')->paginate(5);

        return $users;
    }


    public function show(string $userId)
    {
        $user = User::find($userId);
        return $user;
    }

    public function store(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'profile_image' => $data['profile_image'] ?? null,
        ]);

    }

    public function update(array $data, string $userId)
    {
        $user = User::find($userId);
        if (isset($data['password'])) {
            $user->password = Hash::make($data['password']);
        }
        $user->fill($data);
        $user->save();
    }

    public function destroy(string $userId)
    {
        $user = User::find($userId);
        $user->delete();
    }

    public function search(array $filters)
    {
        $query = User::query();

        if (!empty($filters['name'])) {
            $query->where('name', 'LIKE', '%' . $filters['name'] . '%');
        }

        if (isset($filters['gender']) && $filters['gender'] !== null) {
            $query->where('gender', $filters['gender']);
        }

        return $query->orderBy('id', 'desc')->paginate(5)->appends(request()->query());
    }
}
