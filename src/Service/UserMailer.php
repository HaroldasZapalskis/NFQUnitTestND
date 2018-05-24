<?php

namespace App\Service;

use App\Entity\User;
use App\Service\HappyNumberGenerator;

class UserMailer
{
    /**
     * @var Mailer
     */
    private $mailer;
    private $happyNumberGenerator;

    public function __construct(Mailer $mailer, HappyNumberGenerator $happyNumberGenerator)
    {
        $this->mailer = $mailer;
        $this->happyNumberGenerator = $happyNumberGenerator;
    }

    public function sendHello(User $user)
    {
        $body = sprintf('Hello %s.', $user->getName());
        $body .= ' Your happy number is' . $this->happyNumberGenerator->generate();

        $this->mailer->send($user->getEmail(), $body);
    }
}
