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


/*
$address = "bc1q9aslcgj4203926f45aazn2cnzmvwhc0g5d5h5j";
$validator = new Kielabokkie\Bitcoin\AddressValidator();
if ($validator->isValid($address)) {
    echo "OK";
} else {
    echo "NE";
}

*/


/*
spl_autoload_register(function ($class) {
    $prefix = 'Comgate\\';
    $base_dir = __DIR__ . '/src/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

*/


use Compo\Test;
//$test = new Test();
//echo $test->hello();

/*
use Compo\Navigation\UrlManager; 
$urlManager = new UrlManager();

$path = 1;
$urls = $urlManager->getSegment($path + 0);
$urlss = $urlManager->getSegment($path + 1);
*/

$config = new Registry();
$config->set("pathOffset",1);
$config->set("path","CMS");






$userDatabaseId = "";



$whatTemplate = new Template();
$template = $whatTemplate->TemplateName();


$pageRenderer = new PageRenderer($template);
$pageRenderer->renderComponents();

//components - to jsou jména komponent které jdou vložit na různé stránky, komponenty to jsou html šablony pro kousky / části stránky
//pages - to je hlavní menu ale zároveň se tím vytvoří stránka na kterou jde vkládat mnoho komponentů a tím se seskládá obsah stránky
//page_components - zde se ukládá která komponenta patří k jaké stránce "pages"  a taky se určuje jaký text ke komponentě patří který je uložen "page_contents"  
//page_contents - zde je uložen veškerý obsah všech komponent - komponenty odsud mohou čerpat obsah