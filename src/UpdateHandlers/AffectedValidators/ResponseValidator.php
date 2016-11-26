<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 26.11.16
 * Time: 14:22
 */

namespace Ainias\Library\TelegramBot\UpdateHandlers\AffectedValidators;


use Ainias\Library\TelegramBot\Bot;
use Ainias\Library\TelegramBot\Objects\Update;

class ResponseValidator extends AbstractAffectedValidator
{
    public function isAffectedFromUpdate(Update $update, Bot $bot)
    {
        return ($update->getMessage()->getReplyToMessage() != null);
    }
}