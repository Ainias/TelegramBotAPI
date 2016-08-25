<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 21.08.16
 * Time: 11:44
 */

namespace Ainias\Library\TelegramBot\UpdateHandlers\AffectedValidators;

use Ainias\Library\TelegramBot\Bot;
use Ainias\Library\TelegramBot\Objects\Update;

abstract class AbstractAffectedValidator
{
    /**
     * @param Update $update
     * @param Bot $bot
     * @return boolean
     */
    abstract public function isAffectedFromUpdate(Update $update, Bot $bot);
}