<?php

namespace Compo\Navigation {

    use Compo\Registry;
    use Compo\Navigation\UrlManager;
    use DB;


    class MenuManager2
    {
        private $pages = [];
        private $pageTree = [];

        private $urls;
        private $urlss;
        private $urlManager;
        public $url;
        public $urlName;

        public function __construct()
        {
            $this->loadPages();
            $this->buildTree();


            $this->urlManager = new UrlManager();
            $this->urls = $this->urlManager->getSegment(0);
            $this->urlss = $this->urlManager->getSegment(1);
        
    
            if ($this->urls == null) {
                $this->urls = "index";
            }
    
            $this->url = $this->urlManager->getUrl();
            $this->urlName = $this->urlManager->getUrlName();

        }

        private function loadPages()
        {
            $result = DB::query("
            SELECT pages_id, title, uri, parent_id 
            FROM pages 
            WHERE visible_in_menu = TRUE 
            ORDER BY parent_id ASC, menu_order ASC
        ");

            foreach ($result as $row) {
                // Přidání nové stránky do pole $pages
                $this->pages[$row['pages_id']] = [
                    'pages_id' => $row['pages_id'],
                    'title' => $row['title'],
                    'uri' => $row['uri'],
                    'parentId' => $row['parent_id'],
                    'children' => [] // Přidáváme prázdné pole pro dětské stránky
                ];
            }
        }

        private function buildTree()
        {
            // Dočasně uložíme stránky podle jejich rodičů
            $children = [];

            // Iterujeme přes všechny stránky a skladujeme je podle jejich rodičů
            foreach ($this->pages as $page) {
                $parentId = $page['parentId'];
                if (!isset($children[$parentId])) {
                    $children[$parentId] = [];
                }
                $children[$parentId][] = $page;
            }
            //var_dump($children);

            // Nyní rekurzivně postavíme strom začínající od stránek bez rodičů (kořenové stránky)
            foreach ($children[null] as $rootPage) {
                $this->pageTree[] = $this->buildBranch($rootPage, $children);
            }
        }

        private function buildBranch($page, $children)
        {
            // Pokud má stránka děti, rekurzivně k nim přidáme tyto děti
            if (isset($children[$page['pages_id']])) {
                foreach ($children[$page['pages_id']] as $child) {
                    $page['children'][] = $this->buildBranch($child, $children);
                }
            }
            return $page;
        }

        //         private function buildHtmlMenu($pages, $isSubmenu = false)
        // {
        //     $path = Registry::get('path');
        //     $currentUrl = trim($_SERVER['REQUEST_URI'], '/');
        //     $html = $isSubmenu ? '<div class="dropdown-menu">' : '<ul class="navbar-nav mx-auto">';

        //     foreach ($pages as $page) {
        //         $activeClass = '';
        //         $pageUrl = trim($page['uri'], '/');

        //         // Pokud je aktuální URL stejná jako URL stránky, přidáme třídu 'active'
        //         if ($currentUrl === $pageUrl) {
        //             $activeClass = 'active';
        //         }

        //         if (!empty($page['children'])) {
        //             $html .= '<li class="nav-item dropdown ' . $activeClass . '">';
        //             $html .= '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown' . $page['pages_id'] . '" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . $page['title'] . '</a>';
        //             $html .= $this->buildHtmlMenu($page['children'], true);
        //             $html .= '</li>';
        //         } else {
        //             $href = !empty($page['uri']) && strpos($page['uri'], 'http') !== false ? $page['uri'] : '/' . $path . $pageUrl . '/';
        //             $html .= $isSubmenu ? '<a class="dropdown-item ' . $activeClass . '" href="' . $href . '">' : '<li class="nav-item ' . $activeClass . '"><a class="nav-link" href="' . $href . '">';
        //             $html .= $page['title'];
        //             $html .= $isSubmenu ? '</a>' : '</a></li>';
        //         }
        //     }

        //     $html .= $isSubmenu ? '</div>' : '</ul>';

        //     return $html;
        // }


        private function buildHtmlMenu($pages, $isSubmenu = false)
        {

            //pokud je projekt ve složce
            $path = Registry::get('path');
            if ($path == "") {
                $path = "";
            } else {
                $path = $path . "/";
            }
            //--

            // $currentUrl = trim($_SERVER['REQUEST_URI'], '/');
            // if (substr($currentUrl, 0, strlen($path)) == $path) {
            //     // Odebrání cesty ze začátku URL
            //     $currentUrl = substr($currentUrl, strlen($path));
            // }
        
             $currentUrl = $this->urls;

            $html = $isSubmenu ? '<div class="dropdown-menu">' : '<ul class="navbar-nav mx-auto">';

            foreach ($pages as $page) {
                $activeClass = '';
                $pageUrl = trim($page['uri'], '/');

                // Pokud je aktuální URL stejná jako URL stránky, přidáme třídu 'active'
                if ($currentUrl == $pageUrl) {
                    $activeClass = 'active';                
                }
                //ladění
                //echo "currentUrl: " . $currentUrl . " I " . "pageUrl: " . $pageUrl . " Active: " . $activeClass . "<br>";

                if (!empty($page['children'])) {
                    $html .= '<li class="nav-item dropdown">';

                    if (Registry::get('template') == "mizzle") {
                        $html .= '<a class="nav-link dropdown-togglee" href="#" id="navbarDropdown' . $page['pages_id'] . '" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . $page['title'] . ' <i class="fas fa-chevron-down"></i></a>';
                    } else {

                        $html .= '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown' . $page['pages_id'] . '" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . $page['title'] . '</a>';
                    }

                    $html .= $this->buildHtmlMenu($page['children'], true);
                    $html .= '</li>';
                } else {
                    //
                    $href = !empty($page['uri']) && strpos($page['uri'], 'http') !== false ? $page['uri'] : '/' . $path . trim($page['uri'], '/') . '/';
                    $html .= $isSubmenu ? '<a class="dropdown-item" href="' . $href . '">' : '<li class="nav-item"><a class="nav-link ' . $activeClass .'" href="' . $href . '">';
                    $html .= $page['title'];
                    $html .= $isSubmenu ? '</a>' : '</a></li>';
                }
            }


            $html .= $isSubmenu ? '</div>' : '</ul>';

            return $html;
        }

        public function buildMenuPrimary()
        {
            return $this->buildHtmlMenu($this->pageTree);
        }
    }
}
