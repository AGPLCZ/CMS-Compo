<?php

namespace Compo\Navigation {

    use Compo\Registry;
    use DB;

    
    // *** NAVIGATION ***
    class MenuManager
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
            foreach ($this->pages as $id => &$page) {
                if ($page['parentId'] !== null) {
                    if (isset($this->pages[$page['parentId']])) {
                        // Přidání aktuální stránky jako dítěte k jejímu rodiči
                        $this->pages[$page['parentId']]['children'][] = &$page;
                    }
                } else {
                    // Přidání stránek bez rodiče do kořenového stromu
                    $this->pageTree[] = &$page;
                }
            }
            unset($page); // Odstranění reference na poslední prvek
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
            echo $this->buildHtmlMenu($this->pageTree);
        }
    }
}

