<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 21.08.16
 * Time: 11:44
 */

namespace Ainias\TelegramBot\UpdateHandlers\AffectedValidators;

use Ainias\TelegramBot\Bot;
use Ainias\TelegramBot\Objects\Update;

abstract class AbstractAffectedValidator
{
    /**
     * @param Update $update
     * @param Bot $bot
     * @return boolean
     */
    abstract public function isAffectedFromUpdate(Update $update, Bot $bot);
}