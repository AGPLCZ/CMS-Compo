<?php

namespace Compo\Navigation;

use Compo\Registry;

class UrlManager
{
    private $urlSegments;

    public function __construct()
    {
        $this->parseUrl();
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
     * Retrieves a URL segment at the given index, if it exists.
     * If the CMS is located in a higher directory/in a folder (e.g., 'http://localhost/CMS/CMS-Compo/'),
     * 'path' will be 'CMS/CMS-Compo'.
     * 
     * @param int $index Index segmentu URL.
     * @return string|null Returns the URL segment or NULL if the segment does not exist.
     */
    public function getSegment($index)
    {
        $path = Registry::get('path');
        $pathSegments = explode('/', $path);
        $pathOffset = count($pathSegments);

        $targetIndex = $index + $pathOffset;

        if (isset($this->urlSegments[$targetIndex])) {
            return $this->urlSegments[$targetIndex];
        }

        return NULL;
    }

    /**
     * Returns the base name of the PHP file without the .php extension.
     * 
     * @return string 
     */
    public function baseUrl()
    {
        return basename($_SERVER['PHP_SELF'], '.php');
    }

    /**
     * Returns a string that includes the base URL and all URL segments.
     * 
     * @return string A formatted string containing the base URL and segments.
     */
    public function __toString()
    {
        return "Základní URL: " . $this->baseUrl() . ", Segmenty: " . implode(', ', $this->urlSegments);
    }
}
