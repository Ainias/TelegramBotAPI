<?php

namespace Ainias\TelegramBot\Objects;

class Audio extends TypeObject
{
    /** @var  string */
    private $file_id;

    /** @var  integer */
    private $duration;

    /** @var  string | NULL */
    private $performer;

    /** @var  string | NULL */
    private $title;

    /** @var  string | NULL */
    private $mime_type;

    /** @var  integer | NULL */
    private $file_size;

    /**
     * @return string
     */
    public function getFileId(): string
    {
        return $this->file_id;
    }

    /**
     * @param string $file_id
     */
    public function setFileId(string $file_id)
    {
        $this->file_id = $file_id;
    }

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     */
    public function setDuration(int $duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return NULL|string
     */
    public function getPerformer()
    {
        return $this->performer;
    }

    /**
     * @param NULL|string $performer
     */
    public function setPerformer($performer)
    {
        $this->performer = $performer;
    }

    /**
     * @return NULL|string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param NULL|string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return NULL|string
     */
    public function getMimeType()
    {
        return $this->mime_type;
    }

    /**
     * @param NULL|string $mime_type
     */
    public function setMimeType($mime_type)
    {
        $this->mime_type = $mime_type;
    }

    /**
     * @return int|NULL
     */
    public function getFileSize()
    {
        return $this->file_size;
    }

    /**
     * @param int|NULL $file_size
     */
    public function setFileSize($file_size)
    {
        $this->file_size = $file_size;
    }


}