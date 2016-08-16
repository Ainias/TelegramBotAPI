<?php

namespace ainias\TelegramBot\Objects;

class Update implements TypeInterface
{
    private $update_id;
    /** @var  Message |NULL */
    private $message;

    public function __construct($arrayData = NULL)
    {
        if (is_array($arrayData))
        {
            $this->hydrate($arrayData);
        }
    }

    /**
     * @return NULL|Message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param NULL|Message $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getUpdateId()
    {
        return $this->update_id;
    }

    /**
     * @param mixed $update_id
     */
    public function setUpdateId($update_id)
    {
        $this->update_id = $update_id;
    }

    public function hydrate($arrayData)
    {
        $this->setUpdateId($arrayData["update_id"]);
        (isset($arrayData["message"])) && $this->setMessage(new Message($arrayData["message"]));
   }

    /** @return array */
    public function extract()
    {
        $data["update_id"] = $this->getUpdateId();

        ($this->getMessage() != NULL) && ($data["message"] = $this->getMessage()->extract());
    }

}