<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 26.11.16
 * Time: 14:26
 */

namespace Ainias\Library\TelegramBot\UpdateHandlers\AffectedValidators;


use Ainias\Library\TelegramBot\Bot;
use Ainias\Library\TelegramBot\Objects\Update;

class TextResponseToBotValidator extends TextResponseValidator
{
    public function isAffectedFromUpdate(Update $update, Bot $bot)
    {
        return (parent::isAffectedFromUpdate($update, $bot) && $update->getMessage()->getReplyToMessage()->getFrom()->getUsername() == $bot->getUsername());
    }
}