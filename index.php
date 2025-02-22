<?php
session_start();
ini_set("display_errors", 1);
error_reporting(E_ERROR | E_WARNING);


require_once "config.php";
require_once 'vendor/autoload.php';

use Compo\Navigation\UrlManager;
use Compo\Rendering\Template;
use Compo\Rendering\PageRenderer;
use Compo\Registry;
use Compo\Admin\Auth\Auth;
use Compo\Rendering\AdminRenderer;


//localhost
$folder_located_project = "";
if ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_ADDR'] == '127.0.0.1') {
    $folder_located_project = "cms/CMS-Compo";
}

//tamplate
$tamplate = "mizzle";
$registry = new Registry();
$registry->set("template", $tamplate);


// Oříznutí lomítek na začátku a na konci řetězce
$trimmed_folder_located_project = trim($folder_located_project, '/');

if ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_ADDR'] == '127.0.0.1') {
    $registry->set("path", "/" . $trimmed_folder_located_project);
} else {
    $registry->set("path", "");
}



// IRL Manager
$urlManager = new UrlManager();
$urls = $urlManager->getSegment(0);
$urlss = $urlManager->getSegment(1);
$urlsss = $urlManager->getSegment(2);
$back = $urlManager->getBackPage();



//Language
if (isset($_SESSION['language'])) {
    $language = $_SESSION['language'];
} else {
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    $supported_langs = ['cs', 'en', 'es', 'gn', 'de'];
    $language = in_array($lang, $supported_langs) ? $lang : 'cs';
    $_SESSION['language'] = $language; // Uložit do session
}



//Url rozcestník 
if ($urls == "tool") {
    $_SESSION['tool'] = $urlss;
    $edit = true;
    header("Location: " . htmlspecialchars($back));
} else if ($urls == "language") {
    $_SESSION['language'] = $urlss;  // Uložení jazyka do session
    header("Location: " . htmlspecialchars($back));
    exit;
} else if ($urls == "admin") {
    $adminRenderer = new AdminRenderer();
    $adminRenderer->renderComponents();
} else {
    $whatTemplate = new Template();
    $template = $whatTemplate->TemplateName();

    $pageRenderer = new PageRenderer($template);
    $pageRenderer->setLanguage($language);  // Nastavit jazyk na češtinu
    $pageRenderer->renderComponents();
}




// components - to jsou jména komponent které jdou vložit na různé stránky, komponenty to jsou html šablony pro kousky / části stránky
// pages - to je hlavní menu ale zároveň se tím vytvoří stránka na kterou jde vkládat mnoho komponentů a tím se seskládá obsah stránky
// page_components - zde se ukládá která komponenta patří k jaké stránce "pages"  a taky se určuje jaký text ke komponentě patří který je uložen "page_contents"  
// page_contents - zde je uložen veškerý obsah všech komponent - komponenty odsud mohou čerpat obsah