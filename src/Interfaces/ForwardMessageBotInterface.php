<?php

namespace Ainias\TelegramBot\Interfaces;

use Ainias\TelegramBot\Objects\Message;

interface ForwardMessageBotInterface {
    public function handleForwardMessage(Message $message);
} 