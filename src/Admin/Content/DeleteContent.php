<?php

namespace Compo\Admin\Content;

use DB;

class DeleteContent
{
    public function handleRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contents_id'])) {
            $this->deleteContent((int)$_POST['contents_id']);
        }
    }

    private function deleteContent(int $contents_id): void
    {
        // Smazání obsahových lokalizací, pokud existují
        DB::query("DELETE FROM content_localizations WHERE contents_id=%i", $contents_id);

        // Smazání samotného obsahu
        DB::delete('contents', "contents_id=%i", $contents_id);

        // Přesměrování zpět na stránku se seznamem obsahů
        header("Location: contentList");
        exit;
    }
}
