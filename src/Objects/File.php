<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 17.08.16
 * Time: 22:02
 */

namespace Ainias\TelegramBot\Objects;


class File extends TypeObject
{
    /** @var  string */
    private $file_id;

    /** @var  integer | null */
    private $file_size;

    /** @var  string | null */
    private $file_path;

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

    /**
     * @return null|string
     */
    public function getFilePath()
    {
        return $this->file_path;
    }

    /**
     * @param null|string $file_path
     */
    public function setFilePath($file_path)
    {
        $this->file_path = $file_path;
    }


}