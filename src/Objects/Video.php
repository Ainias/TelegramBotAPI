<?php

namespace ainias\TelegramBot\Objects;

class Video implements TypeInterface
{
    private $file_id;
    private $width;
    private $height;
    private $duration;
    /** @var  PhotoSize */
    private $thumb;
    private $mime_type;
    private $file_size;
    private $caption;

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
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * @param mixed $caption
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
    }

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param mixed $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
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
     * @return mixed
     */
    public function getMimeType()
    {
        return $this->mime_type;
    }

    /**
     * @param mixed $mime_type
     */
    public function setMimeType($mime_type)
    {
        $this->mime_type = $mime_type;
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
        $this->setDuration($arrayData["duration"]);
        $this->setThumb(new PhotoSize($arrayData["thumb"]));
        (isset($arrayData["mime_type"])) && $this->setMimeType($arrayData["mime_type"]);
        (isset($arrayData["file_size"])) && $this->setFileSize($arrayData["file_size"]);
        (isset($arrayData["caption"])) && $this->setCaption($arrayData["caption"]);
    }

    /** @return array */
    public function extract()
    {
        $data["file_id"] = $this->getFileId();
        $data["width"] = $this->getWidth();
        $data["height"] = $this->getHeight();
        $data["duration"] = $this->getDuration();
        $data["thumb"] = $this->getThumb()->extract();

        ($this->getMimeType() !== NULL) && ($data["mime_type"] = $this->getMimeType());
        ($this->getFileSize() !== NULL) && ($data["file_size"] = $this->getFileSize());
        ($this->getCaption() !== NULL) && ($data["caption"] = $this->getCaption());

        return $data;
    }
}