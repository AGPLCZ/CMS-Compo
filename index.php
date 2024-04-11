<?php
//session_start();
ini_set("display_errors", 1);
error_reporting(E_ERROR | E_WARNING);
require_once 'db.meekro.php'; 
require_once "config.php";
require_once 'vendor/autoload.php';

use Compo\Rendering\Template;
use Compo\Rendering\PageRenderer;
use Compo\Registry;


$config = new Registry();
$config->set("path","CMS/CMS-Compo");
$config->set("template","green");

$userDatabaseId = "";

$whatTemplate = new Template();
$template = $whatTemplate->TemplateName();


$pageRenderer = new PageRenderer($template);
$pageRenderer->renderComponents();

//components - to jsou jména komponent které jdou vložit na různé stránky, komponenty to jsou html šablony pro kousky / části stránky
//pages - to je hlavní menu ale zároveň se tím vytvoří stránka na kterou jde vkládat mnoho komponentů a tím se seskládá obsah stránky
//page_components - zde se ukládá která komponenta patří k jaké stránce "pages"  a taky se určuje jaký text ke komponentě patří který je uložen "page_contents"  
//page_contents - zde je uložen veškerý obsah všech komponent - komponenty odsud mohou čerpat obsah