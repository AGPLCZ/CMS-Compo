<?php

namespace Compo\Navigation;
use Compo\Registry;
class UrlManager
{
    private $urlSegments;
    public $index;
    public $index_path;

    public function __construct()
    {
        $this->parseUrl();
    }

    // Odstranění počátečního a koncového lomítka z URI a rozdělení cesty URL na segmenty - např. z 'http://example.com/posts/123' na ['posts', '123'],  
    private function parseUrl()
    {
        $urlPath = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        $this->urlSegments = explode('/', $urlPath);
    }

    // Získání segmentu URL na zadaném indexu, pokud existuje
    public function getSegment($index)
    {

    
        $this->index = $index;
        $this->index_path = $this->index +  Registry::get('pathOffset');
        if (isset($this->urlSegments[$this->index_path])) {
            return $this->urlSegments[$this->index_path];
        };

        return 0;
    }

    //           return 0;   Potřeboval bych vymyslet jak mám udělat aby $this->path= číslo co nastaví uživatel   aby platilo pro všechny objekty  Kdyby to číslo path bylo jako parametr funkce tak bych v kodu jsem musel nějaké zadat, ale já chci aby uživatel mohl jej měnit a platilo to pro všechny vytvořené objekty.  Jak to mám udělat?  

    public function baseUrl()
    {
        return basename($_SERVER['PHP_SELF'], '.php');
    }

    // vrátí řetězec, který obsahuje základní URL a všechny segmenty URL
    public function __toString()
    {
        return "Základní URL: " . $this->baseUrl() . ", Segmenty: " . implode(', ', $this->urlSegments);
    }
}
