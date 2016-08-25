<?php

namespace Ainias\Library\TelegramBot\Objects;

class Message extends TypeObject
{
    /** @var  integer */
    private $message_id;

    /** @var  User */
    private $from;

    /** @var  integer */
    private $date;

    /** @var  Chat */
    private $chat;

    /** @var  User | NULL */
    private $forward_from;

    /** @var  Chat | NULL */
    private $forward_from_chat;

    /** @var  integer */
    private $forward_date;

    /** @var  Message | NULL */
    private $reply_to_message;

    /** @var  integer | NULL */
    private $edit_date;

    /** @var  string | NULL */
    private $text;

    /** @var  MessageEntity[] | NULL */
    private $entities;

    /** @var  Audio | NULL */
    private $audio;

    /** @var  Document | NULL */
    private $document;

    /** @var  PhotoSize[] | NULL */
    private $photo;

    /** @var  Sticker | NULL */
    private $sticker;

    /** @var  Video |NULL */
    private $video;

    /** @var  Voice | NULL */
    private $voice;

    /** @var  Contact | NULL */
    private $contact;

    /** @var  Location | NULL */
    private $location;

    /** @var  Venue | NULL */
    private $venue;

    /** @var  User | NULL */
    private $new_chat_member;

    /** @var  User | NULL */
    private $left_chat_member;

    /** @var  string | NULL */
    private $new_chat_title;

    /** @var  PhotoSize[] | NULL */
    private $new_chat_photo;

    /** @var  bool | NULL */
    private $delete_chat_photo;

    /** @var  bool | NULL */
    private $group_chat_created;

    /** @var  bool | NULL */
    private $supergroup_chat_created;

    /** @var  bool | NULL */
    private $channel_chat_created;

    /** @var  integer | NULL */
    private $migrate_to_chat_id;

    /** @var  integer | NULL */
    private $migrate_from_chat_id;

    /** @var  Message | NULL */
    private $pinned_message;

    /**
     * @return NULL|Audio
     */
    public function getAudio()
    {
        return $this->audio;
    }

    /**
     * @param NULL|Audio $audio
     */
    public function setAudio($audio)
    {
        if (is_array($audio))
        {
            $audio = new Audio($audio);
        }
        $this->audio = $audio;
    }

    /**
     * @return NULL|Contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param NULL|Contact $contact
     */
    public function setContact($contact)
    {
        if (is_array($contact))
        {
            $contact = new Contact($contact);
        }
        $this->contact = $contact;
    }

    /**
     * @return bool|NULL
     */
    public function getDeleteChatPhoto()
    {
        return $this->delete_chat_photo;
    }

    /**
     * @param bool|NULL $delete_chat_photo
     */
    public function setDeleteChatPhoto($delete_chat_photo)
    {
        $this->delete_chat_photo = $delete_chat_photo;
    }

    /**
     * @return bool|NULL
     */
    public function getGroupChatCreated()
    {
        return $this->group_chat_created;
    }

    /**
     * @param bool|NULL $group_chat_created
     */
    public function setGroupChatCreated($group_chat_created)
    {
        $this->group_chat_created = $group_chat_created;
    }

    /**
     * @return NULL|Document
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @param NULL|Document $document
     */
    public function setDocument($document)
    {
        if (is_array($document))
        {
            $document = new Document($document);
        }
        $this->document = $document;
    }

    /**
     * @return NULL|User
     */
    public function getForwardFrom()
    {
        return $this->forward_from;
    }

    /**
     * @param NULL|User $forward_from
     */
    public function setForwardFrom($forward_from)
    {
        if (is_array($forward_from))
        {
            $forward_from = new User($forward_from);
        }
        $this->forward_from = $forward_from;
    }

    /**
     * @return User
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param User $from
     */
    public function setFrom($from)
    {
        if (is_array($from))
        {
            $from = new User($from);
        }
        $this->from = $from;
    }

    /**
     * @return NULL|Location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param NULL|Location $location
     */
    public function setLocation($location)
    {
        if (is_array($location))
        {
            $location = new Location($location);
        }
        $this->location = $location;
    }

    /**
     * @return PhotoSize[]
     */
    public function getNewChatPhoto()
    {
        return $this->new_chat_photo;
    }

    /**
     * @param PhotoSize[] $new_chat_photo
     */
    public function setNewChatPhoto($new_chat_photo)
    {
        if (is_array($new_chat_photo)) {
            if (is_array($new_chat_photo[0])) {
                $new_chat_photo = self::hydrateArray($new_chat_photo, PhotoSize::class);
            }
            $this->$new_chat_photo = $new_chat_photo;
        }
    }

    /**
     * @return NULL|PhotoSize[]
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param NULL|PhotoSize[] $photo
     */
    public function setPhoto($photo)
    {
        if (is_array($photo)) {
            if (is_array($photo[0])) {
                $photo = self::hydrateArray($photo, PhotoSize::class);
            }
            $this->photo = $photo;
        }
    }

    /**
     * @return NULL|Message
     */
    public function getReplyToMessage()
    {
        return $this->reply_to_message;
    }

    /**
     * @param NULL|Message $reply_to_message
     */
    public function setReplyToMessage($reply_to_message)
    {
        if (is_array($reply_to_message)) {
            $reply_to_message = new Message($reply_to_message);
        }
        $this->reply_to_message = $reply_to_message;
    }

    /**
     * @return NULL|Sticker
     */
    public function getSticker()
    {
        return $this->sticker;
    }

    /**
     * @param NULL|Sticker $sticker
     */
    public function setSticker($sticker)
    {
        if (is_array($sticker)) {
            $sticker = new Sticker($sticker);
        }
        $this->sticker = $sticker;
    }

