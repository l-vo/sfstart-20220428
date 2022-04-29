<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

final class Contact
{
    #[Assert\NotBlank]
    #[Assert\Email]
    public readonly string $email;

    #[Assert\NotBlank]
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