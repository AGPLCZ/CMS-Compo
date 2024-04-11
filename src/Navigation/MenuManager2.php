<?php

namespace Compo\Navigation {

    use Compo\Registry;
    use DB;

    class MenuManager2
    {
        private $pages = [];
        private $pageTree = [];

        public function __construct()
        {
            $this->loadPages();
            $this->buildTree();
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

        private function buildHtmlMenu($pages, $isSubmenu = false)
        {
            $html = $isSubmenu ? '<div class="dropdown-menu">' : '<ul class="navbar-nav mx-auto">';

            foreach ($pages as $page) {
                if (!empty($page['children'])) {
                    $html .= '<li class="nav-item dropdown">';
                    $html .= '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown' . $page['pages_id'] . '" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . $page['title'] . '</a>';
                    $html .= $this->buildHtmlMenu($page['children'], true);
                    $html .= '</li>';
                } else {
                    $href = !empty($page['uri']) && strpos($page['uri'], 'http') !== false ? $page['uri'] : '/' . Registry::get('path') . '/' . trim($page['uri'], '/') . '/';
                    $html .= $isSubmenu ? '<a class="dropdown-item" href="' . $href . '">' : '<li class="nav-item"><a class="nav-link" href="' . $href . '">';
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
/*
$children:
│
├── "" (kořenové stránky, tj. stránky bez parentId)
│   ├── [0] Úvod (pages_id: 1, uri: index)
│   ├── [1] Bitcoin VexlATM (pages_id: 2, uri: bitcoin)
│   ├── [2] Blog (pages_id: 6, uri: blog)
│   ├── [3] Lektorské služby pro děti (pages_id: 5, uri: https://dobrodruzi.cz)
│   └── [4] Cestovní zápisky (pages_id: 10, uri: nic)
│
└── "10" (děti stránky s pages_id: 10, tj. Cestovní zápisky)
    ├── [0] Cestovní deník (pages_id: 9, uri: travel, parentId: 10)
    └── [1] Cestovní časová osa (pages_id: 8, uri: timeline, parentId: 10)
*/