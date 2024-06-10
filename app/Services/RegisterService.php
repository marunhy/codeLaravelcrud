<?php

namespace App\Services;

use App\Jobs\SendEmailJob;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use App\Events\SendEmailEvent;
use App\Events\ForgotPasswordRequested;

class RegisterService
{
    public function sendEmail(string $email)
    {
        $url = URL::temporarySignedRoute(
            'temporary',
            now()->addMinutes(2),
            ['email' => $email]
        );

        $emailDetails = [
            'to' => $email,
            'test' => '*This email is for sending only.*',
            'url' => $url,
        ];
        // SendEmailJob::dispatch($emailDetails);
        event(new SendEmailEvent($emailDetails));

    }

    public function register(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'profile_image' => $data['profile_image'] ?? null,
        ]);
    }

    public function isEmailUnique(string $email): bool
    {
        return !User::where('email', $email)->exists();
    }

    public function forgotPassword($email)
    {
        if (User::where('email', $email)->exists()) {
            event(new ForgotPasswordRequested($email));
            return true;
        } else {
            return false;
        }
    }
}
