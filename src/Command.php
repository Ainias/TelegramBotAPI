<?php

namespace Ainias\Library\TelegramBot;

class Command {
    private $command;
    private $arguments;
    private $files;

    public function __construct($command = "", array $arguments = array(), array $files = [])
    {
        $this->command = $command;
        $this->arguments = $arguments;
        $this->files = $files;
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
    public function setFile($key, $filename)
    {
        $this->files[$key] = $filename;
    }

    public function unsetFile($key)
    {
        unset($this->files[$key]);
    }

    /**
     * @return array
     */
    public function getFiles(): array
    {
        return $this->files;
    }

    public function getParams()
    {
        $params = http_build_query($this->arguments);
        return $params;
    }

    /**
     * @return array
     */
    public function getArguments(): array
    {
        return $this->arguments;
    }
} 