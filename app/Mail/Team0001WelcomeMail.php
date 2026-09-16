<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Mail\Mailable;

class Team0001WelcomeMail extends Mailable
{
    public function __construct(public User $user) {}

    public function build(): self
    {
        return $this
            ->subject('Welcome to Team 0001')
            ->view('emails.team0001-welcome', [
                'user' => $this->user,
                'brand' => 'Team 0001',
            ]);
    }
}
