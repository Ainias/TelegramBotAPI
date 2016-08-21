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

abstract class AbstractUpdateHandler
{
    /**
     * @param Update $update
     * @param Bot $bot
     * @return mixed
     */
    public function handleUpdate(Update $update, Bot $bot)
    {
        if ($this->isAffectedFromUpdate($update, $bot))
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
     * @return boolean
     */
    abstract protected function isAffectedFromUpdate(Update $update, Bot $bot);
    abstract protected function doUpdate(Update $update, Bot $bot);
}