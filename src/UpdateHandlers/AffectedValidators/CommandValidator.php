<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 21.08.16
 * Time: 11:45
 */

namespace Ainias\Library\TelegramBot\UpdateHandlers\AffectedValidators;


use Ainias\Library\TelegramBot\Bot;
use Ainias\Library\TelegramBot\Objects\MessageEntity;
use Ainias\Library\TelegramBot\Objects\Update;

class CommandValidator extends AbstractAffectedValidator
{
    public function isAffectedFromUpdate(Update $update, Bot $bot)
    {
        $message = $update->getMessage();
        if ($message != null)
        {
            $messageEntities = $message->getEntities();
            foreach ($messageEntities as $messageEntity)
            {
                if ($messageEntity->getType() == MessageEntity::TYPE_BOT_COMMAND && $messageEntity->getOffset() == 0)
                {
                    return true;
                }
            }
        }
        return false;
    }
}