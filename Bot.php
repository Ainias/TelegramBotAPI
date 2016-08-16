<?php

namespace TelegramBot;

use TelegramBot\Interfaces\CommandBotInterface;
use TelegramBot\Interfaces\ForwardMessageBotInterface;
use TelegramBot\Interfaces\ReplyMessageBot;
use TelegramBot\Interfaces\TextBotInterface;
use TelegramBot\Objects\ForceReply;
use TelegramBot\Objects\Message;
use TelegramBot\Objects\ReplyKeyboardHide;
use TelegramBot\Objects\ReplyKeyboardMarkup;
use TelegramBot\Objects\Update;
use TelegramBot\Objects\User;
use TelegramBot\Objects\UserProfilePhotos;

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

    public function __construct($userName, $token)
    {
        $this->username = $userName;
        $this->token = $token;
        $this->name = $userName;
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
        $client->setRawBody($paramString);
        $response = $client->send();
        $response = json_decode($response->getBody(), true);
        if ($response["ok"] !== true) {
            throw new \Exception("Es gab einen Fehler bei der Funktion: \"" . $response["description"] . "\"");
        }
        return $response;
    }

    public function getMe()
    {
        $command = new Command("getMe");
        $result = $this->sendCommand($command);
        $user = new User($result["result"]);
        return $user;
    }

    public function getUpdates($offset = NULL, $limit = NULL, $timeout = NULL)
    {
        $command = new Command("getUpdates");

        ($offset !== NULL) && $command->setArgument("offset", $offset);
        ($limit !== NULL) && $command->setArgument("limit", $limit);
        ($timeout !== NULL) && $command->setArgument("timeout", $timeout);

        $result = $this->sendCommand($command);
        $updates = array();
        foreach ($result["result"] as $update) {
            $updates[] = new Update($update);
        }
        return $updates;
    }

    public function sendMessage($chatId, $text, $disableWebPagePreview = false, $replyToMessageId = NULL, $replyMarkup = NULL)
    {
        $command = new Command("sendMessage", array(
            'chat_id' => $chatId,
            'text' => $text,
            'disable_web_page_preview' => $disableWebPagePreview,
        ));

        ($replyToMessageId !== NULL) && $command->setArgument("reply_to_message_id", $replyToMessageId);

        if ($replyMarkup instanceof ReplyKeyboardMarkup || $replyMarkup instanceof ReplyKeyboardHide || $replyMarkup instanceof ForceReply) {
            $command->setArgument("reply_markup", json_encode($replyMarkup->extract()));
        }

        $result = $this->sendCommand($command);
        $message = new Message($result["result"]);
        return $message;
    }

    public function forwardMessage($toChatId, $fromChatId, $messageId)
    {
        $command = new Command("forwardMessage", array(
            'chat_id' => $toChatId,
            'from_chat_id' => $fromChatId,
            'message_id' => $messageId,
        ));

        $result = $this->sendCommand($command);
        $message = new Message($result["result"]);
        return $message;
    }

    /*
    public function sendPhoto($chatId, $photo, $caption = NULL, $replyToMessageId = NULL, $replyMarkup = NULL)
    {
        $command = new Command("sendPhoto", array(
            'chat_id' => $chatId,
            'from_chat_id' => $fromChatId,
            'message_id' => $messageId,
        ));

        $result = $this->sendCommand($command);
        $message = new Message($result["result"]);
        return $message;
    }
    */

    //public function sendAudio();
    //public function sendDocument();
    //public function sendSticker();
    //public function sendVideo();

    public function sendLocation($chatId, $latitude, $longitude, $replyToMessageId = NULL, $replyMarkup = NULL)
    {
        $command = new Command("sendLocation", array(
            'chat_id' => $chatId,
            'latitude' => $latitude,
            'longitude' => $longitude,
        ));

        ($replyToMessageId !== NULL) && $command->setArgument("reply_to_message_id", $replyToMessageId);

        if ($replyMarkup instanceof ReplyKeyboardMarkup || $replyMarkup instanceof ReplyKeyboardHide || $replyMarkup instanceof ForceReply) {
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
        ($limit !== NULL) && $command->setArgument("$limit", $limit);

        $result = $this->sendCommand($command);
        $message = new UserProfilePhotos($result["result"]);
        return $message;
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
        $message = $update->getMessage();
        if ($message instanceof Message) {
            $text = $message->getText();

            //handle Text or Command
            if (is_string($text) && strlen($text) > 0) {
                if ($this instanceof CommandBotInterface && $text[0] == '/') {
                    self::logBot("Command \"".$text."\" send");
                    $this->handleCommand($message);
                } elseif ($this instanceof TextBotInterface) {
                    self::logBot("Message \"".$text."\" send");
                    $this->handleMessageText($message);
                }
            }

            //handle others
            if ($this instanceof ForwardMessageBotInterface && $message->getForwardFrom() instanceof User) {
                $this->handleForwardMessage($message);
            }
            if ($this instanceof ReplyMessageBot && $message->getReplyToMessage() instanceof Message) {
                $this->handleReplyMessage($message);
            }
        }
    }

    private function logBot($message)
    {
        if (is_string($message))
        {
            $logValue = "<".$this->getUsername().">: ".$message;
            self::log($logValue);
        }
    }

    public static function log($message)
    {
        if (is_string($message))
        {
            $time = new \DateTime();
            $logValue = "[".$time->format("Y-m-d H:i:s.u")."]".$message;
            file_put_contents("telegramBot.log", $logValue.PHP_EOL, FILE_APPEND);
        }
    }
}