<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 26.11.16
 * Time: 14:23
 */

namespace Ainias\Library\TelegramBot\UpdateHandlers\AffectedValidators;


use Ainias\Library\TelegramBot\Bot;
use Ainias\Library\TelegramBot\Objects\Update;

class TextResponseValidator extends AbstractAffectedValidator
{
    /** @var  ResponseValidator */
    private $responseValidator;

    /** @var  TextValidator */
    private $textValidator;

    /**
     * TextResponseValidator constructor
     */
    public function __construct()
    {
        $this->responseValidator = new ResponseValidator();
        $this->textValidator = new TextValidator();
    }


    public function isAffectedFromUpdate(Update $update, Bot $bot)
    {
        return ($this->responseValidator->isAffectedFromUpdate($update, $bot) && $this->textValidator->isAffectedFromUpdate($update, $bot));
    }

}