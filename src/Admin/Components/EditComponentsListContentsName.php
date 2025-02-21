<?php

namespace Compo\Admin\Components;

use Compo\Navigation\UrlManager;
use DB;

class EditComponentsListContentsName
{
    private $urlManager;
    private $urlsss;

    public function __construct()
    {
        $this->urlManager = new UrlManager();
        $this->urlsss = $this->urlManager->getSegment(2);
    }

    public function handleRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['editComponentsListContentsName'])) {
                return $this->handleEdit();
            } elseif (isset($_POST['akce']) && $_POST['akce'] === 'update') {
                $this->handleUpdate();
            }
        }
        return null;
    }

    private function handleEdit()
    {
        $contents_id = $_POST['editComponentsListContentsName'];
        $data = DB::queryFirstRow("SELECT * FROM contents WHERE contents_id=%i", $contents_id);
        return [
            'action_url' => htmlspecialchars($this->urlManager->getFullUrl()),
            'back_url' => htmlspecialchars($this->urlManager->getBackPage()),
            'contents_id' => htmlspecialchars($contents_id),
            'name' => htmlspecialchars($data['name'])
        ];
    }

    private function handleUpdate()
    {
        $contents_id = (int)$_POST['contents_id'];
        $back_url = $_POST['back_url'];
        $name = trim($_POST['name']);
        
        DB::update('contents', ['name' => $name], "contents_id=%i", $contents_id);
        header("Location: " . htmlspecialchars($back_url));
        exit;
    }
}
