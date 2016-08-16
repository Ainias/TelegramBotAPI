<?php

namespace Ainias\TelegramBot\Interfaces;

use Ainias\TelegramBot\Objects\Message;

interface TextBotInterface {

    public function handleMessageText(Message $message);
} 