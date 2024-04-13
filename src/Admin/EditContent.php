<?php

namespace Compo\Admin;

use Compo\Navigation\UrlManager;
use DB;

class EditContent
{
    private $urlManager;

    public function __construct()
    {
        $this->urlManager = new UrlManager();
    }

    public function handleRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['akce'])) {
            if ($_POST['akce'] === 'edit') {
                return $this->handleEdit();
            } elseif ($_POST['akce'] === 'update') {
                $this->handleUpdate();
            }
        }
        return null;
    }

    private function handleEdit()
    {
        $contents_id = $_POST['contents_id'];
        $column = $_POST['column'];

        $data = DB::queryFirstRow("SELECT %b FROM contents WHERE contents_id=%i", $column, $contents_id);
        if (!$data) {
            return "Záznam nebyl nalezen.";
        }

        return [
            'action_url' => htmlspecialchars($this->urlManager->getFullUrl()),
            'back_url' => htmlspecialchars($this->urlManager->getBackPage()),
            'contents_id' => htmlspecialchars($contents_id),
            'column' => htmlspecialchars($column),
            'value' => htmlspecialchars($data[$column])
        ];
    }

    private function handleUpdate()
    {
        $contents_id = $_POST['contents_id'];
        $column = $_POST['column'];
        $value = $_POST['value'];
        $back = $_POST['back'];

        DB::update('contents', array(
            $column => $value
        ), "contents_id=%i", $contents_id);

        header("Location: " . htmlspecialchars($back));
        exit;
    }
}
