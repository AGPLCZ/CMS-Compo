<?php

namespace Compo\Admin\Components;

use Compo\Navigation\UrlManager;
use DB;

class Page
{
    private $urlManager;
    private $formData = [];
    private $url;

    public function __construct()
    {
        $this->urlManager = new UrlManager();
        $this->url = $this->urlManager->getSegment(2);
        $this->handleRequest();
    }

    public function getFormData(): array
    {
        return $this->formData;
    }

    private function handleRequest(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (isset($_POST['delete_pages_id'])) {
                $this->deletePage((int) $_POST['delete_pages_id']);
                header("Location: pages.php"); // Přesměrování zpět na seznam stránek
                exit;
            }
            

            if (isset($_POST['pages_id']) && !empty($_POST['title']) && !empty($_POST['uri'])) {
                $this->formData = [
                    'pages_id' => $_POST['pages_id'],
                    'title' => trim($_POST['title']),
                    'uri' => trim($_POST['uri']),
                    'menu_order' => (int) ($_POST['menu_order'] ?? 0),
                    'visible_in_menu' => isset($_POST['visible_in_menu']) ? 1 : 0,
                    'parent_id' => !empty($_POST['parent_id']) ? (int) $_POST['parent_id'] : null
                ];
                $this->savePage();
            } else {
                $this->formData = $this->getPageById($_POST['pages_id'] ?? 0) ?? [];
            }
        } elseif (!empty($this->url)) {
            $this->formData = $this->getPageByUri($this->url) ?? [];
        }
    }

    private function savePage(): void
    {
        if (!empty($this->formData['title']) && !empty($this->formData['uri'])) {
            if (!empty($this->formData['pages_id'])) {
                // UPDATE
                DB::update('pages', [
                    'title' => $this->formData['title'],
                    'uri' => $this->formData['uri'],
                    'menu_order' => $this->formData['menu_order'],
                    'visible_in_menu' => $this->formData['visible_in_menu'],
                    'parent_id' => $this->formData['parent_id']
                ], "pages_id=%i", $this->formData['pages_id']);
            } else {
                // INSERT
                DB::insert('pages', [
                    'title' => $this->formData['title'],
                    'uri' => $this->formData['uri'],
                    'menu_order' => $this->formData['menu_order'],
                    'visible_in_menu' => $this->formData['visible_in_menu'],
                    'parent_id' => $this->formData['parent_id']
                ]);

                // Po vložení nové stránky nastavíme $formData na existující stránku
                $this->formData = $this->getPageByUri($this->formData['uri']) ?? [];
            }
        }
    }
    public function deletePage(int $pages_id): void
    {
        // Získáme všechna contents_id spojená s pages_id
        $contents_ids = DB::queryFirstColumn("SELECT contents_id FROM contents WHERE page_id=%i", $pages_id);
    
        if (!empty($contents_ids)) {
            // Smažeme lokalizace obsahu
            DB::query("DELETE FROM content_localizations WHERE contents_id IN (%li)", $contents_ids);
    
            // Smažeme obsahové bloky spojené se stránkou
            DB::query("DELETE FROM contents WHERE page_id=%i", $pages_id);
        }
    
        // Smažeme komponenty spojené se stránkou
        DB::query("DELETE FROM components WHERE pages_id=%i", $pages_id);
    
        // Nakonec smažeme samotnou stránku
        DB::delete('pages', "pages_id=%i", $pages_id);
    
        // Přesměrování zpět na seznam stránek
        header("Location: " . $this->urlManager->getFullUrl());
        exit;
    }
    
    
    
    
    

    public function getPageById(int $pages_id): ?array
    {
        return DB::queryFirstRow("SELECT * FROM pages WHERE pages_id=%i", $pages_id);
    }

    public function getPageByUri(string $uri): ?array
    {
        return DB::queryFirstRow("SELECT * FROM pages WHERE uri=%s", $uri);
    }

    public function getPages(): array
    {
        return DB::query("SELECT pages_id, title FROM pages ORDER BY title ASC");
    }
}
