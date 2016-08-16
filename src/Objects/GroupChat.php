<?php

namespace ainias\TelegramBot\Objects;

class GroupChat implements TypeInterface
{
    private $id;
    private $title;

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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function hydrate($arrayData)
    {
        $this->setId($arrayData["id"]);
        $this->setTitle($arrayData["title"]);
    }

    /** @return array */
    public function extract()
    {
        $data["id"] = $this->getId();
        $data["title"] = $this->getTitle();
    }
}