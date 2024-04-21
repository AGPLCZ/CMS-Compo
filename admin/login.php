<?php

require_once '../db.meekro.php';
require_once '../config.php';
require_once '../vendor/autoload.php';
//session_start();
use Compo\Admin\Auth\Auth;
use Compo\Admin\Auth\FlashManager;




if (Auth::isLoggedIn()){
    Auth::redirect('index.php'); // Upravte cestu podle potřeby
}

// Zpracování přihlašovacího požadavku
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    if (Auth::login($username, $password)) {
       Auth::redirect('index.php'); // Přesměrování na hlavní stránku
    } else {
        FlashManager::setFlashMessage("Neplatné uživatelské jméno nebo heslo.", 'error');
    }
}

?>


<!DOCTYPE html>
<html lang="cs">

<head>
    <title>Admin Dashboard</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

</head>

<body class="app app-login p-0">
    <div class="row g-0 app-auth-wrapper">
        <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <div class="app-auth-branding mb-4"><a class="app-logo" href="login.php"><img class="logo-icon me-2" src="assets/images/app-logo.svg" alt="logo"></a></div>
                    <h2 class="auth-heading text-center mb-5">Sign in to your editorial system</h2>
                    <div class="auth-form-container text-start">
                        <form class="auth-form login-form" action="login.php" method="post">
                            <div class="email mb-3">
                                <label class="sr-only" for="username">Username</label>
                                <input id="username" name="username" type="text" class="form-control signin-email" placeholder="User name" required="required">

                            </div><!--//form-group-->
                            <div class="password mb-3">
                                <label class="sr-only" for="signin-password">Password</label>
                                <input id="signin-password" name="password" type="password" class="form-control signin-password" placeholder="Password" required="required">
                                <div class="extra mt-3 row justify-content-between">
                                    <div class="col-6">
                                        
                                    </div><!--//col-6-->
                                    <div class="col-6">
                                        <div class="forgot-password text-end">
                                            <a href="reset-password.html">Forgot password?</a>
                                        </div>
                                    </div><!--//col-6-->
                                </div><!--//extra-->
                            </div><!--//form-group-->
                            <div class="text-center">
                                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Log In</button>
                            </div>
                        </form>

                    </div><!--//auth-form-container-->

                </div><!--//auth-body-->


            </div><!--//flex-column-->
        </div><!--//auth-main-col-->
        <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
            <div class="auth-background-holder">
            </div>
            <div class="auth-background-mask"></div>
            <div class="auth-background-overlay p-3 p-lg-5">
                <div class="d-flex flex-column align-content-end h-100">
                    <div class="h-100"></div>
                    <?php if (FlashManager::issetFlashMessage()):?> 
                     <div class="overlay-content p-3 p-lg-1 rounded">
                       
                         <?= FlashManager::showFlashMessage(); ?>
                    </div>
                    <?php endif ?>
                </div>
            </div><!--//auth-background-overlay-->
        </div><!--//auth-background-col-->

    </div><!--//row-->


</body>

</html>