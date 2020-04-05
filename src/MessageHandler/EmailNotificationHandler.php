<?php

namespace App\MessageHandler;

use App\Message\EmailNotification;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class EmailNotificationHandler implements MessageHandlerInterface
{
    public function __invoke(EmailNotification $message)
    {
        dump('At this moment the following email should be sent.', $message);
    }
}