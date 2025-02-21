<?php
namespace Compo\Admin\Content;

use Compo\Navigation\UrlManager;
use DB;

class CreateContentWhere
{
    private $urlManager;

    public function __construct()
    {
        $this->urlManager = new UrlManager();
    }

    public function handleRequest()
    {
        $formData = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['submitCreateContent'])) {
                $formData = $this->prepareComponent();
            } elseif (isset($_POST['submitCreateContentExecute'])) {
                $formData = $this->createComponentExecute();
            }
        }
        return $formData;
    }

    public function prepareComponent()
    {
        $order = $_POST['order'] ?? 0;
        $back = $_SERVER['HTTP_REFERER'] ?? '../index/';

        return [
            'order' => $order + 1,
            'back' => $back
        ];
    }

    private function createComponentExecute()
    {
        $back = $_POST['back'] ?? 'components/';
        $pages_id = $_POST['pages_id'];
        $order = $_POST['order'];
        $list_components_id = $_POST['list_components_id'];

        $contents_id = $this->insertContent($pages_id, $list_components_id);
        $this->insertComponents($pages_id, $list_components_id, $contents_id, $order);

        header("Location: {$back}");
        exit;
    }

    public function insertContent(int $pages_id, int $list_components_id): int
    {
        $data = [
            'page_id' => $pages_id,
            'name' => 'Nový Obsah',
            'list_components_id' => $list_components_id
        ];
        DB::insert('contents', $data);
        return DB::insertId();
    }

    public function insertComponents(int $pages_id, int $list_components_id, int $contents_id, int $order): void
    {
        $data = [
            'pages_id' => $pages_id,
            'list_components_id' => $list_components_id,
            'contents_id' => $contents_id,
            'order' => $order
        ];
        DB::insert('components', $data);
    }

    public function getPages(): array
    {
        return DB::query("SELECT pages_id, title FROM pages ORDER BY title ASC");
    }

    public function selectListComponents(): array
    {
        return DB::query("SELECT * FROM `list_components`");
    }
}
