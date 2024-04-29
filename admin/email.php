<?php
// require_once '../db.meekro.php';
// require_once '../config.php';
// require_once '../vendor/autoload.php';
session_start();

use Compo\Admin\Auth\ResetPassword;
use Compo\Admin\Auth\EmailSender;

$reset = new ResetPassword();
$reset->handleRequestSend();

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
    <script defer src="<?php echo $this->url ?>/admin/assets/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="<?php echo $this->url ?>/admin/assets/css/portal.css">

</head>

<body class="app app-login p-0">
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Reset password</h1>
                            <p class="lead">
                                Enter your email
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-3">
                                    <form method="post" class="auth-form login-forms" action="../email/">
                                        <div class="password mb-3">
                                            <label class="sr-only" for="email">Email:</label>
                                            <input type="email" class="form-control signin-password" id="email" name="email" required>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto" name="submitEmail">Poslat instrukce na email</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>