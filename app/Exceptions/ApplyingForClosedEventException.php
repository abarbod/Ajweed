<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;

class ApplyingForClosedEventException extends \Exception
{

    public function __construct(string $message = null, int $code = 0, \Throwable $previous = null)
    {
        $message = $message ?? __('Registration is closed for this event.');
        parent::__construct($message, $code, $previous);
    }

    /**
     * When this exception is thrown, we change it to AuthorizationException to be handled by Laravel.
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function report()
    {
        throw new AuthorizationException($this->message);
    }

}
