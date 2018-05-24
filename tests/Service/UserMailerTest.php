<?php
///**
// * Created by PhpStorm.
// * User: haroldas
// * Date: 18.5.17
// * Time: 17.51
// */
//
//namespace App\Tests\Service;
//
//use App\Service\Mailer;
//use App\Service\UserMailer;
//use App\Entity\User;
//use App\Service\HappyNumberGenerator;
//use PHPUnit\Framework\TestCase;
//
//class UserMailerTest extends TestCase
//{
//    public function testSendHello() {
//        $user = new User();
//        $user->setName('Vardenis');
//        $user->setEmail('me@example.com');
//
//        $mailerMock = $this->createMock(Mailer::class);
//        $mailerMock->expects($this->once())
//            ->method('send')
//            ->with('me@example.com', 'Hello Vardenis. Your happy number is42');
//
//        $happyNumberGenerator = $this->createMock(HappyNumberGenerator::class);
//        $happyNumberGenerator->expects($this->once())
//            ->method('generate')
//            ->willReturn('42');
//
//        $userMailer = new UserMailer($mailerMock, $happyNumberGenerator);
//        $userMailer->sendHello($user);
//    }
//}
