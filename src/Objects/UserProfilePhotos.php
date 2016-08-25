<?php

namespace Ainias\Library\TelegramBot\Objects;

class UserProfilePhotos extends TypeObject
{
    /** @var  integer */
    private $total_count;

    /** @var  PhotoSize[][] */
    private $photos;

    /**
     * @return int
     */
    public function getTotalCount(): int
    {
        return $this->total_count;
    }

    /**
     * @param int $total_count
     */
    public function setTotalCount(int $total_count)
    {
        $this->total_count = $total_count;
    }

    /**
     * @return PhotoSize[][]
     */
    public function getPhotos(): array
    {
        return $this->photos;
    }

    /**
     * @param PhotoSize[][] $photos
     */
    public function setPhotos(array $photos)
    {
        if (is_array($photos) && is_array($photos[0]))
        {
            if (is_array($photos[0][0]))
            {
                foreach ($photos as &$photo)
                {
                    $photo = self::hydrateArray($photo, PhotoSize::class);
                }
            }
            $this->photos = $photos;
        }
    }
}