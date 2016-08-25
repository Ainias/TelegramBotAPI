<?php

namespace Ainias\Library\TelegramBot;

use Ainias\Library\TelegramBot\Objects\Chat;
use Ainias\Library\TelegramBot\Objects\ChatMember;
use Ainias\Library\TelegramBot\Objects\File;
use Ainias\Library\TelegramBot\Objects\ForceReply;
use Ainias\Library\TelegramBot\Objects\InlineKeyboardMarkup;
use Ainias\Library\TelegramBot\Objects\Message;
use Ainias\Library\TelegramBot\Objects\ReplyKeyboardHide;
use Ainias\Library\TelegramBot\Objects\ReplyKeyboardMarkup;
use Ainias\Library\TelegramBot\Objects\Update;
use Ainias\Library\TelegramBot\Objects\User;
use Ainias\Library\TelegramBot\Objects\UserProfilePhotos;
use Ainias\Library\TelegramBot\UpdateHandlers\AbstractUpdateHandler;
use Zend\Http\Client;

class Bot
{
    const COMMAND_LINK = "https://api.telegram.org/bot";
    const ACTIVATION_LINK = "http://www.telegram.me/";

    const CHAT_ACTION_TYPING = "typing";
    const CHAT_ACTION_UPLOAD_PHOTO = "upload_photo";
    const CHAT_ACTION_UPLOAD_VIDEO = "upload_video";
    const CHAT_ACTION_UPLOAD_AUDIO = "upload_audio";
    const CHAT_ACTION_UPLOAD_DOCUMENT = "upload_document";
    const CHAT_ACTION_RECORD_VIDEO = "record_video";
    const CHAT_ACTION_RECORD_AUDIO = "record_audio";
    const CHAT_ACTION_FIND_LOCATION = "find_location";

    private $name;

    private $username;

    private $token;

    /** @var  AbstractUpdateHandler[] */
    private $updateHandlers;

