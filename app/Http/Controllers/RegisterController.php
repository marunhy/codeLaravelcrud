<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SendMailRegisterRequest;
use App\Services\RegisterService;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;

class RegisterController extends Controller
{
    protected $registerService;

    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }

    public function signUp()
    {
        return view('auth.sign-up');
    }

    public function sendEmail(SendMailRegisterRequest $request)
    {
        $email = $request->input('email');
        if ($this->registerService->isEmailUnique($email)) {
            $this->registerService->sendEmail($email);
            return redirect()->route('waiting');
        } else {
            return back()->withErrors(['email' => 'Email bạn sử dụng đã bị trùng'])->withInput();
        }
    }

    public function waiting()
    {
        return view('auth.waiting');
    }

    public function temporary(Request $request)
    {
        if (!URL::hasValidSignature($request)) {
            abort(403, 'Unauthorized action.');
        }
        $email = $request->query('email');
        return view('auth.register-user', ['email' => $email]);
    }

    public function register(StoreUserRequest $request)
    {
        $requestData = $request->validated();
        if ($request->hasFile('profile_image') && $request->file('profile_image')->isValid()) {
            $requestData['profile_image'] = $this->getImage($request->file('profile_image'));
        }
        $this->registerService->register($requestData);
        return redirect()->route('index')->with('success', __('User sign up successfully.'));
    }

    public function login()
    {
        return view('auth.login');
    }

    public function signIn(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('index');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

    private function getImage($file)
    {
        $fileName = $file->getClientOriginalName();
        $filePath = $file->storeAs('images', $fileName, 'public');
        return '/storage/' . $filePath;
    }

    public function resetPasswordForm()
    {
        return view('auth.reset-password');
    }

    public function resetPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $status = Password::sendResetLink($request->only('email'));
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

}
