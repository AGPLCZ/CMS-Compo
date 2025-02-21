<?php

namespace Compo\Admin\Content;

use Compo\Navigation\UrlManager;
use DB;

class AssignContent
{
    private $urlManager;
    private $formData = [];

    public function __construct()
    {
        $this->urlManager = new UrlManager();
        $this->handleRequest();
    }

    public function getFormData(): array
    {
        return $this->formData;
    }

    private function handleRequest(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['contents_id'])) {
                $this->formData = $this->getContentById((int) $_POST['contents_id']);
                $this->formData['pages'] = $this->getPages();
                $this->formData['components'] = $this->getListComponents();
            }

            if (isset($_POST['assignContent'])) {
                $this->assignContentToPage();
            }
        }
    }

    private function getContentById(int $contents_id): array
    {
        return DB::queryFirstRow("SELECT * FROM contents WHERE contents_id=%i", $contents_id) ?? [];
    }

    private function getPages(): array
    {
        return DB::query("SELECT pages_id, title FROM pages ORDER BY title ASC");
    }

    private function getListComponents(): array
    {
        return DB::query("SELECT * FROM `list_components` ORDER BY name ASC");
    }

    private function assignContentToPage(): void
    {
        $pages_id = (int) $_POST['pages_id'];
        $contents_id = (int) $_POST['contents_id'];
        $list_components_id = (int) $_POST['list_components_id'];
        $order = (int) $_POST['order'];

        DB::insert('components', [
            'pages_id' => $pages_id,
            'list_components_id' => $list_components_id,
            'contents_id' => $contents_id,
            'order' => $order
        ]);

        header("Location: components.php"); // Přesměrování po úspěšném přiřazení
        exit;
    }
}
