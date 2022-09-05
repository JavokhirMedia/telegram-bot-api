<?php

/**
 * @author Javokhir-Media
 * 04.09.2022
 * Class Plugins
 */

namespace App\JavokhirMedia;

use App\JavokhirMedia\Http\app;

/**
 * @Plugins
 * @package App\JavokhirMedia
 */
class Plugins
{

    public string $token;
    public $curl;


    public function __construct()
    {
        $this->token = getenv('BOT_TOKEN');
        $this->curl = curl_init();
    }

    /**
     * @param $method
     * @return string
     */
    public function getMethod($method): string
    {

        return [

            'text' => 'sendMessage',
            'photo' => 'sendPhoto',
            'video' => 'sendVideo',
            'audio' => 'sendAudio',
            'document' => 'sendDocument',
            'contact' => 'sendContact',
            'action' => 'sendChatAction',
            'animation' => 'sendAnimation',
            'voice' => 'sendVoice',
            'videoNote' => 'sendVideoNote',
            'mediaGroup' => "sendMediaGroup",
            'location' => 'sendLocation',
            'venue' => 'sendVenue',
            'poll' => 'sendPoll',
            'dice' => 'sendDice',

            'editText' => 'editMessageText',
            'editCaption' => 'editMessageCaption',
            'editMedia' => 'editMessageMedia',
            'editReplyMarkup' => 'editMessageReplyMarkup',

            'profilePhoto' => 'getUserProfilePhoto',
            'file' => 'getFile',

            'forward' => 'forwardMessage',
            'copy' => 'copyMessage',

            'editLiveLocation' => 'editMessageLiveLocation',
            'stopLiveLocation' => 'stopMessageLiveLocation',

            'banMember' => 'banChatMember',
            'unbanMember' => 'unbanChatMember',

            'exportInviteLink' => 'exportChatInviteLink',
            'createInviteLink' => 'createChatInviteLink',
            'editInviteLink' => 'editChatInviteLink',
            'revokeInviteLink' => 'revokeChatInviteLink',

            'setPhoto' => 'setChatPhoto',

            'deleteMessage' => 'deleteMessage',
            'deletePhoto' => 'deleteChatPhoto',

            'chat' => 'getChat',
            'administrators' => 'getChatAdministrators',
            'memberCount' => 'getChatMemberCount',
            'member' => 'getChatMember',

        ]
        [$method];

    }

    /**
     * @param $method
     * @param array $parameters
     * @return array
     */
    public function botAPI($method, array $parameters = []): array
    {
        $url = getenv('RESPONSE_URL') . $this->token . "/" . $method;
        $response = app::curlAPI($url, $this->curl, $parameters);

        if (curl_error($this->curl))
            return json_decode(json_encode($this->curl, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        return json_decode($this->curl);
    }

    /**
     * @param $content
     * @return false|string
     */
    public static function buildKeyboard($content)
    {
        return json_encode($content);
    }

    /**
     * @param array $data
     * @param bool $resize
     * @return false|string
     */
    public static function buildResizeKeyboardCustom(array $data = [], bool $resize = true)
    {
        return self::buildKeyboard(
            [
                'resize_keyboard' => $resize,
                'keyboard' => $data
            ]
        );
    }

    /**
     * @param array $data
     * @param bool $resize
     * @return false|string
     */
    public static function buildResizeKeyboard(array $data = [], bool $resize = true)
    {
        $new_keyboard = [];
        $i = 0;
        foreach ($data as $row) {
            foreach ($row as $button) {
                $new_keyboard[$i][] = ['text' => $button];
            }
            $i++;
        }

        return self::buildKeyboard(
            [
                'resize_keyboard' => $resize,
                'keyboard' => $new_keyboard
            ]
        );
    }

    /**
     * @param array $data
     * @return false|string
     */
    public static function buildInlineKeyboard(array $data = [])
    {
        $new_keyboard = [];
        $i = 0;
        foreach ($data as $row) {
            foreach ($row as $button) {
                $new_keyboard[$i][] = ['text' => $button[0], 'callback_data' => $button[1]];
            }
            $i++;
        }

        return self::buildKeyboard([
            'inline_keyboard' => $new_keyboard
        ]);
    }

    /**
     * @param array $data
     * @return false|string
     */
    public static function buildInlineKeyboardCustom(array $data = [])
    {
        return self::buildKeyboard([
            'inline_keyboard' => $data
        ]);
    }

}