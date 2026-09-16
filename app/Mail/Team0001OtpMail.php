<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Mail\Mailable;

class Team0001OtpMail extends Mailable
{
    public function __construct(
        public User $user,
        public int $otp,
    ) {}

    public function build(): self
    {
        return $this
            ->subject('Your Team 0001 verification code')
            ->markdown('emails.team0001-otp', [
                'user' => $this->user,
                'otp' => $this->otp,
                'brand' => 'Team 0001',
            ]);
    }
}
