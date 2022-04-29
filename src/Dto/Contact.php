<?php

namespace App\Dto;

final class Contact
{
    public readonly string $email;
    public readonly string $message;

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }
}