<?php

namespace TelegramBot\Objects;

class ReplyKeyboardHide implements TypeInterface
{
    private $hide_keyboard;
    /** @var  bool */
    private $selective;

    public function __construct($arrayData = NULL)
    {
        $this->setHideKeyboard(true);
        if (is_array($arrayData))
        {
            $this->hydrate($arrayData);
        }
    }

    /**
     * @return mixed
     */
    public function getHideKeyboard()
    {
        return $this->hide_keyboard;
    }

    /**
     * @param mixed $hide_keyboard
     */
    public function setHideKeyboard($hide_keyboard)
    {
        $this->hide_keyboard = $hide_keyboard;
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
        $this->setHideKeyboard($arrayData["hide_keyboard"]); //should always be true
        (isset($arrayData["selective"])) && $this->setSelective($arrayData["selective"]);
    }

    /** @return array */
    public function extract()
    {
        $data["hide_keyboard"] = $this->getHideKeyboard();

        ($this->getHideKeyboard() !== NULL) && ($data["hide_keyboard"] = $this->getHideKeyboard());

        return $data;
    }
}
