<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 17.08.16
 * Time: 21:46
 */

namespace Ainias\TelegramBot\Objects;


class MessageEntity extends TypeObject
{
    const TYPE_MENTION = "mention";
    const TYPE_HASHTAG = "hashtag";
    const TYPE_BOT_COMMAND = "bot_command";
    const TYPE_URL = "url";
    const TYPE_EMAIL = "email";
    const TYPE_BOLD = "bold";
    const TYPE_ITALIC = "italic";
    const TYPE_CODE = "code";
    const TYPE_PRE = "pre";
    const TYPE_TEXT_LINK = "text_link";
    const TYPE_TEXT_MENTION = "text_mention";

    /** @var  string */
    private $type;

    /** @var  integer */
    private $offset;

    /** @var  integer */
    private $length;

    /** @var  string | NULL */
    private $url;

    /** @var  User | NULL */
    private $user;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * @param int $offset
     */
    public function setOffset(int $offset)
    {
        $this->offset = $offset;
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @param int $length
     */
    public function setLength(int $length)
    {
        $this->length = $length;
    }

    /**
     * @return NULL|string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param NULL|string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return User|NULL
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User|NULL $user
     */
    public function setUser($user)
    {
        if (is_array($user))
        {
            $user = new User($user);
        }
        $this->user = $user;
    }
}