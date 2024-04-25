<?php
require_once '../db.meekro.php';
require_once '../config.php';
require_once '../vendor/autoload.php';
session_start();
use Compo\Admin\Auth\Auth;
use Compo\Admin\Auth\FlashManager;
 

$auth = new Auth();

if ($auth->isLoggedIn()) {
    $auth->redirect('index.php');
}
$auth->handleLogin();

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
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

                    <?php if (FlashManager::issetFlashMessage()):?> 
                     <div class="overlay-content p-3 p-lg-1 rounded">
                         <?= FlashManager::showFlashMessage(); ?>
                    </div>
                    <?php endif ?>

						<div class="text-center mt-4">
							<h1 class="h2">Admin Tools</h1>
							<p class="lead">
								Sign in to your account to continue
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-3">
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
                                            <a href="email.php">Forgot password?</a>
                                        </div>
                                    </div><!--//col-6-->
                                </div><!--//extra-->
                            </div><!--//form-group-->
                            <div class="text-center">
                                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Log In</button>
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