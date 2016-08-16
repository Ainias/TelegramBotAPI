<?php

namespace ainias\TelegramBot\Objects;

class Location implements TypeInterface
{
    private $longitude;
    private $latitude;

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
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    public function hydrate($arrayData)
    {
        $this->setLongitude($arrayData["longitude"]);
        $this->setLatitude($arrayData["latitude"]);
    }

    /** @return array */
    public function extract()
    {
        $data["longitude"] = $this->getLongitude();
        $data["latitude"] = $this->getLatitude();

        return $data;
    }
}