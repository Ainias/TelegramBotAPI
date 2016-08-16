<?php

namespace TelegramBot\Interfaces;

use TelegramBot\Objects\Message;

interface CommandBotInterface {
    public function handleCommand(Message $message);
} 