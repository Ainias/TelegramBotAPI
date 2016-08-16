<?php

namespace Ainias\TelegramBot\Objects;

class ForceReply implements TypeInterface
{
    /** @var  bool */
    private $force_reply;
    /** @var  bool */
    private $selective;

    public function __construct($arrayData = NULL)
    {
        $this->setForceReply(true);
        if (is_array($arrayData))
        {
            $this->hydrate($arrayData);
        }
    }

    /**
     * @return boolean
     */
    public function isForceReply()
    {
        return $this->force_reply;
    }

    /**
     * @param boolean $force_reply
     */
    public function setForceReply($force_reply)
    {
        $this->force_reply = $force_reply;
    }

    /**
     * @return boolean
     */
    public function isSelective()
    {
        return $this->selective;
    }

    /**
     * @param boolean $selective
     */
    public function setSelective($selective)
    {
        $this->selective = $selective;
    }

    public function hydrate($arrayData)
    {
        $this->setForceReply($arrayData["force_reply"]); //Should always be true
        isset($arrayData["selective"]) && $this->setSelective($arrayData["selective"]);
    }

    /** @return array */
    public function extract()
    {
        $data["force_reply"] = $this->isForceReply();

        ($this->isSelective() !== NULL) && ($data["selective"] = $this->isSelective());

        return $data;
    }
}