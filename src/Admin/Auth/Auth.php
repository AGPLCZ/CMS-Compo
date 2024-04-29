<?php

namespace Compo\Admin\Auth;

use DB;

class Auth
{
    public function __construct()
    {
        $this->initSession();
    }

    /**
     * Starts a session if it has not already been started.
     */
    private function initSession()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    /**
     * Checks if the user is logged in.
     */
    public function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }

    /**
     * Attempt to log in with a username/email and password.
     */
    public function login($identifier, $password)
    {
        // Ověření, zda identifikátor obsahuje znaky typické pro e-mail
        if (filter_var($identifier, FILTER_VALIDATE_EMAIL)) {
            // Přihlášení pomocí e-mailu
            $user = DB::queryFirstRow("SELECT id, password_hash FROM users WHERE email=%s", $identifier);
        } else {
            // Přihlášení pomocí uživatelského jména
            $user = DB::queryFirstRow("SELECT id, password_hash FROM users WHERE username=%s", $identifier);
        }

        // Ověření hesla
        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['user_id'] = $user['id'];
            session_regenerate_id(); // Change session ID after login for security
            return true;
        }

        return false;
    }

    public function handleLogin()
    {

        // Zpracování přihlašovacího požadavku
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($this->login($username, $password)) {
                $this->redirect('index/');
            } else {
                FlashManager::setFlashMessage("Neplatné uživatelské jméno nebo heslo.", 'danger');
                $this->redirect('login/');
            }
        }
    }

    /**
     * Logs out the current user and clears the session.
     */
    public function logout()
    {
        session_unset();
        session_destroy();
    }

    /**
     * Redirects to a specific page.
     */
    public function redirect($url)
    {
        header("Location: $url");
        exit;
    }
}
