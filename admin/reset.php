<?php
require_once '../db.meekro.php';
require_once '../config.php';
require_once '../vendor/autoload.php';
session_start();

use Compo\Admin\Auth\ResetPassword;


$reset = new ResetPassword();
$result = $reset->handleResetRequest();

if ($result['status'] === 'show_form' && isset($result['token'])) {
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
                        <h2 class="auth-heading text-center mb-5">Reset password</h2>
                        <div class="auth-form-container text-start">

                            <form method="post" class="auth-form login-forms" action="reset.php">

                                <div class="password mb-3">
                                    <input type="hidden" name="token" value="<?php echo htmlspecialchars($result['token']); ?>">
                                    <label for="newPassword">New Password:</label>
                                    <input type="password" class="form-control signin-password" id="newPassword" name="newPassword" required>

                                </div>
                                <div class="text-center">
                                    <button type="submit"class="btn app-btn-primary w-100 theme-btn mx-auto" name="submitReset">Reset Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
                <div class="auth-background-holder">
                </div>
                <div class="auth-background-mask"></div>
                <div class="auth-background-overlay p-3 p-lg-5">

                </div>
            </div>
        </div>
    </body>

    </html>


<?php
}
?>