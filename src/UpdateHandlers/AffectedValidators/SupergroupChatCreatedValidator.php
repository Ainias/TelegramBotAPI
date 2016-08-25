<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 21.08.16
 * Time: 11:53
 */

namespace Ainias\Library\TelegramBot\UpdateHandlers\AffectedValidators;


use Ainias\Library\TelegramBot\Bot;
use Ainias\Library\TelegramBot\Objects\Update;

class SupergroupChatCreatedValidator extends AbstractAffectedValidator
{
    public function isAffectedFromUpdate(Update $update, Bot $bot)
    {
        $message = $update->getMessage();
        if ($message != null)
        {
            return $message->getSupergroupChatCreated();
        }
        return false;
    }
}