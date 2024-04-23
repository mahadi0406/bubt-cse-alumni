<?php

use App\Enums\MsgType;
use App\Models\User;
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


