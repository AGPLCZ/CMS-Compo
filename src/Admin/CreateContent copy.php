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

    
    /**
     * Vloží nový řádek do tabulky 'contents' s pevně stanovenými hodnotami.
     *
     * @return int ID vloženého řádku
     */
    public function insertContent($page_id)
    {
        // Příprava dat pro vložení
        $data = array(
            'page_id' => $page_id,
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
        );

        // Vložení dat do databáze
        DB::insert('contents', $data);

        // Vrácení ID nově vloženého řádku
        return DB::insertId();
    }

    public function insertComponents($pages_id, $list_components_id, $contents_id, $order)
{
    // Příprava dat pro vložení
    $data = array(
        'pages_id' => $pages_id,
        'list_components_id' => $list_components_id,
        'contents_id' => $contents_id,
        'order' => $order
    );

    // Vložení dat do databáze
    DB::insert('components', $data);

    // Vrácení ID nově vloženého řádku
    return DB::insertId();
}

    public function selectListComponents()
    {
      
        $listComponents = DB::query("SELECT * FROM `list_components` WHERE 1");
  
    
        return $listComponents;
    }


}
