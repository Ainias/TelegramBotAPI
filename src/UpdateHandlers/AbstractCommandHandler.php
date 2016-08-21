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
use Ainias\TelegramBot\UpdateHandlers\AffectedValidators\CommandValidator;

abstract class AbstractCommandHandler extends AbstractUpdateHandler
{

    /**
     * AbstractCommandHandler constructor.
     */
    public function __construct()
    {
        $this->validator = new CommandValidator();
    }
}