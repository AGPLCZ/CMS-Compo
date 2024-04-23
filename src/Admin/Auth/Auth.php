<?php

namespace Compo\Admin\Auth;

use DB;

class Auth
{
    public function __construct() {
        $this->initSession();
    }

    /**
     * Starts a session if it has not already been started.
     */
    private function initSession() {
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
     * Attempt to log in with a username and password.
     */
    public function login($username, $password)
    {
        $user = DB::queryFirstRow("SELECT id, password_hash FROM users WHERE username=%s", $username);
        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['user_id'] = $user['id'];
            session_regenerate_id();  // Change session ID after login
            return true;
        }
        return false;
    }

    /**
     * Logs out the current user and clears the session.
     */
    public function logout() {
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
