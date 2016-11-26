<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 26.11.16
 * Time: 18:06
 */

namespace Ainias\Library\TelegramBot\UpdateHandlers;

use Ainias\Library\TelegramBot\UpdateHandlers\AffectedValidators\CallbackQueryValidator;

abstract class AbstractCallbackQueryHandler extends AbstractUpdateHandler
{
    public function __construct()
    {
        $this->validator = new CallbackQueryValidator();
    }
}