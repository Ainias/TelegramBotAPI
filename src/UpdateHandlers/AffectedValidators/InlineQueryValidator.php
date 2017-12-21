<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 21.12.17
 * Time: 15:16
 */

namespace Ainias\Library\TelegramBot\UpdateHandlers\AffectedValidators;


use Ainias\Library\TelegramBot\Bot;
use Ainias\Library\TelegramBot\Objects\Update;

class InlineQueryValidator extends AbstractAffectedValidator
{
    public function isAffectedFromUpdate(Update $update, Bot $bot)
    {
        return ($update->getInlineQuery() != null);
    }
}