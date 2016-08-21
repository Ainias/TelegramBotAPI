<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 21.08.16
 * Time: 11:20
 */

namespace Ainias\TelegramBot\UpdateHandlers;

use Ainias\TelegramBot\Bot;
use Ainias\TelegramBot\Objects\Update;

abstract class AbstractTextHandler extends AbstractUpdateHandler
{
    protected function isAffectedFromUpdate(Update $update, Bot $bot)
    {
        $message = $update->getMessage();
        if ($message != null)
        {
            return ($message->getText() != null);
        }
        return false;
    }
}