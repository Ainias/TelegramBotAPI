<?php

namespace ainias\TelegramBot\Objects;

interface TypeInterface
{
    public function hydrate($arrayData);
    /** @return array */
    public function extract();
}