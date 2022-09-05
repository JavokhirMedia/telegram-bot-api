<?php

namespace App\JavokhirMedia\Http;

use DateTime;

class app
{

    /**
     * @param $url
     * @param $curl
     * @param $parameters
     * @return bool|string
     */
    public static function curlAPI($url, $curl, $parameters)
    {
        curl_setopt_array(
            $curl,
            [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POSTFIELDS => $parameters,
            ]
        );
        return curl_exec($curl);
    }

    /**
     * @param $seconds
     * @return string
     */
    public function convert_seconds($seconds): string
    {
        $dt1 = new DateTime("@0");
        $dt2 = new DateTime("@$seconds");
        return $dt1->diff($dt2)->format('%i:%s');
    }

    /**
     * @param $size
     * @return string
     */
    public function sizeConvert($size): string
    {
        $size = round($size / 1024, 2);
        if ($size > 1024000) {
            $size = round($size / 1024000, 2) . ' GB';
        } elseif ($size > 1024) {
            $size = round($size / 1024, 2) . ' MB';
        } else {
            $size = $size . ' KB';
        }
        return $size;
    }

    /**
     * @param int $length
     * @return string
     */
    public function generate(int $length = 5): string
    {
        $characters = '0123456789#abcdefghilkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}