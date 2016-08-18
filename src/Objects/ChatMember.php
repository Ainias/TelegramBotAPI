<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 18.08.16
 * Time: 17:48
 */

namespace Ainias\TelegramBot\Objects;


class ChatMember extends TypeObject
{
    /** @var  User */
    private $user;

    /** @var  string*/
    private $status;

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user)
    {
        if (is_array($user))
        {
            $user = new User($user);
        }
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status)
    {
        $this->status = $status;
    }
}