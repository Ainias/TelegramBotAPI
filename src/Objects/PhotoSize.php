<?php

namespace Ainias\TelegramBot\Objects;

class PhotoSize extends TypeObject
{
    /** @var  string */
    private $file_id;

    /** @var integer */
    private $width;

    /** @var  integer */
    private $height;

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