<?php
require dirname(__DIR__) . "/vendor/autoload.php";
require "auth.php";

$bot = new \Ainias\TelegramBot\Bot($botName, $botToken);
var_dump($bot->sendPhoto($chatId, realpath("Download.jpg")));