<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 17.08.16
 * Time: 21:58
 */

namespace Ainias\Library\TelegramBot\Objects;


class Voice extends TypeObject
{
    /** @var  string */
    private $file_id;

    /** @var  integer */
    private $duration;

    /** @var  string | null */
    private $mime_type;

    /** @var  integer | null */
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
     * @return null|string
     */
    public function getMimeType()
    {
        return $this->mime_type;
    }

    /**
     * @param null|string $mime_type
     */
    public function setMimeType($mime_type)
    {
        $this->mime_type = $mime_type;
    }

    /**
     * @return int|null
     */
    public function getFileSize()
    {
        return $this->file_size;
    }

    /**
     * @param int|null $file_size
     */
    public function setFileSize($file_size)
    {
        $this->file_size = $file_size;
    }
}