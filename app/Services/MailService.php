<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendPassword;
use App\Models\User;

class MailService
{
    public function sendTestMail(int $user_id)
    {
        $user = User::where('id', $user_id)->first();
        Mail::to($user->email)->send(new SendPassword($user));
    }
}
