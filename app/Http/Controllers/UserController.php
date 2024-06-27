<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUsersRequest;
use App\Services\UserService;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;


class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {

        $this->userService = $userService;
    }

    public function indexreader()
    {
        $users = $this->userService->indexreader();
        return view('users.index-reader', compact('users'));
    }

    public function indexwriter()
    {
        $users = $this->userService->indexwriter();
        return view('users.index-writer', compact('users'));
    }

    public function indexsubadmin()
    {
        $users = $this->userService->indexsubadmin();
        return view('users.index-subadmin', compact('users'));
    }

    public function createreader()
    {
        return view('users.addreader');
    }

    public function storereader(StoreUserRequest $request)
    {
        $requestData = $request->validated();

        if ($request->hasFile('profile_image') && $request->file('profile_image')->isValid()) {
            $requestData['profile_image'] = $this->getImage($request->file('profile_image'));
        }

        $user = $this->userService->store($requestData);

        $role = Role::where('name', 'reader')->first();
        if ($role) {
            $user->roles()->attach($role);
        }

        return redirect()->route('indexreader')->with('success', __('User created successfully.'));
    }

    public function createwriter()
    {
        return view('users.addwriter');
    }

    public function storewriter(StoreUserRequest $request)
    {
        $requestData = $request->validated();

        if ($request->hasFile('profile_image') && $request->file('profile_image')->isValid()) {
            $requestData['profile_image'] = $this->getImage($request->file('profile_image'));
        }

        $user = $this->userService->store($requestData);

        $role = Role::where('name', 'writer')->first();
        if ($role) {
            $user->roles()->attach($role);
        }

        return redirect()->route('indexwriter')->with('success', __('User created successfully.'));
    }

    public function createsubadmin()
    {
        return view('users.addsub-admin');
    }

    public function storesubadmin(StoreUserRequest $request)
    {
        $requestData = $request->validated();

        if ($request->hasFile('profile_image') && $request->file('profile_image')->isValid()) {
            $requestData['profile_image'] = $this->getImage($request->file('profile_image'));
        }

        $user = $this->userService->store($requestData);

        $role = Role::where('name', 'sub_admin')->first();
        if ($role) {
            $user->roles()->attach($role);
        }

        return redirect()->route('indexsubadmin')->with('success', __('User created successfully.'));
    }

    public function showreader(string $userId)
    {
        $user = $this->userService->show($userId);
        return view('users.showreader', ['user' => $user]);
    }

    public function showwriter(string $userId)
    {
        $user = $this->userService->show($userId);
        return view('users.showwriter', ['user' => $user]);
    }

    public function showsubadmin(string $userId)
    {
        $user = $this->userService->show($userId);
        return view('users.showsub-admin', ['user' => $user]);
    }

    public function editreader(Request $request, string $userId)
    {
        $user = $this->userService->show($userId);
        return view('users.editreader', ['user' => $user]);
    }

    public function updatereader(UpdateUsersRequest $request, string $userId)
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
        return redirect()->route('indexreader')->with('success', __('User updated successfully.'));
    }

    public function editwriter(Request $request, string $userId)
    {
        $user = $this->userService->show($userId);
        return view('users.editwriter', ['user' => $user]);
    }

    public function updatewriter(UpdateUsersRequest $request, string $userId)
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
        return redirect()->route('indexwriter')->with('success', __('User updated successfully.'));
    }

    public function editsubadmin(Request $request, string $userId)
    {
        $user = $this->userService->show($userId);
        return view('users.editsub-admin', ['user' => $user]);
    }

    public function updatesubadmin(UpdateUsersRequest $request, string $userId)
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
        return redirect()->route('indexsubadmin')->with('success', __('User updated successfully.'));
    }

    public function destroyreader(string $userId)
    {
        $this->userService->destroy($userId);
        return redirect()->route('indexreader')->with('success', __('User detele successfully.'));
    }

    public function destroywriter(string $userId)
    {
        $this->userService->destroy($userId);
        return redirect()->route('indexwriter')->with('success', __('User detele successfully.'));
    }

    public function destroysubadmin(string $userId)
    {
        $this->userService->destroy($userId);
        return redirect()->route('indexsubadmin')->with('success', __('User detele successfully.'));
    }

    private function getImage($file)
    {
        $fileName = $file->getClientOriginalName();
        $filePath = $file->storeAs('images', $fileName, 'public');
        return '/storage/' . $filePath;
    }

    public function searchreader(Request $request)
    {
        $filters = $request->only(['name', 'gender']);

        if (!isset($filters['gender'])) {
            $filters['gender'] = null;
        } elseif (is_array($filters['gender']) && count($filters['gender']) == 2) {
            $filters['gender'] = null;
        }

        $users = $this->userService->searchreader($filters);

        return view('users.index-reader', compact('users'));
    }

    public function searchwriter(Request $request)
    {
        $filters = $request->only(['name', 'gender']);

        if (!isset($filters['gender'])) {
            $filters['gender'] = null;
        } elseif (is_array($filters['gender']) && count($filters['gender']) == 2) {
            $filters['gender'] = null;
        }

        $users = $this->userService->searchwriter($filters);

        return view('users.index-writer', compact('users'));
    }

    public function searchsubadmin(Request $request)
    {
        $filters = $request->only(['name', 'gender']);

        if (!isset($filters['gender'])) {
            $filters['gender'] = null;
        } elseif (is_array($filters['gender']) && count($filters['gender']) == 2) {
            $filters['gender'] = null;
        }

        $users = $this->userService->searchsubadmin($filters);

        return view('users.index-writer', compact('users'));
    }

    public function changeReaderToWriter($userId)
    {
        // Kiểm tra quyền truy cập
        if (auth()->user()->isSuperAdmin() || auth()->user()->isSubAdmin()) {
            $this->userService->changeRoleToWriter($userId);
            return redirect()->route('indexreader')->with('success', __('Role changed successfully.'));
        } else {
            return redirect()->route('indexreader')->with('error', __('Unauthorized action.'));
        }
    }





}
