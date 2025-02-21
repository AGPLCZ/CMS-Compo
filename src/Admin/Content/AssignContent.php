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
                $this->formData['current_list_components_id'] = $this->formData['list_components_id'] ?? '';
                $this->formData['current_order'] = $_POST['current_order'] ?? 0;
            }

            if (isset($_POST['assignContent']) && !empty($_POST['pages_id']) && !empty($_POST['list_components_id'])) {
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
        if (!isset($_POST['pages_id'], $_POST['list_components_id'], $_POST['contents_id'], $_POST['order'])) {
            die("Error: Missing data for assignment.");
        }

        DB::insert('components', [
            'pages_id' => (int)$_POST['pages_id'],
            'list_components_id' => (int)$_POST['list_components_id'],
            'contents_id' => (int)$_POST['contents_id'],
            'order' => (int)$_POST['order']
        ]);

        header("Location: /admin/contentList");
        exit;
    }
}
