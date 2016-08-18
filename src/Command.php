<?php

namespace Ainias\TelegramBot;

class Command {
    private $command;
    private $arguments;

    public function __construct($command = "", array $arguments = array())
    {
        $this->command = $command;
        $this->arguments = $arguments;
    }

    /**
     * @return mixed
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     * @param mixed $command
     */
    public function setCommand($command)
    {
        $this->command = $command;
    }

    public function setArgument($key, $value)
    {
        $this->arguments[$key] = $value;
    }

    public function unsetArgument($key)
    {
        unset($this->arguments[$key]);
    }

    public function getParams()
    {
        $params = http_build_query($this->arguments);
        return $params;
    }
} 