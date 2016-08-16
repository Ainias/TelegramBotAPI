<?php

namespace ainias\TelegramBot\Objects;

class Message implements TypeInterface
{
    private $message_id;
    /** @var  User */
    private $from;
    private $date;
    /** @var  User | GroupChat*/
    private $chat;
    /** @var  User | NULL */
    private $forward_from;
    private $forward_date;
    /** @var  Message | NULL */
    private $reply_to_message;
    private $text;
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
    /** @var  Contact | NULL */
    private $contact;
    /** @var  Location | NULL */
    private $location;
    /** @var  User | NULL */
    private $new_chat_participant;
    /** @var  User | NULL */
    private $left_chat_participant;
    private $new_chat_title;
    /** @var  PhotoSize[] */
    private $new_chat_photo;
    /** @var  bool */
    private $delete_chat_photo;
    /** @var  bool */
    private $group_chat_created;

    public function __construct($arrayData = NULL)
    {
        if (is_array($arrayData))
        {
            $this->hydrate($arrayData);
        }
    }

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
        $this->audio = $audio;
    }

    /**
     * @return User | GroupChat
     */
    public function getChat()
    {
        return $this->chat;
    }

    /**
     * @param User | GroupChat$chat
     */
    public function setChat($chat)
    {
        $this->chat = $chat;
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
        $this->contact = $contact;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return boolean
     */
    public function isDeleteChatPhoto()
    {
        return $this->delete_chat_photo;
    }

    /**
     * @param boolean $delete_chat_phoro
     */
    public function setDeleteChatPhoto($delete_chat_phoro)
    {
        $this->delete_chat_photo = $delete_chat_phoro;
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
        $this->document = $document;
    }

    /**
     * @return mixed
     */
    public function getForwardDate()
    {
        return $this->forward_date;
    }

    /**
     * @param mixed $forward_date
     */
    public function setForwardDate($forward_date)
    {
        $this->forward_date = $forward_date;
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
        $this->from = $from;
    }

    /**
     * @return boolean
     */
    public function isGroupChatCreated()
    {
        return $this->group_chat_created;
    }

    /**
     * @param boolean $group_chat_created
     */
    public function setGroupChatCreated($group_chat_created)
    {
        $this->group_chat_created = $group_chat_created;
    }

    /**
     * @return NULL|User
     */
    public function getLeftChatParticipant()
    {
        return $this->left_chat_participant;
    }

    /**
     * @param NULL|User $left_chat_participant
     */
    public function setLeftChatParticipant($left_chat_participant)
    {
        $this->left_chat_participant = $left_chat_participant;
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
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getMessageId()
    {
        return $this->message_id;
    }

    /**
     * @param mixed $message_id
     */
    public function setMessageId($message_id)
    {
        $this->message_id = $message_id;
    }

    /**
     * @return NULL|User
     */
    public function getNewChatParticipant()
    {
        return $this->new_chat_participant;
    }

    /**
     * @param NULL|User $new_chat_participant
     */
    public function setNewChatParticipant($new_chat_participant)
    {
        $this->new_chat_participant = $new_chat_participant;
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
        $this->new_chat_photo = $new_chat_photo;
    }

    /**
     * @return mixed
     */
    public function getNewChatTitle()
    {
        return $this->new_chat_title;
    }

    /**
     * @param mixed $new_chat_title
     */
    public function setNewChatTitle($new_chat_title)
    {
        $this->new_chat_title = $new_chat_title;
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
        $this->photo = $photo;
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
        $this->sticker = $sticker;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
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
        $this->video = $video;
    }

    public function hydrate($arrayData)
    {
        $this->setMessageId($arrayData["message_id"]);
        $this->setFrom(new User($arrayData["from"]));
        $this->setDate($arrayData["date"]);
        if (User::isUserArray($arrayData["chat"]))
        {
            $this->setChat(new User($arrayData["chat"]));
        }
        else
        {
            $this->setChat(new GroupChat($arrayData["chat"]));
        }

        (isset($arrayData["forward_from"])) && $this->setForwardFrom(new User($arrayData["forward_from"]));
        (isset($arrayData["forward_date"])) && $this->setForwardDate($arrayData["forward_date"]);
        (isset($arrayData["reply_to_message"])) && $this->setReplyToMessage(new Message($arrayData["reply_to_message"]));
        (isset($arrayData["text"])) && $this->setText($arrayData["text"]);
        (isset($arrayData["audio"])) && $this->setAudio(new Audio($arrayData["audio"]));
        (isset($arrayData["document"])) && $this->setDocument(new Document($arrayData["document"]));
        (isset($arrayData["photo"])) && $this->setPhoto(PhotoSize::hydrateArray($arrayData["photo"]));
        (isset($arrayData["sticker"])) && $this->setSticker(new Sticker($arrayData["sticker"]));
        (isset($arrayData["video"])) && $this->setVideo(new Video($arrayData["video"]));
        (isset($arrayData["contact"])) && $this->setContact(new Contact($arrayData["contact"]));
        (isset($arrayData["location"])) && $this->setLocation(new Location($arrayData["location"]));
        (isset($arrayData["new_chat_participant"])) && $this->setNewChatParticipant(new User($arrayData["new_chat_participant"]));
        (isset($arrayData["left_chat_participant"])) && $this->setLeftChatParticipant(new User($arrayData["left_chat_participant"]));
        (isset($arrayData["new_chat_title"])) && $this->setNewChatTitle($arrayData["new_chat_title"]);
        (isset($arrayData["new_chat_photo"])) && $this->setNewChatPhoto(PhotoSize::hydrateArray($arrayData["new_chat_photo"]));
        (isset($arrayData["delete_chat_photo"])) && $this->setDeleteChatPhoto($arrayData["delete_chat_photo"]);
        (isset($arrayData["group_chat_created"])) && $this->setGroupChatCreated($arrayData["group_chat_created"]);
    }

    /** @return array */
    public function extract()
    {
        $data["message_id"] = $this->getMessageId();
        $data["from"] = $this->getFrom()->extract();
        $data["date"] = $this->getDate();
        $data["chat"] = $this->getChat()->extract();

        ($this->getForwardFrom() !== NULL) && ($data["forward_from"] = $this->getForwardFrom()->extract());
        ($this->getForwardDate() !== NULL) && ($data["forward_date"] = $this->getForwardDate());
        ($this->getReplyToMessage() !== NULL) && ($data["reply_to_message"] = $this->getReplyToMessage()->extract());
        ($this->getText() !== NULL) && ($data["text"] = $this->getText());
        ($this->getAudio() !== NULL) && ($data["audio"] = $this->getAudio()->extract());
        ($this->getDocument() !== NULL) && ($data["document"] = $this->getDocument()->extract());
        ($this->getPhoto() !== NULL) && ($data["photo"] = PhotoSize::extractArray($this->getPhoto()));
        ($this->getSticker() !== NULL) && ($data["sticker"] = $this->getSticker()->extract());
        ($this->getContact() !== NULL) && ($data["contact"] = $this->getContact()->extract());
        ($this->getVideo() !== NULL) && ($data["video"] = $this->getVideo()->extract());
        ($this->getLocation() !== NULL) && ($data["location"] = $this->getLocation()->extract());
        ($this->getNewChatParticipant() !== NULL) && ($data["new_chat_participant"] = $this->getNewChatParticipant()->extract());
        ($this->getLeftChatParticipant() !== NULL) && ($data["left_chat_participant"] = $this->getLeftChatParticipant()->extract());
        ($this->getNewChatTitle() !== NULL) && ($data["new_chat_title"] = $this->getNewChatTitle());
        ($this->getNewChatPhoto() !== NULL) && ($data["new_chat_photo"] = PhotoSize::extractArray($this->getNewChatPhoto()));
        ($this->isDeleteChatPhoto() !== NULL) && ($data["delete_chat_photo"] = $this->isDeleteChatPhoto());
        ($this->isGroupChatCreated() !== NULL) && ($data["group_chat_created"] = $this->isGroupChatCreated());

        return $data;
    }
}