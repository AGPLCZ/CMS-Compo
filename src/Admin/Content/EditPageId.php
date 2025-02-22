<?php 
namespace Compo\Admin\Content;

use DB;

class EditPageId
{
    public function __construct()
    {
    
    }

    public function handleRequest()
    {
        var_dump("🔥 Odeslaná data:", $_POST);
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($_POST['components_id']) || empty($_POST['new_page_id'])) {
                die("❌ Chybí `components_id` nebo `new_page_id` v POST.");
            }
    
            $components_id = (int) $_POST['components_id'];
            $new_page_id = (int) $_POST['new_page_id'];
    
            var_dump("✅ Přijaté hodnoty", [
                "components_id" => $components_id,
                "new_page_id" => $new_page_id
            ]);
    
            $this->updatePageId($components_id, $new_page_id);
        } else {
            die("❌ Požadavek nebyl POST.");
        }
    }
    

    private function updatePageId(int $components_id, int $new_page_id): void
    {
        // Nejprve načteme komponentu, abychom získali `contents_id`
        $component = DB::queryFirstRow("SELECT pages_id, contents_id FROM components WHERE components_id = %i", $components_id);
        var_dump("🔍 Načtená komponenta:", $component);

        if (!$component) {
            die("❌ Komponenta nenalezena.");
        }

        $contents_id = (int) $component['contents_id'];

        // Aktualizace pages_id v components
        $updatedComponents = DB::update('components', ['pages_id' => $new_page_id], "components_id=%i", $components_id);
        var_dump("🛠 Výsledek update components:", $updatedComponents);

        // Aktualizace page_id v contents
        $updatedContents = DB::update('contents', ['page_id' => $new_page_id], "contents_id=%i", $contents_id);
        var_dump("🛠 Výsledek update contents:", $updatedContents);

        // Ověření, zda byly skutečně provedeny změny
        $checkComponents = DB::queryFirstRow("SELECT pages_id FROM components WHERE components_id = %i", $components_id);
        var_dump("🔎 Zkontrolovaná komponenta po update:", $checkComponents);

        $checkContents = DB::queryFirstRow("SELECT page_id FROM contents WHERE contents_id = %i", $contents_id);
        var_dump("🔎 Zkontrolovaný obsah po update:", $checkContents);

        // Přesměrování zpět
        header("Location: /admin/components");
        exit;
    }

    public function getPages(): array
    {
        $pages = DB::query("SELECT pages_id, title FROM pages ORDER BY title ASC");
        var_dump("📋 Seznam stránek:", $pages);
        return $pages;
    }
}