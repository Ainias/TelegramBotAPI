<?php

namespace Ainias\TelegramBot\Interfaces;

use Ainias\TelegramBot\Objects\Message;

interface ReplyMessageBot {
    public function handleReplyMessage(Message $message);
} 