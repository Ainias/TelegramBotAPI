<?php

namespace Ainias\Library\TelegramBot\Objects;

class Video extends TypeObject
{
    /** @var  string */
    private $file_id;

    /** @var  integer */
    private $width;

    /** @var  integer */
    private $height;

    /** @var  integer */
    private $duration;

    /** @var  PhotoSize | NULL*/
    private $thumb;

    /** @var  string | NULL */
    private $mime_type;

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
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     */
    public function setDuration(int $duration)
    {
        $this->duration = $duration;
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
    public function getMimeType()
    {
        return $this->mime_type;
    }

    /**
     * @param NULL|string $mime_type
     */
    public function setMimeType($mime_type)
    {
        $this->mime_type = $mime_type;
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