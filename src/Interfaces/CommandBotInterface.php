<?php

namespace Ainias\TelegramBot\Interfaces;

use Ainias\TelegramBot\Objects\Message;

interface CommandBotInterface {
    public function handleCommand(Message $message);
} 