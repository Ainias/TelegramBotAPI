<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 21.08.16
 * Time: 11:01
 */

namespace Ainias\TelegramBot\UpdateHandlers;

use Ainias\TelegramBot\Bot;
use Ainias\TelegramBot\Objects\MessageEntity;
use Ainias\TelegramBot\Objects\Update;

abstract class AbstractCommandHandler extends AbstractUpdateHandler
{
    protected function isAffectedFromUpdate(Update $update, Bot $bot)
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