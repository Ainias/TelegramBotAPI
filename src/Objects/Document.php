<?php

namespace ainias\TelegramBot\Objects;

class Document implements TypeInterface
{
    private $file_id;
    /** @var  PhotoSize */
    private $thumb;
    private $file_name;
    private $mime_type;
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
    public function getFileName()
    {
        return $this->file_name;
    }

    /**
     * @param mixed $file_name
     */
    public function setFileName($file_name)
    {
        $this->file_name = $file_name;
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

    public function hydrate($arrayData)
    {
        $this->setFileId($arrayData["file_id"]);
        $this->setThumb(new PhotoSize($arrayData["thumb"]));
        (isset($arrayData["file_name"])) && $this->setFileName($arrayData["file_name"]);
        (isset($arrayData["mime_type"])) && $this->setMimeType($arrayData["mime_type"]);
        (isset($arrayData["file_size"])) && $this->setFileSize($arrayData["file_size"]);
    }

    /** @return array */
    public function extract()
    {
        $data["file_id"] = $this->getFileId();
        $data["thumb"] = $this->getThumb()->extract();

        ($this->getFileName() !== NULL) && ($data["file_name"] = $this->getFileName());
        ($this->getMimeType() !== NULL) && ($data["mime_type"] = $this->getMimeType());
        ($this->getFileSize() !== NULL) && ($data["file_size"] = $this->getFileSize());

        return $data;
    }
}