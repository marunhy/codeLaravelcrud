<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\RegisterService;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use App\Http\Requests\SendMailRegisterRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\ForgotPasswordRequest;


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
        $user = $this->registerService->register($requestData);
        Auth::login($user);
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
            // Check user's roles
            if (Auth::user()->hasRole('admin')) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('indexpost');
            }
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
        return redirect()->route('indexpost');
    }

    private function getImage($file)
    {
        $fileName = $file->getClientOriginalName();
        $filePath = $file->storeAs('images', $fileName, 'public');
        return '/storage/' . $filePath;
    }

    public function forgotPasswordForm()
    {
        return view('auth.forgotPassword');
    }

    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $email = $request->input('email');

        if ($this->registerService->forgotPassword($email)) {
            session(['email' => $email]);
            return redirect()->route('verifyOTPForm');
        } else {
            return back()->withErrors(['email' => 'Email does not exist'])->withInput();
        }
    }

    public function verifyOTPForm()
    {
        return view('auth.verifyOTP');
    }

    public function verifyOTP(Request $request)
    {
        $request->validate(['otp' => 'required|string']);
        $email = session('email');
        $otp = $request->input('otp');
        $storedOtp = Cache::get('otp_' . $email);

        if (is_null($email)) {
            return back()->withErrors(['email' => 'Session email is missing.'])->withInput();
        }
        if (is_null($storedOtp)) {
            return back()->withErrors(['otp' => 'Stored OTP is missing or expired.'])->withInput();
        }

        if ($storedOtp === $otp) {
            Cache::forget('otp_' . $email);
            return redirect()->route('resetPasswordForm')->with('email', $email);
        } else {
            return back()->withErrors(['otp' => 'Invalid OTP'])->withInput();
        }
    }

    public function resetPasswordForm()
    {
        return view('auth.resetPassword');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        $email = $request->input('email');
        $newPassword = $request->input('new-password');

        $user = User::where('email', $email)->first();

        if ($user) {
            $user->password = Hash::make($newPassword);
            $user->save();

            return redirect()->route('login')->with('success', 'Password reset successfully');
        } else {
            return back()->withErrors(['email' => 'User not found.']);
        }
    }
}
