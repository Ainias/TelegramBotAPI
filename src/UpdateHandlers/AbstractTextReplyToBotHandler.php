<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 26.11.16
 * Time: 14:31
 */

namespace Ainias\Library\TelegramBot\UpdateHandlers;

use Ainias\Library\TelegramBot\UpdateHandlers\AffectedValidators\TextResponseToBotValidator;

abstract class AbstractTextReplyToBotHandler extends AbstractUpdateHandler
{
    public function __construct()
    {
        $this->validator = new TextResponseToBotValidator();
    }
}