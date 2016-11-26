<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 26.11.16
 * Time: 18:04
 */

namespace Ainias\Library\TelegramBot\UpdateHandlers\AffectedValidators;

use Ainias\Library\TelegramBot\Bot;
use Ainias\Library\TelegramBot\Objects\Update;

class CallbackQueryValidator extends AbstractAffectedValidator
{
    public function isAffectedFromUpdate(Update $update, Bot $bot)
    {
        return ($update->getCallbackQuery() != null);
    }
}