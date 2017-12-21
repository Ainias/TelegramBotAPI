<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 21.12.17
 * Time: 13:39
 */

namespace Ainias\Library\TelegramBot\Objects\Inline;

use Ainias\Library\TelegramBot\Objects\Location;
use Ainias\Library\TelegramBot\Objects\TypeObject;
use Ainias\Library\TelegramBot\Objects\User;

class InlineQuery extends TypeObject
{
    /** @var  string */
    private $id;

    /** @var  User */
    private $from;

    /** @var  Location */
    private $location;

    /** @var  string */
    private $query;

    /** @var  string */
    private $offset;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return User|null
     */
    public function getFrom(): User
    {
        return $this->from;
    }

    /**
     * @param User|array $from
     */
    public function setFrom($from)
    {
        if (is_array($from))
        {
            $from = new User($from);
        }
        $this->from = $from;
    }

    /**
     * @return Location|null
     */
    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * @param Location|array $location
     */
    public function setLocation($location)
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
    public function getQuery(): string
    {
        return $this->query;
    }

    /**
     * @param string $query
     */
    public function setQuery(string $query)
    {
        $this->query = $query;
    }

    /**
     * @return string
     */
    public function getOffset(): string
    {
        return $this->offset;
    }

    /**
     * @param string $offset
     */
    public function setOffset(string $offset)
    {
        $this->offset = $offset;
    }
}