<?php

namespace Compo\Admin\Auth;

class FlashManager
{
    public static function setFlashMessage($message, $type = 'success')
    {
        $_SESSION['flash_messages'] = [
            'message' => $message,
            'type' => $type
        ];
    }

    public static function showFlashMessage()
    {
        if (isset($_SESSION['flash_messages'])) {
            $message = $_SESSION['flash_messages']['message'];
            $type = $_SESSION['flash_messages']['type'];

            echo "<div class='alert alert-{$type}'>{$message}</div>";

            unset($_SESSION['flash_messages']);
        }
    }


    public static function issetFlashMessage()
    {
        if (isset($_SESSION['flash_messages'])) {
            return true;
        }
    }


    public static function clearSession()
    {
        session_unset();
        session_destroy();
    }
}
