<?php


namespace Managers;


class SessionFlash
{
    public static function sessionFlash(string $type, string $content)
    {
        $_SESSION['flash'] = [
            "type" => $type,
            "content" => $content
        ];
    }
}