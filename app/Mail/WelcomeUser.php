<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeUser extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $theme = 'default-rtl';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(user $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.users.welcome');
    }
}
