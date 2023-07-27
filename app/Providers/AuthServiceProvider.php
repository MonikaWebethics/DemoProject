<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // Your policies (if any) go here
    ];

    public function boot(): void
    {
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject('Email Verification') // Customize the subject of the email
                ->markdown('emails.email-verification', ['url' => $url, 'notifiable' => $notifiable]); // Use the custom email template
        });
    }
}
