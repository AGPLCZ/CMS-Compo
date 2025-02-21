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

    public static function showFlashMessage(): string
    {
        if (isset($_SESSION['flash_message'])) {
            $message = '<div class="alert">' . $_SESSION['flash_message'] . '</div>';
            unset($_SESSION['flash_message']);
            return $message;
        }
        return ''; // Pokud není žádná zpráva, vrátíme prázdný řetězec
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
