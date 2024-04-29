<?php

namespace Compo\Admin\Auth;

use DB;
use Exception;

class ResetPassword
{
    /**
     * Generates a unique reset token and stores it with its expiration time in the database.
     */
    public function requestReset($email)
    {
        $user = DB::queryFirstRow("SELECT id FROM users WHERE email=%s", $email);
        if (!$user) {
            FlashManager::setFlashMessage("No user found with that email address.", 'danger');
            header("Location: " . htmlspecialchars('../login/'));
            exit;
        }

        $token = bin2hex(random_bytes(16));
        $expires = time() + 3600;  // Token expires in 1 hour

        DB::update('users', [
            'reset_token' => $token,
            'token_expiration' => $expires
        ], "id=%d", $user['id']);

        return $token;
    }

    /**
     * Checks if the provided token is valid and not expired.
     */
    public function verifyToken($token)
    {
        $user = DB::queryFirstRow("SELECT id FROM users WHERE reset_token=%s AND token_expiration>%d", $token, time());
        if (!$user) {
            FlashManager::setFlashMessage("Invalid or expired reset token.", 'danger');
            header("Location: " . htmlspecialchars('../login/'));
            exit;
        }
        return $user['id'];
    }

    /**
     * Resets the password for the user with the given token.
     */
    public function resetPassword($userId, $newPassword)
    {
        $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
        DB::update('users', [
            'password_hash' => $newPasswordHash,
            'reset_token' => null,  // Clear the reset token
            'token_expiration' => null  // Clear the token expiration
        ], "id=%d", $userId);
    }


    public function handleRequestSend()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['email']) && (isset($_POST['submitEmail']))) {
            $userEmail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

            if (!$userEmail) {
                echo "Zadaný e-mail není platný. Zadejte prosím správnou e-mailovou adresu.";
                return;
            }

            $token = $this->requestReset($userEmail);
            if (!$token) {
                FlashManager::setFlashMessage("Error creating reset token.", 'danger');
                header("Location: " . htmlspecialchars('../login'));
                exit;
            }
            $emailSender = new EmailSender();
            $send = $emailSender->sendResetEmail($userEmail, $token);
            if ($send == true) {
                FlashManager::setFlashMessage("Reset instructions have been sent to your email.", 'success');
                header("Location: " . htmlspecialchars('../login'));
                exit;
            } else {
                FlashManager::setFlashMessage("Failed to send email." . $send, 'danger');
                header("Location: " . htmlspecialchars('../login'));
                exit;
            }
        }
    }

    public function handleResetRequest()
    {
        // Zkontroluj, zda byl odkaz otevřen s tokenem
        if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['token'])) {
            $token = $_GET['token'];
            $userId = $this->verifyToken($token);
            if (!$userId) {

                FlashManager::setFlashMessage("Invalid or expired reset token.", 'danger');
                header("Location: " . htmlspecialchars('../login/'));
                exit;
            }
            return $token;


        } 
        
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submitReset'])) {
            // Zpracuj změnu hesla
            $token = $_POST['token'];
            $newPassword = $_POST['newPassword'];
            $userId = $this->verifyToken($token);
            if (!$userId) {
                FlashManager::setFlashMessage("Invalid or expired reset token.", 'danger');
                header("Location: " . htmlspecialchars('../login/'));
                exit;
            }
            $this->resetPassword($userId, $newPassword);
            FlashManager::setFlashMessage("Your password has been reset successfully.", 'success');
            header("Location: " . htmlspecialchars('../login/'));
            exit;
        }
    }
}
