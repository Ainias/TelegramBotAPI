<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 21.08.16
 * Time: 10:54
 */

namespace Ainias\Library\TelegramBot\UpdateHandlers;

use Ainias\Library\TelegramBot\Bot;
use Ainias\Library\TelegramBot\Objects\Update;
use Ainias\Library\TelegramBot\UpdateHandlers\AffectedValidators\AbstractAffectedValidator;

abstract class AbstractUpdateHandler
{
    /** @var  AbstractAffectedValidator */
    protected $validator;

    /**
     * @param Update $update
     * @param Bot $bot
     * @return mixed
     */
    public function handleUpdate(Update $update, Bot $bot)
    {
        if ($this->validator->isAffectedFromUpdate($update, $bot))
        {
            $this->doUpdate($update, $bot);
        }
    }

    /**
     * @param Update[] $updates
     * @param Bot $bot
     */
    public function handleUpdates($updates, Bot $bot)
    {
        foreach ($updates as $update) {
            $this->handleUpdate($update, $bot);
        }
    }

    /**
     * @param Update $update
     * @param Bot $bot
     * @return mixed
     */
    abstract protected function doUpdate(Update $update, $bot);
}