<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 17.08.16
 * Time: 22:00
 */

namespace Ainias\Library\TelegramBot\Objects;


class Venue extends TypeObject
{
    /** @var  Location */
    private $location;

    /** @var  string */
    private $title;

    /** @var  string */
    private $address;

    /** @var  string | NULL */
    private $foursquare_id;

    /**
     * @return Location
     */
    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * @param Location $location
     */
    public function setLocation(Location $location)
    {
        if (is_array($location))
        {
            $location = new Location($location);
        }
        $this->location = $location;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address)
    {
        $this->address = $address;
    }

    /**
     * @return NULL|string
     */
    public function getFoursquareId()
    {
        return $this->foursquare_id;
    }

    /**
     * @param NULL|string $foursquare_id
     */
    public function setFoursquareId($foursquare_id)
    {
        $this->foursquare_id = $foursquare_id;
    }
}