<?php
namespace Compo\Admin\Components;

use DB;
use Compo\Admin\Auth\FlashManager;

class ComponentsRenderer
{
    public function getComponentsData(): array
    {
        $query = "
            SELECT
                pages.title AS page_title,
                components.components_id,
                pages.pages_id,
                pages.title,
                list_components.list_components_id,
                list_components.name AS list_components_name,
                contents.contents_id,
                contents.name AS contents_name,
                components.order
            FROM
                pages
            JOIN components ON pages.pages_id = components.pages_id
            JOIN list_components ON components.list_components_id = list_components.list_components_id
            JOIN contents ON components.contents_id = contents.contents_id
            ORDER BY pages.pages_id, components.order
        ";
        
        return DB::query($query);
    }


    public function getComponentsPages(): array
    {
        
     return DB::query("SELECT pages_id, title FROM `pages` WHERE 1"); 
    }

   
}
