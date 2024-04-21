<?php

namespace Compo\Admin\Components;
use Compo\Admin\Auth\FlashManager;
use DB;


class DeleteComponents
{

    public function deleteComponents()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['submitComponentsDel'])) {
                $components_id = $_POST['deleteComponents'];
                $back = $_SERVER['HTTP_REFERER'] ?? '../index.php';

                // Vykoná operaci mazání a vrátí počet smazaných řádků
                $affectedRows = DB::delete('components', "components_id=%d", $components_id);


               
                // Kontrola, zda byl nějaký řádek smazán 
                if ($affectedRows > 0) {        
                    FlashManager::setFlashMessage("Komponenta s ID $components_id byla úspěšně smazána.", 'success');     
                 
                } else {
                    FlashManager::setFlashMessage("Komponenta s ID $components_id nebyla smazána.", 'error');     
                }
                
               header("Location: {$back}");
                exit;
            }
        }
    }
}
