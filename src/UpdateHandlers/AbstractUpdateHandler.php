<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 21.08.16
 * Time: 10:54
 */

namespace Ainias\TelegramBot\UpdateHandlers;

use Ainias\TelegramBot\Bot;
use Ainias\TelegramBot\Objects\Update;
use Ainias\TelegramBot\UpdateHandlers\AffectedValidators\AbstractAffectedValidator;

abstract class AbstractUpdateHandler
{
    /** @var  AbstractAffectedValidator */
    protected $validator;

    /**
     * @param Update $update
     * @param Bot $bot
     * @return mixed
     */
    public function handleUpdate(Update $update, $bot)
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
    abstract protected function doUpdate(Update $update, Bot $bot);
}