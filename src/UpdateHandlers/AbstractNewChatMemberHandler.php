<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 21.08.16
 * Time: 11:41
 */

namespace Ainias\Library\TelegramBot\UpdateHandlers;


use Ainias\Library\TelegramBot\UpdateHandlers\AffectedValidators\NewChatMemberValidator;

abstract class AbstractNewChatMemberHandler extends AbstractUpdateHandler
{
    public function __construct()
    {
        $this->validator = new NewChatMemberValidator();
    }
}