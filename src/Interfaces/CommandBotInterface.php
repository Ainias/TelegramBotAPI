<?php

namespace ainias\TelegramBot\Interfaces;

use ainias\TelegramBot\Objects\Message;

interface CommandBotInterface {
    public function handleCommand(Message $message);
} 