<?php

namespace App\Services;

use App\Jobs\SendEmailJob;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

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
            'test' => 'hello',
            'url' => $url,
        ];

        // Dispatch the email job to the queue
        SendEmailJob::dispatch($emailDetails);
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
}
