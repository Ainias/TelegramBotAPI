<?php

namespace Ainias\TelegramBot\Objects;

class ReplyKeyboardMarkup extends TypeObject
{
    /** @var  KeyboardButton[][] */
    private $keyboard;

    /** @var  bool | null */
    private $resize_keyboard;

    /** @var  bool | null */
    private $one_time_keyboard;

    /** @var  bool | null */
    private $selective;

    /**
     * @return KeyboardButton[][]
     */
    public function getKeyboard(): array
    {
        return $this->keyboard;
    }

    /**
     * @param KeyboardButton[][] $keyboard
     */
    public function setKeyboard(array $keyboard)
    {
        if (is_array($keyboard) && is_array($keyboard[0])) {
            if (is_array($keyboard[0][0])) {
                foreach ($keyboard as &$keyboardButtons) {
                    $keyboardButtons = self::hydrateArray($keyboardButtons, KeyboardButton::class);
                }
            }
            $this->keyboard = $keyboard;
        }
    }

    /**
     * @return bool|null
     */
    public function getResizeKeyboard()
    {
        return $this->resize_keyboard;
    }

    /**
     * @param bool|null $resize_keyboard
     */
    public function setResizeKeyboard($resize_keyboard)
    {
        $this->resize_keyboard = $resize_keyboard;
    }

    /**
     * @return bool|null
     */
    public function getOneTimeKeyboard()
    {
        return $this->one_time_keyboard;
    }

    /**
     * @param bool|null $one_time_keyboard
     */
    public function setOneTimeKeyboard($one_time_keyboard)
    {
        $this->one_time_keyboard = $one_time_keyboard;
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