<?php

namespace App\Core;

class Auth
{
    public static function check()
    {
        if (!isset($_SESSION['student'])) {
            header('Location: /login');
            exit;
        }
    }

    public static function user()
    {
        return $_SESSION['student'] ;
    }

    public static function logout()
    {
        session_destroy();
        header('Location: /login');
        exit;
    }
}
