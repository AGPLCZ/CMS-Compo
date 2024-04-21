<?php

namespace Compo\Admin\Components;

use DB;

class DeleteComponents
{
    public function deleteComponents()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['submitComponentsDel'])) {
               $components_id = $_POST['deleteComponents'];
                $back = $_SERVER['HTTP_REFERER'] ?? '../index.php';
                DB::delete('components', "components_id=%d", $components_id);
                echo "provedeno";
                header("Location: {$back}");
                exit;
            }
        }
    }
}
