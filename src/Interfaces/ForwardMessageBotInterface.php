<?php

namespace ainias\TelegramBot\Interfaces;

use ainias\TelegramBot\Objects\Message;

interface ForwardMessageBotInterface {
    public function handleForwardMessage(Message $message);
} 