<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 18.08.16
 * Time: 17:38
 */

namespace Ainias\TelegramBot\Objects;


class KeyboardButton extends TypeObject
{
    /** @var  string */
    private $text;

    /** @var  boolean | null */
    private $request_contact;

    /** @var  boolean | null */
    private $request_location;

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text)
    {
        $this->text = $text;
    }

    /**
     * @return bool|null
     */
    public function getRequestContact()
    {
        return $this->request_contact;
    }

    /**
     * @param bool|null $request_contact
     */
    public function setRequestContact($request_contact)
    {
        $this->request_contact = $request_contact;
    }

    /**
     * @return bool|null
     */
    public function getRequestLocation()
    {
        return $this->request_location;
    }

    /**
     * @param bool|null $request_location
     */
    public function setRequestLocation($request_location)
    {
        $this->request_location = $request_location;
    }
}