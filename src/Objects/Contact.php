<?php

namespace Ainias\TelegramBot\Objects;

class Contact extends TypeObject
{
    /** @var  string */
    private $phone_number;

    /** @var  string */
    private $first_name;

    /** @var  string | null */
    private $last_name;

    /** @var  integer | null */
    private $user_id;

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phone_number;
    }

    /**
     * @param string $phone_number
     */
    public function setPhoneNumber(string $phone_number)
    {
        $this->phone_number = $phone_number;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     */
    public function setFirstName(string $first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @return null|string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param null|string $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return int|null
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param int|null $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }
}