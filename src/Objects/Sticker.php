<?php

namespace Ainias\TelegramBot\Objects;

class Sticker extends TypeObject
{
    /** @var  string */
    private $file_id;

    /** @var  integer */
    private $width;

    /** @var  integer */
    private $height;

    /** @var  PhotoSize | NULL*/
    private $thumb;

    /** @var  string | NULL */
    private $emoji;

    /** @var  integer | NULL */
    private $file_size;

    /**
     * @return string
     */
    public function getFileId(): string
    {
        return $this->file_id;
    }

    /**
     * @param string $file_id
     */
    public function setFileId(string $file_id)
    {
        $this->file_id = $file_id;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     */
    public function setWidth(int $width)
    {
        $this->width = $width;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     */
    public function setHeight(int $height)
    {
        $this->height = $height;
    }

    /**
     * @return PhotoSize|NULL
     */
    public function getThumb()
    {
        return $this->thumb;
    }

    /**
     * @param PhotoSize|NULL $thumb
     */
    public function setThumb($thumb)
    {
        if (is_array($thumb))
        {
            $thumb = new PhotoSize($thumb);
        }
        $this->thumb = $thumb;
    }

    /**
     * @return NULL|string
     */
    public function getEmoji()
    {
        return $this->emoji;
    }

    /**
     * @param NULL|string $emoji
     */
    public function setEmoji($emoji)
    {
        $this->emoji = $emoji;
    }

    /**
     * @return int|NULL
     */
    public function getFileSize()
    {
        return $this->file_size;
    }

    /**
     * @param int|NULL $file_size
     */
    public function setFileSize($file_size)
    {
        $this->file_size = $file_size;
    }
}