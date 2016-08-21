<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 21.08.16
 * Time: 11:58
 */

namespace Ainias\TelegramBot\UpdateHandlers;

use Ainias\TelegramBot\UpdateHandlers\AffectedValidators\GroupChatCreatedValidator;

abstract class AbstractGroupChatCreatedHandler extends AbstractUpdateHandler
{
    /**
     * AbstractGroupChatCreatedHandler constructor.
     */
    public function __construct()
    {
        $this->validator = new GroupChatCreatedValidator();
    }
}