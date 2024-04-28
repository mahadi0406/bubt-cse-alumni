<?php

use App\Enums\MsgType;
use Illuminate\Contracts\Auth\Authenticatable;

if (! function_exists('msg')) {
    function msg(string $msg, MsgType $type = MsgType::success): array
    {
        return [
            'msg' => $msg,
            'type' => $type
        ];
    }
}


if (!function_exists('auth_user')) {
    /**
     * Get the currently authenticated users
     * @return Authenticatable
     */
    function auth_user(): Authenticatable
    {
        return auth()->user();
    }
}

if (! function_exists('image_url')) {
    function image_url(?string $path, $noCache = false): string
    {
        if (is_null($path)) return '';

        if (filter_var($path, FILTER_VALIDATE_URL)) {
            return $path;
        }

        $url = url($path);

        if ($noCache) {
            $url .= '?'.time();
        }

        return $url;
    }
}



if (!function_exists('replaceInputTitle')) {
    /**
     * @param $text
     * @return string
     */
    function replaceInputTitle($text): string
    {
        return ucwords(preg_replace("/[^A-Za-z0-9 ]/", ' ', $text));
    }
}


if (!function_exists('showDateTime')) {
    /**
     * @param string|null $date
     * @param string $format
     * @return string
     */
    function showDateTime(string $date = null, string $format = 'Y-m-d h:i A'): string
    {
        return \Carbon\Carbon::parse($date)->format($format);
    }
}



if (!function_exists('shortAmount')) {
    /**
     * @param float|int|string|null $amount
     * @return string|bool
     */
    function shortAmount(float|int|string|null $amount): string|bool
    {
        return round($amount,2);
    }
}
