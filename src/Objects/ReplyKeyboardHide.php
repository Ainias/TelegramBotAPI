<?php

namespace Ainias\TelegramBot\Objects;

class ReplyKeyboardHide extends TypeObject
{
    /** @var  boolean */
    private $hide_keyboard;

    /** @var  bool | null */
    private $selective;

    /**
     * @return boolean
     */
    public function isHideKeyboard(): bool
    {
        return $this->hide_keyboard;
    }

    /**
     * @param boolean $hide_keyboard
     */
    public function setHideKeyboard(bool $hide_keyboard)
    {
        $this->hide_keyboard = $hide_keyboard;
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
