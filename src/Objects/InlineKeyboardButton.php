<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 18.08.16
 * Time: 17:42
 */

namespace Ainias\TelegramBot\Objects;

class InlineKeyboardButton extends TypeObject
{
    /** @var  string */
    private $text;

    /** @var  string | null */
    private $url;

    /** @var  string | null */
    private $callback_data;

    /** @var  string | null */
    private $switch_inline_query;

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text)
    {
        $this->text = $text;
    }

    /**
     * @return null|string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param null|string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return null|string
     */
    public function getCallbackData()
    {
        return $this->callback_data;
    }

    /**
     * @param null|string $callback_data
     */
    public function setCallbackData($callback_data)
    {
        $this->callback_data = $callback_data;
    }

    /**
     * @return null|string
     */
    public function getSwitchInlineQuery()
    {
        return $this->switch_inline_query;
    }

    /**
     * @param null|string $switch_inline_query
     */
    public function setSwitchInlineQuery($switch_inline_query)
    {
        $this->switch_inline_query = $switch_inline_query;
    }
}