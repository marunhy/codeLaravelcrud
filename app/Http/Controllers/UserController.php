<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUsersRequest;
use App\Services\UserService;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {

        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->index();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.add');
    }

    public function store(StoreUserRequest $request)
    {
        $requestData = $request->validated();
        if ($request->hasFile('profile_image') && $request->file('profile_image')->isValid()) {
            $requestData['profile_image'] = $this->getImage($request->file('profile_image'));
        }
        $this->userService->store($requestData);
        return redirect()->route('index')->with('success', __('User created successfully.'));
    }

    public function show(string $userId)
    {
        $user = $this->userService->show($userId);
        return view('users.show', ['user' => $user]);
    }

    public function edit(Request $request, string $userId)
    {
        $user = $this->userService->show($userId);
        return view('users.edit', ['user' => $user]);
    }

    public function update(UpdateUsersRequest $request, string $userId)
    {
        $validatedData = $request->validated();

        if (!empty($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }
        if ($request->hasFile('profile_image') && $request->file('profile_image')->isValid()) {
            File::delete($validatedData['profile_image_url']);
            $validatedData['profile_image'] = $this->getImage($request->file('profile_image'));
        }
        $this->userService->update($validatedData, $userId);
        return redirect()->route('index')->with('success', __('User updated successfully.'));
    }

    public function destroy(string $userId)
    {
        $this->userService->destroy($userId);
        return redirect()->route('index')->with('success', __('User detele successfully.'));
    }

    private function getImage($file)
    {
        $fileName = $file->getClientOriginalName();
        $filePath = $file->storeAs('images', $fileName, 'public');
        return '/storage/' . $filePath;
    }

    public function search(Request $request)
    {
        $filters = $request->only(['name', 'gender']);

        if (!isset($filters['gender'])) {
            $filters['gender'] = null;
        } elseif (is_array($filters['gender']) && count($filters['gender']) == 2) {
            $filters['gender'] = null;
        }

        $users = $this->userService->search($filters);

        return view('users.index', compact('users'));
    }
}
