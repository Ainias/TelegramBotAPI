<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 18.08.16
 * Time: 17:45
 */

namespace Ainias\TelegramBot\Objects;

class CallbackQuery extends TypeObject
{
    /** @var  string */
    private $id;

    /** @var  User */
    private $from;

    /** @var  Message | null */
    private $message;

    /** @var  string | null */
    private $inline_message_id;

    /** @var  string */
    private $data;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return User
     */
    public function getFrom(): User
    {
        return $this->from;
    }

    /**
     * @param User $from
     */
    public function setFrom(User $from)
    {
        if (is_array($from))
        {
            $from = new User($from);
        }
        $this->from = $from;
    }

    /**
     * @return Message|null
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param Message|null $message
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
     * @return null|string
     */
    public function getInlineMessageId()
    {
        return $this->inline_message_id;
    }

    /**
     * @param null|string $inline_message_id
     */
    public function setInlineMessageId($inline_message_id)
    {
        $this->inline_message_id = $inline_message_id;
    }

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }

    /**
     * @param string $data
     */
    public function setData(string $data)
    {
        $this->data = $data;
    }
}