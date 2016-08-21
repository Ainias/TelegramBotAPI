<?php
require dirname(__DIR__) . "/vendor/autoload.php";
require "auth.php";


class NothingToDoUpdateHandler extends \Ainias\TelegramBot\UpdateHandlers\AbstractAddedToGroupHandler
{
    protected function doUpdate(\Ainias\TelegramBot\Objects\Update $update, \Ainias\TelegramBot\Bot $bot)
    {
        $chatId = $update->getMessage()->getChat()->getId();
        $bot->sendMessage($chatId, "https://belmorevirtual.files.wordpress.com/2013/04/noting-to-do-here-for-a-serial-complainer.jpg");
        $bot->leaveChat($chatId);
    }
}

$bot = new \Ainias\TelegramBot\Bot($botName, $botToken);
$bot->addUpdateHandler(new NothingToDoUpdateHandler());
$updates = $bot->getUpdates(220959608);
$bot->handleUpdates($updates);