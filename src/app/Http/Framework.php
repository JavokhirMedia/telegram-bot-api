<?php

/**
 * @author Javokhir-Media
 * 04.09.2022
 * Class Framework
 */

namespace App\JavokhirMedia\Http;

use App\JavokhirMedia\Plugins;

/**
 * @Framework
 * @package App\JavokhirMedia
 */
class Framework
{

    /**
     * @var Plugins
     */
    public Plugins $plugins;

    public function __construct()
    {
        $this->plugins = new Plugins();
    }

    /**
     * @param $chat_id
     * @param $text
     * @param array $params
     * @param string $parse_mode
     * @return array
     */
    public function sendMessage
    (
        $chat_id,
        $text,
        array $params = [],
        string $parse_mode = "html"
    ): array
    {
        return $this->plugins->botAPI
        (
            $this->plugins->getMethod('text'),
            array_merge(
                [
                    'chat_id' => $chat_id,
                    'text' => $text,
                    'parse_mode' => $parse_mode
                ],
                $params
            )
        );
    }

    /**
     * @param $chat_id
     * @param $photo
     * @param $text
     * @param array $content
     * @param string $parse_mode
     * @return array
     */
    public function sendPhoto
    (
        $chat_id,
        $photo,
        $text = null,
        array $content = [],
        string $parse_mode = 'html'
    ): array
    {
        return $this->plugins->botAPI
        (
            $this->plugins->getMethod('photo'),
            array_merge
            (
                [
                    'chat_id' => $chat_id,
                    'photo' => $photo,
                    'text' => $text,
                    'parse_mode' => $parse_mode,
                ],
                $content
            )
        );
    }

    /**
     * @param $chat_id
     * @param $video
     * @param $text
     * @param array $content
     * @param string $parse_mode
     * @return array
     */
    public function sendVideo
    (
        $chat_id,
        $video,
        $text = null,
        array $content = [],
        string $parse_mode = 'html'
    ): array
    {
        return $this->plugins->botAPI
        (
            $this->plugins->getMethod('video'),
            array_merge
            (
                [
                    'chat_id' => $chat_id,
                    'video' => $video,
                    'text' => $text,
                    'parse_mode' => $parse_mode,
                ],
                $content
            )
        );
    }

    /**
     * @param $chat_id
     * @param $audio
     * @param $caption
     * @param array $content
     * @param string $parse_mode
     * @return array
     */
    public function sendAudio
    (
        $chat_id,
        $audio,
        $caption = null,
        array $content = [],
        string $parse_mode = "html"
    ): array
    {
        return $this->plugins->botAPI
        (
            $this->plugins->getMethod('audio'),
            array_merge
            (
                [
                    'chat_id' => $chat_id,
                    'audio' => $audio,
                    'caption' => $caption,
                    'parse_mode' => $parse_mode
                ],
                $content
            )
        );
    }

    /**
     * @param $chat_id
     * @param $document
     * @param $caption
     * @param array $content
     * @param string $parse_mode
     * @return array
     */
    public function sendDocument
    (
        $chat_id,
        $document,
        $caption = null,
        array $content = [],
        string $parse_mode = "html"
    ): array
    {
        return $this->plugins->botAPI
        (
            $this->plugins->getMethod('document'),
            array_merge
            (
                [
                    'chat_id' => $chat_id,
                    'document' => $document,
                    'caption' => $caption,
                    'parse_mode' => $parse_mode
                ],
                $content
            )
        );
    }

    /**
     * @param $chat_id
     * @param $action
     * @return array
     */
    public function sendChatAction
    (
        $chat_id,
        $action
    ): array
    {
        return $this->plugins->botAPI
        (
            $this->plugins->getMethod('action'),
            [
                'chat_id' => $chat_id,
                'action' => $action
            ]
        );
    }

    /**
     * @param $chat_id
     * @param $phone_number
     * @param $first_name
     * @param array $content
     * @return array
     */
    public function sendContact
    (
        $chat_id,
        $phone_number,
        $first_name,
        array $content = []
    ): array
    {
        return $this->plugins->botAPI
        (
            $this->plugins->getMethod('contact'),
            array_merge
            (
                [
                    'chat_id' => $chat_id,
                    'phone_number' => $phone_number,
                    'first_name' => $first_name,
                ],
                $content
            )
        );
    }