    public function __construct($userName, $token)
    {
        $this->username = $userName;
        $this->token = $token;
        $this->name = $userName;
        $this->updateHandlers = [];
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    public function getUsernameLowerCase()
    {
        return strtolower($this->username);
    }

    public function addUpdateHandler(AbstractUpdateHandler $abstractUpdateHandler)
    {
        if (!in_array($abstractUpdateHandler, $this->updateHandlers))
        {
            $this->updateHandlers[] = $abstractUpdateHandler;
        }
    }

    public function removeUpdateHandler($index)
    {
        if ($index instanceof AbstractUpdateHandler)
        {
            $index = array_search($index, $this->updateHandlers);
        }
        if ($index !== false)
        {
            unset($this->updateHandlers[$index]);
        }
    }

    /**
     * @param mixed $userName
     */
    public function setUsername($userName)
    {
        $this->username = $userName;
    }

    public function sendCommand(Command $command)
    {
        $url = Bot::COMMAND_LINK . $this->token . "/" . $command->getCommand();
        $paramString = $command->getParams();

        $config = array(
            'maxredirects' => 3,
            'timeout' => 30,
            'adapter' => 'Zend\Http\Client\Adapter\Curl',
            'curloptions' => array(
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_SSL_VERIFYPEER => false,
            ),
        );

        $client = new Client($url, $config);
        $client->setMethod("POST");
        $client->setParameterPost($command->getArguments());
        $files = $command->getFiles();
        foreach ($files as $key => $file)
        {
            $client->setFileUpload($file, $key);
        }

        $response = $client->send();
        $response = json_decode($response->getBody(), true);
        if ($response["ok"] !== true) {
            throw new \Exception("Es gab einen Fehler bei der Funktion: \"" . $response["description"] . "\"");
        }
        return $response;
    }

    /**
     * @return User
     */
    public function getMe()
    {
        $command = new Command("getMe");
        $result = $this->sendCommand($command);
        $user = new User($result["result"]);
        return $user;
    }

    /**
     * @param $chatId
     * @param $text
     * @param string $parseMode
     * @param bool $disableWebPagePreview
     * @param bool $disableNotification
     * @param null $replyToMessageId
     * @param null $replyMarkup
     * @return Message
     */
    public function sendMessage($chatId, $text, $parseMode = "html", $disableWebPagePreview = false, $disableNotification = false, $replyToMessageId = NULL, $replyMarkup = NULL)
    {
        $command = new Command("sendMessage", array(
            'chat_id' => $chatId,
            'text' => $text,
            'parse_mode' => $parseMode,
            'disable_web_page_preview' => $disableWebPagePreview,
            'disable_notification' => $disableNotification,
        ));

        ($replyToMessageId !== NULL) && $command->setArgument("reply_to_message_id", $replyToMessageId);

        if ($replyMarkup instanceof ReplyKeyboardMarkup ||
            $replyMarkup instanceof ReplyKeyboardHide ||
            $replyMarkup instanceof ForceReply ||
            $replyMarkup instanceof InlineKeyboardMarkup
        ) {
            $command->setArgument("reply_markup", json_encode($replyMarkup->extract()));
        }

        $result = $this->sendCommand($command);
        $message = new Message($result["result"]);
        return $message;
    }

    /**
     * @param $toChatId
     * @param $fromChatId
     * @param $messageId
     * @param bool $disableNotification
     * @return Message
     */
    public function forwardMessage($toChatId, $fromChatId, $messageId, $disableNotification = false)
    {
        $command = new Command("forwardMessage", array(
            'chat_id' => $toChatId,
            'from_chat_id' => $fromChatId,
            'message_id' => $messageId,
            'disable_notification' => $disableNotification,
        ));

        $result = $this->sendCommand($command);
        $message = new Message($result["result"]);
        return $message;
    }


    public function sendPhoto($chatId, $photo, $caption = NULL, $disableNotification = false, $replyToMessageId = NULL, $replyMarkup = NULL)
    {
        $command = new Command("sendPhoto", array(
            'chat_id' => $chatId,
            'disable_notification' => $disableNotification,
        ), [
            'photo' => $photo
        ]);

        ($caption != null) && $command->setArgument("caption", $caption);
        $replyToMessageId != null && $command->setArgument("reply_to_message_id", $replyToMessageId);
        $replyMarkup  != null && $command->setArgument("reply_markup", $replyMarkup);

        $result = $this->sendCommand($command);
        $message = new Message($result["result"]);
        return $message;
    }

    //public function sendAudio();
    //public function sendDocument();
    //public function sendSticker();
    //public function sendVideo();
    //public function sendVoice();

    public function sendLocation($chatId, $latitude, $longitude, $disableNotification = false, $replyToMessageId = NULL, $replyMarkup = NULL)
    {
        $command = new Command("sendLocation", array(
            'chat_id' => $chatId,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'disable_notification' => $disableNotification,
        ));

        ($replyToMessageId !== NULL) && $command->setArgument("reply_to_message_id", $replyToMessageId);

        if ($replyMarkup instanceof ReplyKeyboardMarkup ||
            $replyMarkup instanceof ReplyKeyboardHide ||
            $replyMarkup instanceof ForceReply ||
            $replyMarkup instanceof InlineKeyboardMarkup) {
            $command->setArgument("reply_markup", json_encode($replyMarkup->extract()));
        }

        $result = $this->sendCommand($command);
        $message = new Message($result["result"]);
        return $message;
    }

    public function sendVenue($chatId, $latitude, $longitude, $title, $address, $foursquareId = null, $disableNotification = false, $replyToMessageId = NULL, $replyMarkup = NULL)
    {
        $command = new Command("sendVenue", array(
            'chat_id' => $chatId,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'title' => $title,
            'address' => $address,
            'disable_notification' => $disableNotification,
        ));

        ($replyToMessageId !== NULL) && $command->setArgument("reply_to_message_id", $replyToMessageId);
        ($foursquareId !== NULL) && $command->setArgument("foursquare_id", $foursquareId);

        if ($replyMarkup instanceof ReplyKeyboardMarkup ||
            $replyMarkup instanceof ReplyKeyboardHide ||
            $replyMarkup instanceof ForceReply ||
            $replyMarkup instanceof InlineKeyboardMarkup) {
            $command->setArgument("reply_markup", json_encode($replyMarkup->extract()));
        }

        $result = $this->sendCommand($command);
        $message = new Message($result["result"]);
        return $message;
    }

    public function sendContact($chatId, $phoneNumber, $firstName, $lastName = null, $disableNotification = false, $replyToMessageId = NULL, $replyMarkup = NULL)
    {
        $command = new Command("sendContact", array(
            'chat_id' => $chatId,
            'phone_number' => $phoneNumber,
            'first_name' => $firstName,
            'disable_notification' => $disableNotification,
        ));

        ($replyToMessageId !== NULL) && $command->setArgument("reply_to_message_id", $replyToMessageId);
        ($lastName !== NULL) && $command->setArgument("last_name", $lastName);

        if ($replyMarkup instanceof ReplyKeyboardMarkup ||
            $replyMarkup instanceof ReplyKeyboardHide ||
            $replyMarkup instanceof ForceReply ||
            $replyMarkup instanceof InlineKeyboardMarkup) {
            $command->setArgument("reply_markup", json_encode($replyMarkup->extract()));
        }

        $result = $this->sendCommand($command);
        $message = new Message($result["result"]);
        return $message;
    }

    public function sendChatAction($chatId, $action)
    {
        if ($action == Bot::CHAT_ACTION_TYPING ||
            $action == Bot::CHAT_ACTION_RECORD_AUDIO ||
            $action == Bot::CHAT_ACTION_RECORD_VIDEO ||
            $action == Bot::CHAT_ACTION_UPLOAD_AUDIO ||
            $action == Bot::CHAT_ACTION_UPLOAD_DOCUMENT ||
            $action == Bot::CHAT_ACTION_UPLOAD_PHOTO ||
            $action == Bot::CHAT_ACTION_UPLOAD_VIDEO ||
            $action == Bot::CHAT_ACTION_FIND_LOCATION
        ) {

            $command = new Command("sendChatAction", array(
                'chat_id' => $chatId,
                'action' => $action,
            ));

            $result = $this->sendCommand($command);
            return $result["ok"];
        }
        throw new \Exception("Action \"" . $action . "\" not allowed!");
    }

    public function getUserProfilePhotos($userId, $offset = NULL, $limit = NULL)
    {
        $command = new Command("getUserProfilePhotos", array(
            'user_id' => $userId,
        ));

        ($offset !== NULL) && $command->setArgument("offset", $offset);
        ($limit !== NULL) && $command->setArgument("limit", $limit);

        $result = $this->sendCommand($command);
        $userProfilePhotos = new UserProfilePhotos($result["result"]);
        return $userProfilePhotos;
    }

    public function getFile($fileId)
    {
        $command = new Command("getFile", [
            "file_id" => $fileId,
        ]);

        $result = $this->sendCommand($command);
        $file = new File($result["result"]);
        return $file;
    }

    public function kickChatMember($chatId, $userId)
    {
        $command = new Command("kickChatMember", [
            'chat_id' => $chatId,
            'user_id' => $userId,
        ]);

        $result = $this->sendCommand($command);
        return $result;
    }

    public function leaveChat($chatId)
    {
        $command = new Command("leaveChat", [
            'chat_id' => $chatId,
        ]);

        $result = $this->sendCommand($command);
        return $result;
    }

    public function unbanChatMember($chatId, $userId)
    {
        $command = new Command("unbanChatMember", [
            'chat_id' => $chatId,
            'user_id' => $userId
        ]);

        $result = $this->sendCommand($command);
        return $result;
    }

    public function getChat($chatId)
    {
        $command = new Command("getChat", [
            'chat_id' => $chatId,
        ]);

        $result = $this->sendCommand($command);
        return new Chat($result);
    }

    public function getChatAdministrators($chatId)
    {
        $command = new Command("getChat", [
            'chat_id' => $chatId,
        ]);

        $result = $this->sendCommand($command);
        $updates = array();
        foreach ($result["result"] as $update) {
            $updates[] = new ChatMember($update);
        }
        return $updates;
    }

    public function getChatMembersCount($chatId)
    {
        $command = new Command("getChatMembersCount", [
            'chat_id' => $chatId,
        ]);

        $result = $this->sendCommand($command);
        return new Chat($result);
    }

    public function getChatMember($chatId, $userId)
    {
        $command = new Command("getChat", [
            'chat_id' => $chatId,
            'user_id' => $userId,
        ]);

        $result = $this->sendCommand($command);
        return new ChatMember($result);
    }

    public function answerCallbackQuery($callbackQueryId, $text = null, $showAlert = false)
    {
        $command = new Command("answerCallbackQuery", [
            'callback_query_id' => $callbackQueryId,
            'show_alert' => $showAlert,
        ]);

        ($text !== null) && $command->setArgument("text", $text);

        $result = $this->sendCommand($command);
        return $result;
    }

    public function getUpdates($offset = NULL, $limit = 100, $timeout = 0)
    {
        $command = new Command("getUpdates", [
            'limit' => $limit,
            'timeout' => $timeout,
        ]);

        ($offset !== NULL) && $command->setArgument("offset", $offset);

        $result = $this->sendCommand($command);
        $updates = array();
        foreach ($result["result"] as $update) {
            $updates[] = new Update($update);
        }
        return $updates;
    }

    public function setWebhook($url = NULL)
    {
        $command = new Command("setWebhook", array());

        ($url !== NULL) && $command->setArgument("url", $url);
        file_put_contents("log.log", "URL Webhook: $url\n", FILE_APPEND);

        try {
            $result = $this->sendCommand($command);
            return $result;
        } catch (\Exception $e) {
            file_put_contents("log.log", "URL Webhook-Exception: " . $e->getMessage() . "\n", FILE_APPEND);
            die($e->getMessage());
        }
    }

    public function handleUpdate(Update $update)
    {
        foreach ($this->updateHandlers as $updateHandler)
        {
            $updateHandler->handleUpdate($update, $this);
        }
    }

    /**
     * @param Update[] $updates
     */
    public function handleUpdates($updates)
    {
        foreach ($updates as $update)
        {
            $this->handleUpdate($update);
        }
    }

    public static function log($message)
    {
        if (is_string($message)) {
            $time = new \DateTime();
            $logValue = "[" . $time->format("Y-m-d H:i:s.u") . "]" . $message;
            file_put_contents("telegramBot.log", $logValue . PHP_EOL, FILE_APPEND);
        }
    }
}