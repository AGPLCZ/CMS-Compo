<?php

namespace Compo\Admin\Content;

use Compo\Navigation\UrlManager;
use DB;
use Compo\Admin\Auth\Auth;

class EditContent
{
    private $urlManager;
    private $auth;

    public function __construct()
    {
        $this->urlManager = new UrlManager();
        $this->auth = new Auth();
    }

    public function handleRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['akce'])) {
            if ($_POST['akce'] === 'edit') {
                var_dump($_POST);
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
        $language = $_POST['language'] ?? 'cs';  // Default to 'cs' if not set

        if ($language === 'cs') {
            $data = DB::queryFirstRow("SELECT %b FROM contents WHERE contents_id=%i", $column, $contents_id);
            $data = [$column => $data[$column] ?? ''];  // Abychom se vyhnuli chybám, zkontrolujeme a nastavíme defaultní hodnotu
        } else {
            $data = DB::queryFirstRow("SELECT content FROM content_localizations WHERE contents_id=%i AND field_name=%s AND language=%s", $contents_id, $column, $language);
            if (!$data) {
                $originalData = DB::queryFirstRow("SELECT %b FROM contents WHERE contents_id=%i", $column, $contents_id);
                $data = [$column => $originalData[$column] ?? ''];
            } else {
                $data = [$column => $data['content']];  
            }
        }

        if (!$data || !isset($data[$column])) {
            return "Záznam nebyl nalezen.";
        }

        return [
            'action_url' => htmlspecialchars($this->urlManager->getFullUrl()),
            'back_url' => htmlspecialchars($this->urlManager->getBackPage()),
            'contents_id' => htmlspecialchars($contents_id),
            'column' => htmlspecialchars($column),
            'value' => htmlspecialchars($data[$column]),
            'language' => htmlspecialchars($language)
        ];
    }


    private function handleUpdate()
    {
        $contents_id = $_POST['contents_id'];
        $column = $_POST['column'];
        $value = $_POST['value'];
        $language = $_POST['language'] ?? 'cs';
        $back = $_POST['back'];

        if ($language === 'cs') {
            DB::update('contents', [
                $column => $value
            ], "contents_id=%i", $contents_id);
        } else {
            echo "kontroluji.";
            // Zkontrolujeme, zda už existuje překlad
            $exists = DB::queryFirstField("SELECT content FROM content_localizations WHERE contents_id=%i AND field_name=%s AND language=%s", $contents_id, $column, $language);

            var_dump($exists);
            if ($exists !== null) {
                // Aktualizace existujícího překladu
                DB::update('content_localizations', [
                    'content' => $value
                ], "contents_id=%i AND field_name=%s AND language=%s", $contents_id, $column, $language);
            } else {
                // Vytvoření nového překladu
                DB::insert('content_localizations', [
                    'contents_id' => $contents_id,
                    'field_name' => $column,
                    'language' => $language,
                    'content' => $value
                ]);
            }
        }

        header("Location: " . htmlspecialchars($back));
        exit;
    }



    public function inPlaceEditing()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $contents_id = $_POST['id'] ?? '';
            $language = $_POST['language'] ?? 'cs';
            $column = $_POST['column'] ?? '';
            $value = $_POST['value'] ?? '';


            if ($this->auth->isLoggedIn()) {
                if ($language == 'cs') {
                    // Aktualizace základního obsahu
                    DB::update('contents', [$column => $value], "contents_id=%i", $contents_id);
                    echo json_encode(['success' => true, 'id' => $contents_id, 'column' => $column, 'value' => $value]);
                } else {
                    // Aktualizace nebo vložení lokalizovaného obsahu
                    $exists = DB::queryFirstField("SELECT content FROM content_localizations WHERE contents_id=%i AND field_name=%s AND language=%s", $contents_id, $column, $language);

                    if ($exists !== null) {
                        // Aktualizace existujícího překladu
                        DB::update('content_localizations', ['content' => $value], "contents_id=%i AND field_name=%s AND language=%s", $contents_id, $column, $language);
                    } else {
                        // Vytvoření nového překladu
                        DB::insert('content_localizations', [
                            'contents_id' => $contents_id,
                            'field_name' => $column,
                            'language' => $language,
                            'content' => $value
                        ]);
                    }
                    echo json_encode(['success' => true, 'id' => $contents_id, 'column' => $column, 'value' => $value, 'language' => $language]);
                }
            }else{
                echo json_encode(['error' => true, 'id' => $contents_id, 'column' => $column, 'value' => $value, 'language' => $language]);
            }
        }
    }
}
