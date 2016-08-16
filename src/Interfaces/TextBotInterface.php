<?php

namespace ainias\TelegramBot\Interfaces;

use ainias\TelegramBot\Objects\Message;

interface TextBotInterface {

    public function handleMessageText(Message $message);
} 