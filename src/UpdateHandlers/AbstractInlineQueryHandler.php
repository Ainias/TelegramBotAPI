<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 21.12.17
 * Time: 15:18
 */

namespace Ainias\Library\TelegramBot\UpdateHandlers;


use Ainias\Library\TelegramBot\UpdateHandlers\AffectedValidators\InlineQueryValidator;

abstract class AbstractInlineQueryHandler extends AbstractUpdateHandler
{
    public function __construct()
    {
        $this->validator = new InlineQueryValidator();
    }
}