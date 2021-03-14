<?php
namespace App;


class Response
{
    const VIEW_403 = '../views/errors/403.php';

    public static function launch403() {
        header('HTTP/1.0 403 Forbidden');
        require self::VIEW_403;
        exit;
    }

    public static function view(string $view) {
        require $view;
    }

    public static function redirect(string $url) {
        header('Location: '.$url);
        return;
    }
}