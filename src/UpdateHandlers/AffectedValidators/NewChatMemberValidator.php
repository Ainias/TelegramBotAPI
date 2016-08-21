<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 21.08.16
 * Time: 11:50
 */

namespace Ainias\TelegramBot\UpdateHandlers\AffectedValidators;


use Ainias\TelegramBot\Bot;
use Ainias\TelegramBot\Objects\Update;

class NewChatMemberValidator extends AbstractAffectedValidator
{
    public function isAffectedFromUpdate(Update $update, Bot $bot)
    {
        $message = $update->getMessage();
        if ($message != null)
        {
            return $message->getNewChatMember() != null;
        }
        return false;
    }
}