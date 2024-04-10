<?php


function kontrolaInputu($userLogin, $userPass, $userPassRe, $userEmail, $jmenoSouboru)
{

    // KONTROLA ZADÁVÁNÍ    

    // není-li prázdné pole
    if (empty($userLogin) || empty($userPass) || empty($userEmail)) {
        header("Location: " . $jmenoSouboru . ".php?error=prazdne&userLogin=" . $userLogin . '&userEmail=' . $userEmail);
        exit();
    }

    // pouze písmena a čísla
    if (!preg_match("/^[a-zA-Z0-9]*$/", $userLogin)) {
        header("Location: " . $jmenoSouboru . ".php?error=invalidLogin&userEmail=" . $userEmail);
        exit();
    }
    //  kontrola emailu
    if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        header("Location: " . $jmenoSouboru . ".php?error=invalidEmail&userLogin=" . $userLogin . '&userEmail=' . $userEmail);
        exit();
    }

    // shoda hesla
    if ($userPass !== $userPassRe) {
        header("Location: " . $jmenoSouboru . ".php?error=neshodneHeslo&userLogin=" . $userLogin . '&userEmail=' . $userEmail);
        exit();
    }
}

//kontrolaInputu($userLogin, $userPass, $userPassRe, $userEmail, 'userZapis');





function getHlaska()
{
    if (isset($_GET["error"])) {

        // Hláška z GET- existující účet
        if ($_GET["error"] == "existujiciUcet") {
            echo '<p class="signuperror">Uživatelské jméno již existuje</p>';
        }


        // Hláška z GET- neshodující se heslo
        if ($_GET["error"] == "neshodneHeslo") {
            echo '<p class="signuperror">Heslo se neshoduje</p>';
        }

        // Hláška z GET- špatný email
        if ($_GET["error"] == "invalidEmail") {
            echo '<p class="signuperror">Neplatná forma emailu</p>';
        }


        // Hláška z GET- neplatné uživatelské jméno
        if ($_GET["error"] == "invalidLogin") {
            echo '<p class="signuperror">Uživatelské jméno obsahovalo zakázané znaky</p>';
        }


        // Hláška z GET- Nevyplněné pole 
        if ($_GET["error"] == "prazdne") {
            echo '<p class="signuperror">Nevyplněné pole</p>';
        }
    }

    // GET ODESLÁNO
    if (isset($_GET["odeslano"])) {

        // Hláška z GET - účet vytvořen
        if ($_GET["odeslano"] == "zapsano") {
            echo '<p class="signupsuccess">Účet byl vytvořen</p>';
        }
    }
}






function baseUrl()
{
    return basename($_SERVER['PHP_SELF'], '.php');
}


function url($index)
{
    // ***URI - URL PATH*** 
    // Odstranění počátečního a koncového lomítka z URI
    $urlPath = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

    // Rozdělení cesty na segmenty
    $urlSegments = explode('/', $urlPath);

    return isset($urlSegments[$index]) ? $urlSegments[$index] : '';

    //$urls = url(0); 
}


function parseUrlSegments()
{
    // Odstranění počátečního a koncového lomítka z URI a rozdělení cesty na segmenty
    $urlPath = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $urlSegments = explode('/', $urlPath);

    // Vrátí pole segmentů URL
    return $urlSegments;
    
    //$x = parseUrlSegments();
    //var_dump($x);
}

function getUrlSegment($index)
{
    $segments = parseUrlSegments();
    // Získání segmentu URL na zadaném indexu, pokud existuje
    if (isset($segments[$index])) {
        return $segments[$index];
    }
    return '';

    //$urls = getUrlSegment(0);
}





function getScriptNameWithoutExtension() {
    // Získání názvu aktuálně spuštěného skriptu bez přípony '.php'
    $scriptName = basename($_SERVER['PHP_SELF'], '.php');
    return $scriptName;
}

/** Odkud uživatel přišel */
function get_back_page()
{
    return $_SERVER["HTTP_REFERER"];
}


// -------------------------Nepotřebné


/** Absolutní cesta 
* Vrátí absolutní cestu k určitému souboru nebo složce v rámci aplikace.
*
* @param string $relativePath Relativní cesta k souboru nebo složce od kořenového adresáře aplikace.
* @param bool $useNewPath Pokud je true, použije se dirname z APP_PATH_NEW pro výpočet cesty. V opačném případě se použije APP_PATH.
* @return string Absolutní cesta k požadovanému souboru/složce.
*/

define('APP_PATH', realpath(__DIR__ . '/../'));
// Změna zde: Uložení celého výsledku pathinfo do APP_PATH_NEW
define('APP_PATH_NEW', pathinfo(__DIR__));

function getAbsolutePath($relativePath, $useNewPath = false) {
    $basePath = $useNewPath ? APP_PATH_NEW['dirname'] : APP_PATH;
    $absolutePath = $basePath . '/' . trim($relativePath, '/');
    return $absolutePath;
}

// Pokud chcete použít APP_PATH_NEW
//$fileAbsolutePathNew = getAbsolutePath('index.php', true);
//echo $fileAbsolutePathNew;

//*** end Absolutní cesta */



/**
 * Vytvoří bezpečný, plně kvalifikovaný URL odkaz na zdroj v aplikaci.
 *
 * @param string $path Relativní nebo absolutní cesta k zdroji.
 * @param string $baseUrl Základní URL vaší aplikace.
 * @return string Bezpečný, plně kvalifikovaný URL odkaz.
 */
function createSafeUrl($path, $baseUrl = 'https://dobrodruzi.cz/') {
    // Normalizace cesty: odstranění počátečních a koncových lomítek a sanitizace
    $sanitizedPath = filter_var(trim($path, '/'), FILTER_SANITIZE_URL);

    // Kontrola, zda cesta již není absolutní URL
    if (filter_var($sanitizedPath, FILTER_VALIDATE_URL)) {
        return $sanitizedPath;
    }

    // Sestavení bezpečného, plně kvalifikovaného URL
    $safeUrl = rtrim($baseUrl, '/') . '/' . $sanitizedPath;

    return $safeUrl;

// Použití funkce
//$relativePath = 'user/profile';
//$absoluteUrl = createSafeUrl($relativePath);
//echo $absoluteUrl; // Výstup: https://example.com/user/profile

//$absolutePath = 'https://secure.example.com/dashboard';
//$absoluteUrl = createSafeUrl($absolutePath);
//echo $absoluteUrl; // Výstup: https://secure.example.com/dashboard
}







