<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 21.08.16
 * Time: 11:59
 */

namespace Ainias\Library\TelegramBot\UpdateHandlers;

use Ainias\Library\TelegramBot\UpdateHandlers\AffectedValidators\AddedToGroupValidator;
use Ainias\Library\TelegramBot\UpdateHandlers\AffectedValidators\AggregatedValidator;
use Ainias\Library\TelegramBot\UpdateHandlers\AffectedValidators\GroupChatCreatedValidator;

abstract class AbstractAddedToGroupHandler extends AbstractUpdateHandler
{
    /**
     * AbstractAddedToGroupHandler constructor.
     */
    public function __construct()
    {
        $this->validator = new AddedToGroupValidator();
    }
}