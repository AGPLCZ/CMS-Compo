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
        $language = $_POST['language'] ?? 'cz';  // Default to 'cz' if not set


        if ($language === 'cz') {
            $data = DB::queryFirstRow("SELECT %b FROM contents WHERE contents_id=%i", $column, $contents_id);
        } else {
            $data = DB::queryFirstRow("SELECT content FROM content_localizations WHERE contents_id=%i AND field_name=%s AND language=%s", $contents_id, $column, $language);
            $data = [$column => $data['content']];  // Adjust the array to match expected format
        }

        if (!$data) {
            return "Záznam nebyl nalezen.";
        }

        return [
            'action_url' => htmlspecialchars($this->urlManager->getFullUrl()),
            'back_url' => htmlspecialchars($this->urlManager->getBackPage()),
            'contents_id' => htmlspecialchars($contents_id),
            'column' => htmlspecialchars($column),
            'value' => htmlspecialchars($data[$column]),
            'language' => htmlspecialchars($language)  // Include language in the return for further processing
        ];
    }
    private function handleUpdate()
    {

        $contents_id = $_POST['contents_id'];
        $column = $_POST['column'];
        $value = $_POST['value'];
        $language = $_POST['language'] ?? 'cz';
        $back = $_POST['back'];

        if ($language === 'cz') {
            DB::update('contents', [
                $column => $value
            ], "contents_id=%i", $contents_id);
        } else {
            DB::update('content_localizations', [
                'content' => $value
            ], "contents_id=%i AND field_name=%s AND language=%s", $contents_id, $column, $language);
        }

        header("Location: " . htmlspecialchars($back));
        exit;
    }
}
