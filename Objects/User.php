<?php

namespace TelegramBot\Objects;

class User implements TypeInterface{
    private $id;
    private $first_name;
    private $last_name;
    private $username;

    public function __construct($arrayData = NULL)
    {
        if (is_array($arrayData))
        {
            $this->hydrate($arrayData);
        }
    }

    public static function isUserArray($userArray)
    {
        return (isset($userArray["id"]) && isset($userArray["first_name"]));
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function hydrate($arrayData)
    {
        $this->setId($arrayData["id"]);
        $this->setFirstName($arrayData["first_name"]);
        (isset($arrayData["last_name"])) && $this->setLastName($arrayData["last_name"]);
        (isset($arrayData["username"])) && $this->setUsername($arrayData["username"]);
    }

    /** @return array */
    public function extract()
    {
        $data["id"] = $this->getId();
        $data["first_name"] = $this->getFirstName();
        ($this->getLastName() !== NULL) && ($data["last_name"] = $this->getLastName());
        ($this->getUsername() !== NULL) && ($data["username"] = $this->getUsername());

        return $data;
    }


} 