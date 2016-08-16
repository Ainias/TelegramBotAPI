<?php

namespace ainias\TelegramBot\Objects;

class Sticker implements TypeInterface
{
    private $file_id;
    private $width;
    private $height;
    /** @var  PhotoSize */
    private $thumb;
    private $file_size;

    public function __construct($arrayData = NULL)
    {
        if (is_array($arrayData))
        {
            $this->hydrate($arrayData);
        }
    }

    /**
     * @return mixed
     */
    public function getFileId()
    {
        return $this->file_id;
    }

    /**
     * @param mixed $file_id
     */
    public function setFileId($file_id)
    {
        $this->file_id = $file_id;
    }

    /**
     * @return mixed
     */
    public function getFileSize()
    {
        return $this->file_size;
    }

    /**
     * @param mixed $file_size
     */
    public function setFileSize($file_size)
    {
        $this->file_size = $file_size;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return PhotoSize
     */
    public function getThumb()
    {
        return $this->thumb;
    }

    /**
     * @param PhotoSize $thumb
     */
    public function setThumb($thumb)
    {
        $this->thumb = $thumb;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function hydrate($arrayData)
    {
        $this->setFileId($arrayData["file_id"]);
        $this->setWidth($arrayData["width"]);
        $this->setHeight($arrayData["height"]);
        $this->setThumb(new PhotoSize($arrayData["thumb"]));

        (isset($arrayData["file_size"])) && $this->setFileSize($arrayData["file_size"]);
    }

    /** @return array */
    public function extract()
    {
        $data["file_id"] = $this->getFileId();
        $data["width"] = $this->getWidth();
        $data["height"] = $this->getHeight();
        $data["thumb"] = $this->getThumb()->extract();

        ($this->getFileSize() !== NULL) && ($data["file_size"] = $this->getFileSize());

        return $data;
    }
}