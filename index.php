<?php
ini_set("display_errors", 1);
error_reporting(E_ERROR | E_WARNING);
session_start();

require_once "config.php";
require_once 'vendor/autoload.php';

use Compo\Navigation\UrlManager;
use Compo\Rendering\Template;
use Compo\Rendering\PageRenderer;
use Compo\Registry;
use Compo\Admin\Auth\Auth;


// $urlManager = new UrlManager;
// echo $baseUrl = $urlManager->getUrl();


$folder_located_project = "cms/CMS-Compo";
$tamplate = "mizzle";
$language = "en";


// Oříznutí lomítek na začátku a na konci řetězce
$trimmed_folder_located_project = trim($folder_located_project, '/');
$config = new Registry();
$config->set("template",$tamplate);
if ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_ADDR'] == '127.0.0.1') {
    $config->set("path",$trimmed_folder_located_project);
}else{
    $config->set("path","");
}






$whatTemplate = new Template();
$template = $whatTemplate->TemplateName();


$pageRenderer = new PageRenderer($template);
$pageRenderer->setLanguage($language);  // Nastavit jazyk na češtinu
$pageRenderer->renderComponents();


//components - to jsou jména komponent které jdou vložit na různé stránky, komponenty to jsou html šablony pro kousky / části stránky
//pages - to je hlavní menu ale zároveň se tím vytvoří stránka na kterou jde vkládat mnoho komponentů a tím se seskládá obsah stránky
//page_components - zde se ukládá která komponenta patří k jaké stránce "pages"  a taky se určuje jaký text ke komponentě patří který je uložen "page_contents"  
//page_contents - zde je uložen veškerý obsah všech komponent - komponenty odsud mohou čerpat obsah