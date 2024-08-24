<?php

namespace Compo\Navigation;


use Compo\Registry;

class UrlManager
{

    private $urlSegments;
    private $pathOffset;
    static $url;

    public function __construct()
    {
        $this->parseUrl();
        $this->pathOffset();
    }

    /**
     * Removes leading and trailing slashes from the URI and splits the URL path into segments.
     * For example, 'http://example.com/posts/123' is split into ['posts', '123'].
     */
    private function parseUrl()
    {
        $urlPath = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        $this->urlSegments = explode('/', $urlPath);
    }


    /**
     * 
     * 
     * @return string 
     */

    private function pathOffset()
    {

        // Získání cesty z registru
        $path = Registry::get('path');

        // Rozdělení cesty na segmenty podle lomítek
        $pathSegments = explode('/', $path);

        // Odfiltrování prázdných segmentů z pole
        $pathSegments = array_filter($pathSegments);

        // Spočítání počtu segmentů
        $this->pathOffset = count($pathSegments);
    }

    /**
     * Retrieves a URL segment at the given index, if it exists.
     * If the CMS is located in a higher directory/in a folder (e.g., 'http://localhost/CMS/CMS-Compo/'),
     * 'path' will be 'CMS/CMS-Compo'.
     * 
     * @param int $index Index segmentu URL.
     * @return string|null Returns the URL segment or NULL if the segment does not exist.
     */
    public function getSegment($index)
    {
        $targetIndex = $index + $this->pathOffset;

        if (isset($this->urlSegments[$targetIndex])) {
            return $this->urlSegments[$targetIndex];
        }

        return NULL;
    }

    /**
     * @return string Returns the base name of the PHP file without the .php extension.
     */
    public function getUrlName()
    {
        // Získání protokolu
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http';

        // Sestavení plné URL
        $url = $protocol . '://' . $_SERVER['SERVER_NAME'];

        // Přidání portu, pokud je to potřeba (pro nestandardní porty)
        if (!in_array($_SERVER['SERVER_PORT'], [80, 443])) {
            $url .= ':' . $_SERVER['SERVER_PORT'];
        }

        $url = $url;

        return $url;
    }


    /**
     * @return string Returns the base name of the PHP file without the .php extension.
     */
    public function getUrl()
    {
        // Získání protokolu
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http';

        // Sestavení plné URL
        $url = $protocol . '://' . $_SERVER['SERVER_NAME'];

        // Přidání portu, pokud je to potřeba (pro nestandardní porty)
        if (!in_array($_SERVER['SERVER_PORT'], [80, 443])) {
            $url .= ':' . $_SERVER['SERVER_PORT'];
        }

        $url = $url . '' . Registry::get('path');

        return $url;
    }

    /**
     * @return string Returns  full url adress
     */
    public function getFullUrl()
    {
        //return __DIR__ . '/'. Registry::get('path') .'/';
        // Získání protokolu
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http';

        // Sestavení plné URL
        $url = $protocol . '://' . $_SERVER['SERVER_NAME'];

        // Přidání portu, pokud je to potřeba (pro nestandardní porty)
        if (!in_array($_SERVER['SERVER_PORT'], [80, 443])) {
            $url .= ':' . $_SERVER['SERVER_PORT'];
        }

        // Přidání URI
        $url .= $_SERVER['REQUEST_URI'];

        return $url;
    }


    public function getBaseName()
    {
        return basename($_SERVER['PHP_SELF'], '.php');
    }

    public function getBackPage()
    {
        if (isset($_SERVER["HTTP_REFERER"])) {
            return $_SERVER["HTTP_REFERER"];
        } else {
            // Návratová URL není dostupná, vrátíme alternativní URL nebo hlavní stránku
            return $this->getUrl();
        }
    }


    /**
     * @return string 
     */
    public function getSegmentSlash()
    {
        $result = "";  // Inicializace proměnné $result
        $targetIndex0 = 0 + $this->pathOffset;
        $targetIndex1 = 1 + $this->pathOffset;

        // Kontrola existence segmentů a jejich přidání do výsledku
        if (isset($this->urlSegments[$targetIndex0])) {
            $result .=  '<li class="list-inline-item text-primary">' . $this->urlSegments[$targetIndex0] . '</li>' . "&nbsp; &nbsp; / ";
        }
        if (isset($this->urlSegments[$targetIndex1])) {
            $result .= $this->urlSegments[$targetIndex1] . " / ";
        }

        return $result;
    }



    /**
     * Returns a string that includes the base URL and all URL segments.
     * 
     * @return string A formatted string containing the base URL and segments.
     */
    public function __toString()
    {
        return "Základní URL: " . $this->getBaseName() . ", Segmenty: " . implode(', ', $this->urlSegments);
    }
}
