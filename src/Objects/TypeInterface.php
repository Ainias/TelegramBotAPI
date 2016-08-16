<?php

namespace Ainias\TelegramBot\Objects;

interface TypeInterface
{
    public function hydrate($arrayData);
    /** @return array */
    public function extract();
}