    /**
     * @return NULL|Video
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * @param NULL|Video $video
     */
    public function setVideo($video)
    {
        if (is_array($video)) {
            $video = new Video($video);
        }
        $this->video = $video;
    }


    /**
     * @return Chat
     */
    public function getChat(): Chat
    {
        return $this->chat;
    }

    /**
     * @param Chat $chat
     */
    public function setChat($chat)
    {
        if (is_array($chat)) {
            $chat = new Chat($chat);
        }
        $this->chat = $chat;
    }

    /**
     * @return Chat|NULL
     */
    public function getForwardFromChat()
    {
        return $this->forward_from_chat;
    }

    /**
     * @param Chat|NULL $forward_from_chat
     */
    public function setForwardFromChat($forward_from_chat)
    {
        if (is_array($forward_from_chat)) {
            $forward_from_chat = new Chat($forward_from_chat);
        }
        $this->forward_from_chat = $forward_from_chat;
    }

    /**
     * @return int|NULL
     */
    public function getEditDate()
    {
        return $this->edit_date;
    }

    /**
     * @param int|NULL $edit_date
     */
    public function setEditDate($edit_date)
    {
        $this->edit_date = $edit_date;
    }

    /**
     * @return MessageEntity[]|NULL
     */
    public function getEntities()
    {
        return $this->entities;
    }

    /**
     * @param MessageEntity[]|NULL $entities
     */
    public function setEntities($entities)
    {
        if (is_array($entities)) {
            if (is_array($entities[0])) {
                $entities = self::hydrateArray($entities, MessageEntity::class);
            }
            $this->entities = $entities;
        }
    }

    /**
     * @return Voice|NULL
     */
    public function getVoice()
    {
        return $this->voice;
    }

    /**
     * @param Voice|NULL $voice
     */
    public function setVoice($voice)
    {
        if (is_array($voice)) {
            $voice = new Voice($voice);
        }
        $this->voice = $voice;
    }

    /**
     * @return Venue|NULL
     */
    public function getVenue()
    {
        return $this->venue;
    }

    /**
     * @param Venue|NULL $venue
     */
    public function setVenue($venue)
    {
        if (is_array($venue)) {
            $venue = new Venue($venue);
        }
        $this->venue = $venue;
    }

    /**
     * @return User|NULL
     */
    public function getNewChatMember()
    {
        return $this->new_chat_member;
    }

    /**
     * @param User|NULL $new_chat_member
     */
    public function setNewChatMember($new_chat_member)
    {
        if (is_array($new_chat_member)) {
            $new_chat_member = new User($new_chat_member);
        }
        $this->new_chat_member = $new_chat_member;
    }

    /**
     * @return User|NULL
     */
    public function getLeftChatMember()
    {
        return $this->left_chat_member;
    }

    /**
     * @param User|NULL $left_chat_member
     */
    public function setLeftChatMember($left_chat_member)
    {
        if (is_array($left_chat_member)) {
            $left_chat_member = new User($left_chat_member);
        }
        $this->left_chat_member = $left_chat_member;
    }

    /**
     * @return bool|NULL
     */
    public function getSupergroupChatCreated()
    {
        return $this->supergroup_chat_created;
    }

    /**
     * @param bool|NULL $supergroup_chat_created
     */
    public function setSupergroupChatCreated($supergroup_chat_created)
    {
        $this->supergroup_chat_created = $supergroup_chat_created;
    }

    /**
     * @return bool|NULL
     */
    public function getChannelChatCreated()
    {
        return $this->channel_chat_created;
    }

    /**
     * @param bool|NULL $channel_chat_created
     */
    public function setChannelChatCreated($channel_chat_created)
    {
        $this->channel_chat_created = $channel_chat_created;
    }

    /**
     * @return int|NULL
     */
    public function getMigrateToChatId()
    {
        return $this->migrate_to_chat_id;
    }

    /**
     * @param int|NULL $migrate_to_chat_id
     */
    public function setMigrateToChatId($migrate_to_chat_id)
    {
        $this->migrate_to_chat_id = $migrate_to_chat_id;
    }

    /**
     * @return int|NULL
     */
    public function getMigrateFromChatId()
    {
        return $this->migrate_from_chat_id;
    }

    /**
     * @param int|NULL $migrate_from_chat_id
     */
    public function setMigrateFromChatId($migrate_from_chat_id)
    {
        $this->migrate_from_chat_id = $migrate_from_chat_id;
    }

    /**
     * @return Message|NULL
     */
    public function getPinnedMessage()
    {
        return $this->pinned_message;
    }

    /**
     * @param Message|NULL $pinned_message
     */
    public function setPinnedMessage($pinned_message)
    {
        if (is_array($pinned_message)) {
            $pinned_message = new Message($pinned_message);
        }
        $this->pinned_message = $pinned_message;
    }

    /**
     * @return int
     */
    public function getMessageId(): int
    {
        return $this->message_id;
    }

    /**
     * @param int $message_id
     */
    public function setMessageId(int $message_id)
    {
        $this->message_id = $message_id;
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @param int $date
     */
    public function setDate(int $date)
    {
        $this->date = $date;
    }

    /**
     * @return int
     */
    public function getForwardDate(): int
    {
        return $this->forward_date;
    }

    /**
     * @param int $forward_date
     */
    public function setForwardDate(int $forward_date)
    {
        $this->forward_date = $forward_date;
    }

    /**
     * @return NULL|string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param NULL|string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return NULL|string
     */
    public function getNewChatTitle()
    {
        return $this->new_chat_title;
    }

    /**
     * @param NULL|string $new_chat_title
     */
    public function setNewChatTitle($new_chat_title)
    {
        $this->new_chat_title = $new_chat_title;
    }
}