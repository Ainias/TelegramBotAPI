<?php

namespace ainias\TelegramBot\Objects;

class Contact implements TypeInterface
{
    private $phone_number;
    private $first_name;
    private $last_name;
    private $user_id;

    public function __construct($arrayData = NULL)
    {
        if (is_array($arrayData)) {
            $this->hydrate($arrayData);
        }
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
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * @param mixed $phone_number
     */
    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = $phone_number;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function hydrate($arrayData)
    {
        $this->setPhoneNumber($arrayData["phone_number"]);
        $this->setFirstName($arrayData["first_name"]);

        (isset($arrayData["last_name"])) && $this->setLastName($arrayData["last_name"]);
        (isset($arrayData["user_id"])) && $this->setUserId($arrayData["user_id"]);
    }

    /** @return array */
    public function extract()
    {
        $data["phone_number"] = $this->getPhoneNumber();
        $data["first_name"] = $this->getFirstName();

        ($this->getLastName() !== NULL) && ($data["last_name"] = $this->getLastName());
        ($this->getUserId() !== NULL) && ($data["user_id"] = $this->getUserId());

        return $data;
    }

}