    /**
     * @param $chat_id
     * @param array $content
     * @return array
     */
    public function sendMediaGroup
    (
        $chat_id,
        array $content = []
    ): array
    {
        return $this->plugins->botAPI
        (
            $this->plugins->getMethod('mediaGroup'),
            array_merge
            (
                [
                    'chat_id' => $chat_id,
                ],
                $content
            ),
        );
    }

    /**
     * @param $chat_id
     * @param $latitude
     * @param $longitude
     * @param array $content
     * @return array
     */
    public function sendLocation
    (
        $chat_id,
        $latitude,
        $longitude,
        array $content = []
    ): array
    {
        return $this->plugins->botAPI
        (
            $this->plugins->getMethod('location'),
            array_merge
            (
                [
                    'chat_id' => $chat_id,
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                ],
                $content
            ),
        );
    }

    /**
     * @param $chat_id
     * @param $message_id
     * @param $text
     * @param array $content
     * @param string $parse_mode
     * @return array
     */
    public function editMessageText
    (
        $chat_id,
        $message_id,
        $text,
        array $content = [],
        string $parse_mode = 'html'
    ): array
    {
        return $this->plugins->botAPI
        (
            $this->plugins->getMethod('editText'),
            array_merge
            (
                [
                    'chat_id' => $chat_id,
                    'message_id' => $message_id,
                    'text' => $text,
                    'parse_mode' => $parse_mode
                ],
                $content,
            )
        );
    }

    /**
     * @param $chat_id
     * @param $message_id
     * @param $caption
     * @param array $content
     * @param string $parse_mode
     * @return array
     */
    public function editMessageCaption
    (
        $chat_id,
        $message_id,
        $caption,
        array $content = [],
        string $parse_mode = 'html'
    ): array
    {
        return $this->plugins->botAPI
        (
            $this->plugins->getMethod('editCaption'),
            array_merge
            (
                [
                    'chat_id' => $chat_id,
                    'message_id' => $message_id,
                    'caption' => $caption,
                    'parse_mode' => $parse_mode
                ],
                $content,
            )
        );
    }

    /**
     * @param $chat_id
     * @param $message_id
     * @param $media
     * @param $reply_markup
     * @param $inline_message_id
     * @return array
     */
    public function editMessageMedia
    (
        $chat_id,
        $message_id,
        $media,
        $reply_markup = null,
        $inline_message_id = null
    ): array
    {
        return $this->plugins->botAPI
        (
            $this->plugins->getMethod('editMedia'),
            [
                'chat_id' => $chat_id,
                'message_id' => $message_id,
                'media' => $media,
                'reply_markup' => $reply_markup,
                'inline_message_id' => $inline_message_id,
            ],
        );
    }

    /**
     * @param $chat_id
     * @param $from_chat_id
     * @param $message_id
     * @param $protect_content
     * @param $disable_notification
     * @return array
     */
    public function forwardMessage
    (
        $chat_id,
        $from_chat_id,
        $message_id,
        $protect_content = null,
        $disable_notification = null
    ): array
    {
        return $this->plugins->botAPI
        (
            $this->plugins->getMethod('forward'),
            [
                'chat_id' => $chat_id,
                'from_chat_id' => $from_chat_id,
                'message_id' => $message_id,
                'protect_content' => $protect_content,
                'disable_notification' => $disable_notification,
            ],
        );
    }

    /**
     * @param $chat_id
     * @param $from_chat_id
     * @param $message_id
     * @param array $content
     * @return array
     */
    public function copyMessage
    (
        $chat_id,
        $from_chat_id,
        $message_id,
        array $content = []
    ): array
    {
        return $this->plugins->botAPI
        (
            $this->plugins->getMethod('copy'),
            array_merge
            (
                [
                    'chat_id' => $chat_id,
                    'from_chat_id' => $from_chat_id,
                    'message_id' => $message_id,
                ],
                $content
            ),
        );
    }

    /**
     * @param $chat_id
     * @param $user_id
     * @return array
     */
    public function getChatMember
    (
        $chat_id,
        $user_id
    ): array
    {
        return $this->plugins->botAPI
        (
            $this->plugins->getMethod('member'),
            [
                'chat_id' => $chat_id,
                'user_id' => $user_id,
            ],
        );
    }

}