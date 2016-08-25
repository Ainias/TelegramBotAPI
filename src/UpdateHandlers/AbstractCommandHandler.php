<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 21.08.16
 * Time: 11:01
 */

namespace Ainias\Library\TelegramBot\UpdateHandlers;

use Ainias\Library\TelegramBot\UpdateHandlers\AffectedValidators\CommandValidator;

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