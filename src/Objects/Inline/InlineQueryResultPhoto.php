<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 21.12.17
 * Time: 13:52
 */

namespace Ainias\Library\TelegramBot\Objects\Inline;


class InlineQueryResultPhoto extends InlineQueryResult
{
    /** @var  string */
    private $photo_url;

    /** @var  string */
    private $thumb_url;

    /** @var  integer|null */
    private $photo_width;

    /** @var  integer|null */
    private $photo_height;

    /** @var  string|null */
    private $title;

    /** @var  string|null */
    private $description;

    /** @var  string|null */
    private $caption;

    public function __construct($arrayData = null)
    {
        parent::__construct($arrayData);
        $this->setType("photo");
    }

    /**
     * @return string
     */
    public function getPhotoUrl(): string
    {
        return $this->photo_url;
    }

    /**
     * @param string $photo_url
     */
    public function setPhotoUrl(string $photo_url)
    {
        $this->photo_url = $photo_url;
    }

    /**
     * @return string
     */
    public function getThumbUrl(): string
    {
        return $this->thumb_url;
    }

    /**
     * @param string $thumb_url
     */
    public function setThumbUrl(string $thumb_url)
    {
        $this->thumb_url = $thumb_url;
    }

    /**
     * @return int|null
     */
    public function getPhotoWidth()
    {
        return $this->photo_width;
    }

    /**
     * @param int|null $photo_width
     */
    public function setPhotoWidth($photo_width)
    {
        $this->photo_width = $photo_width;
    }

    /**
     * @return int|null
     */
    public function getPhotoHeight()
    {
        return $this->photo_height;
    }

    /**
     * @param int|null $photo_height
     */
    public function setPhotoHeight($photo_height)
    {
        $this->photo_height = $photo_height;
    }

    /**
     * @return null|string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param null|string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return null|string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param null|string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return null|string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * @param null|string $caption
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
    }
}