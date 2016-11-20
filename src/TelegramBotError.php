<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 20.11.16
 * Time: 21:44
 */

namespace Ainias\Library\TelegramBot;


class TelegramBotError extends \Exception
{
    private $reason;

    /**
     * TelegramBotError constructor.
     * @param $reason
     */
    public function __construct($reason = "", $message = "")
    {
        $this->reason = $reason;
        parent::__construct($message);
    }


    /**
     * @return mixed
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param mixed $reason
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    }
}