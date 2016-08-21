<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 21.08.16
 * Time: 11:20
 */

namespace Ainias\TelegramBot\UpdateHandlers;

use Ainias\TelegramBot\UpdateHandlers\AffectedValidators\TextValidator;

abstract class AbstractTextHandler extends AbstractUpdateHandler
{
    public function __construct()
    {
        $this->validator = new TextValidator();
    }
}