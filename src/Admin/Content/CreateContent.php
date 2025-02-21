<?php

namespace Compo\Admin\Content;

use Compo\Navigation\UrlManager;
use DB;


class CreateContent
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
                header("Location: {$formData['back']}");
                exit;
            }
        }
        return $formData;
    }

    public function prepareComponent()
    {
        $pages_id = $_POST['pages_id'];
        $order = isset($_POST['order']) ? (int) $_POST['order'] : 0;

        $back = $_SERVER['HTTP_REFERER'] ?? '../index/';

        return ['pages_id' => $pages_id, 'order' => $order, 'back' => $back];
    }

    private function createComponentExecute(): array
    {
        $back = $_POST['back'] ?? '../index/';
        $pages_id = $_POST['pages_id'];
        $order = $_POST['order'];
        $list_components_id = $_POST['list_components_id'];

        $contents_id = $this->insertContent($pages_id, $list_components_id);
        $this->insertComponents($pages_id, $list_components_id, $contents_id, $order);

        return [
            'contents_id' => $contents_id,
            'pages_id' => $pages_id,
            'order' => $order,
            'list_components_id' => $list_components_id,
            'back' => $back
        ];
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

    public function selectListComponents(): array
    {
        return DB::query("SELECT * FROM `list_components`");
    }
}
