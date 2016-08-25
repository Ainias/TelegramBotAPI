<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 18.08.16
 * Time: 17:40
 */

namespace Ainias\Library\TelegramBot\Objects;


class InlineKeyboardMarkup extends TypeObject
{
    /** @var  InlineKeyboardButton[][] */
    private $inline_keyboard;

    /**
     * @return InlineKeyboardButton[][]
     */
    public function getInlineKeyboard(): array
    {
        return $this->inline_keyboard;
    }

    /**
     * @param InlineKeyboardButton[][] $inline_keyboard
     */
    public function setInlineKeyboard(array $inline_keyboard)
    {
        if (is_array($inline_keyboard) && is_array($inline_keyboard[0])) {
            if (is_array($inline_keyboard[0][0])) {
                foreach ($inline_keyboard as &$inlineKeyboardButtons) {
                    $inlineKeyboardButtons = self::hydrateArray($inlineKeyboardButtons, InlineKeyboardButton::class);
                }
            }
            $this->inline_keyboard = $inline_keyboard;
        }
    }
}