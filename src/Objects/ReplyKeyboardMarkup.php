<?php

namespace ainias\TelegramBot\Objects;

class ReplyKeyboardMarkup implements TypeInterface
{
    private $keyboard;
    /** @var  bool */
    private $resize_keyboard;
    /** @var  bool */
    private $one_time_keyboard;
    /** @var  bool */
    private $selective;

    public function __construct($arrayData = NULL)
    {
        $this->setOneTimeKeyboard(true);
        if (is_array($arrayData))
        {
            $this->hydrate($arrayData);
        }
    }

    /**
     * @return mixed
     */
    public function getKeyboard()
    {
        return $this->keyboard;
    }

    /**
     * @param mixed $keyboard
     */
    public function setKeyboard($keyboard)
    {
        $this->keyboard = $keyboard;
    }

    /**
     * @return boolean
     */
    public function isOneTimeKeyboard()
    {
        return $this->one_time_keyboard;
    }

    /**
     * @param boolean $one_time_keyboard
     */
    public function setOneTimeKeyboard($one_time_keyboard)
    {
        $this->one_time_keyboard = $one_time_keyboard;
    }

    /**
     * @return boolean
     */
    public function isResizeKeyboard()
    {
        return $this->resize_keyboard;
    }

    /**
     * @param boolean $resize_keyboard
     */
    public function setResizeKeyboard($resize_keyboard)
    {
        $this->resize_keyboard = $resize_keyboard;
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
        $this->setKeyboard($arrayData["keyboard"]);
        (isset($arrayData["resize_keyboard"])) && $this->setResizeKeyboard($arrayData["resize_keyboard"]);
        (isset($arrayData["one_time_keyboard"])) && $this->setOneTimeKeyboard($arrayData["one_time_keyboard"]);
        (isset($arrayData["selective"])) && $this->setSelective($arrayData["selective"]);
    }

    /** @return array */
    public function extract()
    {
        $data["keyboard"] = $this->getKeyboard();

        ($this->isResizeKeyboard() !== NULL) && ($data["resize_keyboard"] = $this->isResizeKeyboard());
        ($this->isOneTimeKeyboard() !== NULL) && ($data["one_time_keyboard"] = $this->isOneTimeKeyboard());
        ($this->isSelective() !== NULL) && ($data["selective"] = $this->isSelective());

        return $data;
    }
}