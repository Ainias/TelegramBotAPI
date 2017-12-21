<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 21.12.17
 * Time: 13:50
 */

namespace Ainias\Library\TelegramBot\Objects\Inline;


use Ainias\Library\TelegramBot\Objects\TypeObject;

class InlineQueryResult extends TypeObject
{
    /** @var  string */
    private $type;

    /** @var  string */
    private $id;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }

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
}