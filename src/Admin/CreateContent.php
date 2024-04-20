<?php

namespace Compo\Admin;

use Compo\Navigation\UrlManager;
use DB;


class CreateContent
{
    private $urlManager;

    public function __construct()
    {
        $this->urlManager = new UrlManager();
    }


    // public function handleRequest()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         if (isset($_POST['submitPageRender'])) {
    //             $this->prepareComponentSelection();
    //         } elseif (isset($_POST['submitCreateContent'])) {
    //             $this->createComponent();
    //         }
    //     }
    // }

    // public function handleRequest()
    // {
    //     global $back, $pages_id, $order; // Definice globálních proměnných

    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         if (isset($_POST['submitPageRender'])) {
    //             $result = $this->prepareComponentSelection();
    //             $back = $result['back'];
    //             $pages_id = $result['pages_id'];
    //             $order = $result['order'];
    //         } elseif (isset($_POST['submitCreateContent'])) {
    //             $this->createComponent();
    //         }
    //     }
    // }

    public function handleRequest()
    {
        $data = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['submitPageRender'])) {
                $data = $this->prepareComponentSelection();
            } elseif (isset($_POST['submitCreateContent'])) {
                $data = $this->createComponent();
            }
        }
        return $data;
    }


    public function prepareComponentSelection()
{
    $pages_id = $_POST['pages_id'];
    $order = $_POST['order'] + 1;
    $back = $_SERVER['HTTP_REFERER'] ?? '../index.php';

    return ['pages_id' => $pages_id, 'order' => $order, 'back' => $back];
}

    private function createComponent()
    {
        $back = $_POST['back'] ?? '../index.php';
        $pages_id = $_POST['pages_id'];
        $order = $_POST['order'];
        $list_components_id = $_POST['list_components_id'];

        $contents_id = $this->insertContent($pages_id);
        $this->insertComponents($pages_id, $list_components_id, $contents_id, $order);

        header("Location: {$back}");
        exit;
    }




    public function insertContent(int $pages_id): int
    {
        $data = [
            'page_id' => $pages_id,
            'name' => 'Nový Obsah',
            'content1' => 'Content 1',
            'content2' => 'Content 2',
            'content3' => 'Content 3',
            'content4' => 'Content 4',
            'content5' => 'Content 5',
            'content6' => 'Content 6',
            'content7' => 'Content 7',
            'content8' => 'Content 8',
            'content9' => 'Content 9',
            'content10' => 'Content 10',
            'content11' => 'Content 11',
            'content12' => 'Content 12',
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
