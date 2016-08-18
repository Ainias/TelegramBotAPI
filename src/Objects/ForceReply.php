<?php

namespace Ainias\TelegramBot\Objects;

class ForceReply extends TypeObject
{
    /** @var  bool */
    private $force_reply;

    /** @var  bool | null */
    private $selective;

    /**
     * @return boolean
     */
    public function isForceReply(): bool
    {
        return $this->force_reply;
    }

    /**
     * @param boolean $force_reply
     */
    public function setForceReply(bool $force_reply)
    {
        $this->force_reply = $force_reply;
    }

    /**
     * @return bool|null
     */
    public function getSelective()
    {
        return $this->selective;
    }

    /**
     * @param bool|null $selective
     */
    public function setSelective($selective)
    {
        $this->selective = $selective;
    }
}