<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 21.08.16
 * Time: 12:05
 */

namespace Ainias\TelegramBot\UpdateHandlers\AffectedValidators;


use Ainias\TelegramBot\Bot;
use Ainias\TelegramBot\Objects\Update;

class AddedToGroupValidator extends NewChatMemberValidator
{
    /** @var  GroupChatCreatedValidator */
    private $groupChatCreatedValidator;

    /** @var  SupergroupChatCreatedValidator */
    private $supergroupChatCreatedValidator;

    /**
     * AddedToGroupValidator constructor.
     */
    public function __construct()
    {
        $this->groupChatCreatedValidator = new GroupChatCreatedValidator();
        $this->supergroupChatCreatedValidator = new SupergroupChatCreatedValidator();
    }


    public function isAffectedFromUpdate(Update $update, Bot $bot)
    {
        if (parent::isAffectedFromUpdate($update, $bot)) {
            return $update->getMessage()->getNewChatMember()->getUsername() == $bot->getUsername();
        }
        return $this->groupChatCreatedValidator->isAffectedFromUpdate($update, $bot)
        || $this->supergroupChatCreatedValidator->isAffectedFromUpdate($update, $bot);
    }
}