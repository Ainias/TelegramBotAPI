<?php

namespace ainias\TelegramBot\Interfaces;

use ainias\TelegramBot\Objects\Message;

interface ReplyMessageBot {
    public function handleReplyMessage(Message $message);
} 