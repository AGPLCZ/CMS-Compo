<?php
// Funkce pro dynamické sestavení menu na základě struktury stránek uložených v databázi

 // *** SQL NAVIGATION ***
 $pages = DB::query("
 SELECT id, title, uri, parent_id 
 FROM pages 
 WHERE visible_in_menu = TRUE 
 ORDER BY parent_id ASC, menu_order ASC
 ");
 // *** end NAVIGATION ***


function buildMenu($pages = null, $parentId = null)
{
      
    // Proměnná $first slouží k určení, zda se jedná o první iteraci smyčky
    $first = true;
    foreach ($pages as $page) {
        // Kontrola, zda je aktuální stránka dítětem stránky s daným $parentId
        if ($page['parent_id'] == $parentId) {
            // Pro první položku na každé úrovni vytvoří <ul> nebo <div> kontejner
            if ($first) {
                // Rozlišení mezi hlavním menu a dropdown podmenu
                echo $parentId === null ? '<ul class="navbar-nav mx-auto">' : '<div class="dropdown-menu" aria-labelledby="navbarDropdown' . $parentId . '">';
                $first = false;
            }

            // Zjištění, zda má aktuální stránka dětské stránky
            $hasChildren = false;
            foreach ($pages as $subPage) {
                if ($subPage['parent_id'] == $page['id']) {
                    $hasChildren = true;
                    break;
                }
            }

            // Pokud má stránka dětské stránky, vytvoří se pro ni rozbalovací menu
            if ($hasChildren) {
                echo '<li class="nav-item dropdown">';
                // Přidání třídy 'dropdown-toggle' a atributů pro Bootstrap dropdown   Tohle má být v šabloně boostrap5!!!!  data-bs-toggle   pak mi mobil nefungoval
                echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown' . $page['id'] . '" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . $page['title'] . '</a>';
                // Rekurzivní volání funkce pro vytvoření podmenu
                buildMenu($pages, $page['id']);
                echo '</li>';
            } else {
                // Pro stránky bez dětských stránek se vytvoří obyčejná položka menu
                if (!empty($page['uri']) && strpos($page['uri'], 'http') !== false) {
                    // Externí odkaz
                    echo $parentId === null ? '<li class="nav-item">' : '';
                    echo '<a class="';
                    echo $parentId === null ? 'nav-link' : 'dropdown-item';
                    echo '" href="' . $page['uri'] . '">' . $page['title'] . '</a>';
                    echo $parentId === null ? '</li>' : '';
                } else {
                    // Interní odkaz nebo odkaz na úvodní stránku
                    echo $parentId === null ? '<li class="nav-item">' : '';
                    $href = !empty($page['uri']) ? ('/' . trim($page['uri'], '/') . '/') : '/';
                    echo '<a class="';
                    echo $parentId === null ? 'nav-link' : 'dropdown-item';
                    echo '" href="' . $href . '">' . $page['title'] . '</a>';
                    echo $parentId === null ? '</li>' : '';
                }
            }
        }
    }
    // Po projití všech stránek na dané úrovni uzavře <ul> nebo <div>
    if (!$first) {
        echo $parentId === null ? '</ul>' : '</div>';
    }
}
