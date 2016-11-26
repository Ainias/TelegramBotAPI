<?php

namespace Ainias\Library\TelegramBot\Objects;

class Update extends TypeObject
{
    /** @var  integer */
    private $update_id;

    /** @var  Message |NULL */
    private $message;

    /** @var  Message | null */
    private $edited_message;

//    /** @var  InlineQuery */
//    private $inline_query;

//    /** @var  ChoosenInlineResult */
//    private $chosen_inline_result;

    /** @var  CallbackQuery|null */
    private $callback_query;

    /**
     * @return int
     */
    public function getUpdateId(): int
    {
        return $this->update_id;
    }

    /**
     * @param int $update_id
     */
    public function setUpdateId(int $update_id)
    {
        $this->update_id = $update_id;
    }

    /**
     * @return Message|NULL
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param Message|NULL $message
     */
    public function setMessage($message)
    {
        if (is_array($message))
        {
            $message = new Message($message);
        }
        $this->message = $message;
    }

    /**
     * @return Message|null
     */
    public function getEditedMessage()
    {
        return $this->edited_message;
    }

    /**
     * @param Message|null $edited_message
     */
    public function setEditedMessage($edited_message)
    {
        if (is_array($edited_message))
        {
            $edited_message = new Message($edited_message);
        }
        $this->edited_message = $edited_message;
    }

    /**
     * @return CallbackQuery|null
     */
    public function getCallbackQuery()
    {
        return $this->callback_query;
    }

    /**
     * @param CallbackQuery|array $callback_query
     */
    public function setCallbackQuery($callback_query)
    {
        if (is_array($callback_query))
        {
            $callback_query = new CallbackQuery($callback_query);
        }
        $this->callback_query = $callback_query;
    }
}