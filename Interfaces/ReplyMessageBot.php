<?php

namespace TelegramBot\Interfaces;

use TelegramBot\Objects\Message;

interface ReplyMessageBot {
    public function handleReplyMessage(Message $message);
} 