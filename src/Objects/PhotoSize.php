<?php

namespace Ainias\TelegramBot\Objects;

class PhotoSize implements TypeInterface
{
    private $file_id;
    private $width;
    private $height;
    private $file_size;

    static public function hydrateArray($array)
    {
        $result = array();
        foreach ($array as $photoSize) {
            $result[] = new PhotoSize($photoSize);
        }
        return $result;
    }

    static public function extractArray($objectArray)
    {
        $result = array();
        /** @var PhotoSize $object */
        foreach($objectArray as $object)
        {
            $result[] = $object->extract();
        }
        return $result;
    }

    public function __construct($arrayData = NULL)
    {
        if (is_array($arrayData)) {
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
     * @param mixed $file_seize
     */
    public function setFileSize($file_seize)
    {
        $this->file_size = $file_seize;
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
        (isset($arrayData["file_size"])) && $this->setFileSize($arrayData["file_size"]);
    }

    /** @return array */
    public function extract()
    {
        $data["file_id"] = $this->getFileId();
        $data["width"] = $this->getWidth();
        $data["height"] = $this->getHeight();
        ($this->getFileSize() !== NULL) && ($data["file_size"] = $this->getFileSize());

        return $data;
    }

}