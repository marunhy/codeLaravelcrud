<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;



class UserService
{

    public function indexreader()
    {
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })
            ->whereHas('roles', function ($query) {
                $query->where('name', 'reader');
            })
            ->orderBy('id', 'desc')
            ->paginate(5);
        return $users;
    }

    public function indexwriter()
    {
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'admin');
        })
            ->whereHas('roles', function ($query) {
                $query->where('name', 'writer');
            })
            ->orderBy('id', 'desc')
            ->paginate(5);
        return $users;
    }

    public function indexsubadmin()
    {
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'super_admin');
        })
            ->whereHas('roles', function ($query) {
                $query->where('name', 'sub_admin');
            })
            ->orderBy('id', 'desc')
            ->paginate(5);
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

    public function searchreader(array $filters)
    {
        $query = User::query();

        // Apply name filter if provided
        if (!empty($filters['name'])) {
            $query->where('name', 'LIKE', '%' . $filters['name'] . '%');
        }

        // Apply gender filter if provided
        if (isset($filters['gender']) && $filters['gender'] !== null) {
            $query->where('gender', $filters['gender']);
        }

        // Filter by role (only 'reader')
        $query->whereHas('roles', function ($query) {
            $query->where('name', 'reader');
        });

        return $query->orderBy('id', 'desc')->paginate(5)->appends(request()->query());
    }

    public function searchwriter(array $filters)
    {
        $query = User::query();

        // Apply name filter if provided
        if (!empty($filters['name'])) {
            $query->where('name', 'LIKE', '%' . $filters['name'] . '%');
        }

        // Apply gender filter if provided
        if (isset($filters['gender']) && $filters['gender'] !== null) {
            $query->where('gender', $filters['gender']);
        }

        // Filter by role (only 'reader')
        $query->whereHas('roles', function ($query) {
            $query->where('name', 'writer');
        });

        return $query->orderBy('id', 'desc')->paginate(5)->appends(request()->query());
    }

    public function searchsubadmin(array $filters)
    {
        $query = User::query();

        // Apply name filter if provided
        if (!empty($filters['name'])) {
            $query->where('name', 'LIKE', '%' . $filters['name'] . '%');
        }

        // Apply gender filter if provided
        if (isset($filters['gender']) && $filters['gender'] !== null) {
            $query->where('gender', $filters['gender']);
        }

        // Filter by role (only 'reader')
        $query->whereHas('roles', function ($query) {
            $query->where('name', 'sub_admin');
        });

        return $query->orderBy('id', 'desc')->paginate(5)->appends(request()->query());
    }

    public function changeRoleToWriter($userId)
    {
        $user = User::findOrFail($userId);
        $readerRole = Role::where('name', 'reader')->first();
        $writerRole = Role::where('name', 'writer')->first();

        if ($user->roles()->detach($readerRole)) {
            $user->roles()->attach($writerRole);
        }

        return $user;
    }


}
