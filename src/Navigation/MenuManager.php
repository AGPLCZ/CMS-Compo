<?php

namespace Compo\Navigation {

    use DB;

    // *** NAVIGATION ***
    class MenuManager
    {
        private $pages = [];
        private $pageTree = [];

        public function __construct()
        {
            $this->loadPages();
            $this->buildTree();
        }

        private function loadPages()
        {
            $result = DB::query("
            SELECT pages_id, title, uri, parent_id 
            FROM pages 
            WHERE visible_in_menu = TRUE 
            ORDER BY parent_id ASC, menu_order ASC
        ");

            foreach ($result as $row) {
                // Přidání nové stránky do pole $pages
                $this->pages[$row['pages_id']] = [
                    'pages_id' => $row['pages_id'],
                    'title' => $row['title'],
                    'uri' => $row['uri'],
                    'parentId' => $row['parent_id'],
                    'children' => [] // Přidáváme prázdné pole pro dětské stránky
                ];
            }
        }

        private function buildTree()
        {
            foreach ($this->pages as $id => &$page) {
                if ($page['parentId'] !== null) {
                    if (isset($this->pages[$page['parentId']])) {
                        // Přidání aktuální stránky jako dítěte k jejímu rodiči
                        $this->pages[$page['parentId']]['children'][] = &$page;
                    }
                } else {
                    // Přidání stránek bez rodiče do kořenového stromu
                    $this->pageTree[] = &$page;
                }
            }
            unset($page); // Odstranění reference na poslední prvek
        }

        private function buildHtmlMenu($pages, $isSubmenu = false)
        {
            $html = $isSubmenu ? '<div class="dropdown-menu">' : '<ul class="navbar-nav mx-auto">';

            foreach ($pages as $page) {
                if (!empty($page['children'])) {
                    $html .= '<li class="nav-item dropdown">';
                    $html .= '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown' . $page['pages_id'] . '" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . $page['title'] . '</a>';
                    $html .= $this->buildHtmlMenu($page['children'], true);
                    $html .= '</li>';
                } else {
                    $href = !empty($page['uri']) && strpos($page['uri'], 'http') !== false ? $page['uri'] : '/' . trim($page['uri'], '/') . '/';
                    $html .= $isSubmenu ? '<a class="dropdown-item" href="' . $href . '">' : '<li class="nav-item"><a class="nav-link" href="' . $href . '">';
                    $html .= $page['title'];
                    $html .= $isSubmenu ? '</a>' : '</a></li>';
                }
            }

            $html .= $isSubmenu ? '</div>' : '</ul>';

            return $html;
        }

        public function buildMenuPrimary()
        {
            echo $this->buildHtmlMenu($this->pageTree);
        }
    }
}




/*
// *** COMPONENTS ***
$componentData = DB::query("
    SELECT 
        component.name AS componentName,
        pageComponent.content_id AS contentId,
        pageComponent.component_order AS componentOrder,
        pageComponent.page_id AS pageId,
        pageComponent.id AS id
    FROM 
        pages AS page
    JOIN 
        page_components AS pageComponent ON page.id = pageComponent.page_id
    JOIN 
        components AS component ON pageComponent.component_id = component.id
    WHERE 
        page.uri = %s
    ORDER BY 
        pageComponent.component_order", $urls);




// Kontrola, zda existují komponenty pro dané URI
if (!empty($componentData)) {
    foreach ($componentData as $data) {
        // Získání obsahu pro daný content_id
        $contentData = DB::queryFirstRow("SELECT * FROM page_contents WHERE id = %i", $data['contentId']);
        
        // Pokud je nalezen obsah, připojíme ho k datům komponenty
        if ($contentData) {
            $page_content = $contentData;
            
        }

        //var_dump($data);
        echo "Id: <b>{$data['id']}</b> Page id: <b>{$data['pageId']}</b> Order: <b>{$data['componentOrder']}</b> Komponent: <b>{$data['componentName']}</b> Contents id: <b>{$page_content['id']}</b>";

        // Dynamické načtení PHP souborů komponent
        $filePath = "components/" . $template . "/" . $data['componentName'] . ".php";

        // Kontrola, zda soubor existuje
        if (file_exists($filePath)) {
            require $filePath;
        } else {
            echo "Komponenta <b>{$data['componentName']}</b> neexistuje pro šablonu {$template}</b> kterou používáte.";
        }
    }
} else{

// Stránka nenalezena - 404
    header("HTTP/1.1 404 Not Found");
    require_once "components/"  . $template . "/head.php";
    require_once "components/"  . $template . "/navigation.php";
    require_once "components/"   . $template . "/404.php";
    require_once "components/"  . $template . "/footer.php";
}

// *** end COMPONENTS ***

*/



/*
$base_path = '';
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$uri = str_replace($base_path, '', $uri);

$base_url = "https://" . $_SERVER['HTTP_HOST'] . "/";
$base_url = "https://" . $_SERVER['SERVER_NAME'] . "/";

echo '<pre>'; // Formátování pro lepší čitelnost v prohlížeči
print_r($results);
echo '</pre>';

page je alias pro tabulku pages, což představuje jednotlivé stránky na vašem webu.
pageComponent je alias pro tabulku page_components, která slouží jako spojovací tabulka mezi stránkami a komponentami, indikuje, které komponenty se mají zobrazit na kterých stránkách.
component je alias pro tabulku components, což jsou samotné komponenty, které mohou být na stránkách zobrazeny.
componentName je alias pro sloupec name z tabulky components, který zde používáme pro jednodušší odkazování v PHP kódu.
V tomto dotazu:

JOIN klauzule spojují tyto tabulky na základě jejich relací definovaných pomocí primárních a cizích klíčů. Například page.id = pageComponent.page_id spojuje tabulku stránek s tabulkou vazeb stránek a komponent podle ID stránky.
WHERE page.uri = ? filtruje výsledky dotazu tak, aby odpovídaly stránce s určitým URI. Zástupný symbol ? je placeholder, do kterého se dynamicky vloží hodnota URI při provádění dotazu.
ORDER BY pageComponent.component_order určuje řazení výsledků dotazu podle pořadí komponent na stránce, což umožňuje zobrazit komponenty v požadovaném pořadí.

// *** SQL NAVIGATION ***
$sql_pages = "SELECT id, title, uri, parent_id FROM pages WHERE visible_in_menu = TRUE ORDER BY parent_id ASC, menu_order ASC";
$stmt_pages = $conn->prepare($sql_pages);
$stmt_pages->execute();
$pages = $stmt_pages->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt_pages->close();

// *** COMPONENTS ***
$sql = "SELECT component.name AS componentName
FROM pages AS page
JOIN page_components AS pageComponent ON page.id = pageComponent.page_id
JOIN components AS component ON pageComponent.component_id = component.id
WHERE page.uri = ?
ORDER BY pageComponent.component_order";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $urls); // Přidání urls jako parametru pro filtraci
$stmt->execute();
$components = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();

/*$components = DB::query("
    SELECT component.name AS componentName
    FROM pages AS page
    JOIN page_components AS pageComponent ON page.id = pageComponent.page_id
    JOIN components AS component ON pageComponent.component_id = component.id
    WHERE page.uri = %s
    ORDER BY pageComponent.component_order", $urls);
    
    var_dump($components);
*/
