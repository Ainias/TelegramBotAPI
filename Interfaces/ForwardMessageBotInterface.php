<?php

namespace TelegramBot\Interfaces;

use TelegramBot\Objects\Message;

interface ForwardMessageBotInterface {
    public function handleForwardMessage(Message $message);
} 