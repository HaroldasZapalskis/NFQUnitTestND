<?php

namespace AppBundle\Service;

use AppBundle\Entity\User;

class UserMailer
{
    /**
     * @var Mailer
     */
    private $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendHello(User $user)
    {
        $body = sprintf('Hello %s.', $user->getName());

        $this->mailer->send($user->getEmail(), $body);
    }
}
