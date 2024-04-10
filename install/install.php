<?php

?>
<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CMS">
    <link href="../iconpro/css/all.css" rel="stylesheet">
    <link id="theme-style" rel="stylesheet" href="../admin/assets/css/portal.css">

    <title>Easy CMS</title>
</head>

<body class="app">
    <h2 class="auth-heading text-center mb-5">Install CMS</h2>
    <div class="col-4 container">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <form action="root.php" method="post" class="form-signup">

                    <div class="mb-3">
                        <label for="setting-input-1" class="form-label">Přihlašovací údaje k databázi:</label>
                    </div>
                    <div class="mb-3">
                        <label>Server name:</label>
                        <input type="text" name="db_server_name" class="form-control" placeholder="server name" value="127.0.0.1">
                    </div>

                    <div class="mb-3">
                        <label>User name:</label>
                        <input type="text" name="db_user_name" class="form-control" placeholder="user name" value="dobrodruzi.cz">
                    </div>

                    <div class="mb-3">
                        <label>Database password:</label>
                        <input type="password" name="db_pass" class="form-control" placeholder="password" value="e4gXbzJ7qmtM">
                    </div>

                    <div class="mb-3">
                        <label>Database name:</label>
                        <input type="text" name="db_name" class="form-control" placeholder="database name" value="dobrodruzicz1">
                    </div>


                    <div class="section-intro">Vytvořením účtu přijímáte <a href="#">Podmínky použití.</a></div><br>
                    <button type="submit" name="submit" class="btn app-btn-primary">Instalovat systém</button>

                </form>
            </div>
        </div>
    </div>


    <footer class="app-footer">
        <div class="container text-center py-3">
            <small class="copyright">Redakční systém Konstrakt</small>

        </div>
    </footer>

</body>

</html>