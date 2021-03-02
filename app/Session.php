<?php


namespace App;


class Session
{
    public static function get($key) {
        return $_SESSION[$key];
    }

    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function flash($key) {
        return $_SESSION['flash'][$key];
    }

    public static function setFlash($key, $value) {
        $_SESSION['flash'] = [
            "type" => $key,
            "content" => $value
        ];
    }

}