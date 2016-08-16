<?php

namespace TelegramBot\Interfaces;

use TelegramBot\Objects\Message;

interface TextBotInterface {

    public function handleMessageText(Message $message);
} 