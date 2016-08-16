<?php

namespace ainias\TelegramBot\Objects;

class UserProfilePhotos implements TypeInterface
{
    private $total_count;
    /** @var  PhotoSize[][] */
    private $photos;

    public function __construct($arrayData = NULL)
    {
        $this->photos = array();
        if (is_array($arrayData))
        {
            $this->hydrate($arrayData);
        }
    }

    /**
     * @return PhotoSize[][]
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * @param PhotoSize[][] $photos
     */
    public function setPhotos($photos)
    {
        $this->photos = $photos;
    }

    /**
     * @return mixed
     */
    public function getTotalCount()
    {
        return $this->total_count;
    }

    /**
     * @param mixed $total_count
     */
    public function setTotalCount($total_count)
    {
        $this->total_count = $total_count;
    }

    public function hydrate($arrayData)
    {
        $this->setTotalCount($arrayData["total_count"]);
        $photos = array();
        foreach($arrayData["photos"] as $photo)
        {
            $photos[] = PhotoSize::hydrateArray($photo);
        }
        $this->setPhotos($photos);
    }

    /** @return array */
    public function extract()
    {
        $data["total_count"] = $this->getTotalCount();
        $photos = array();
        foreach($this->getPhotos() as $photo)
        {
            $photos[] = PhotoSize::extractArray($photo);
        }
        $data["photos"] = $photos;

        return $data;
    }
}