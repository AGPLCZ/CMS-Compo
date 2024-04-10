<?php
namespace Compo\Rendering;
use Compo\Navigation\UrlManager; 
use Compo\Navigation\MenuManager2;
use DB;

class PageRenderer
{
    private $template;
    private $componentData;
    public $urls;
    public $urlss;
    public $urlManager;
    public $base_url;
    public $menu;
    public $menuManager;
    public $menuPrimary;


    public function __construct($template)
    {

        $this->template = $template;
      
            $this->urlManager = new UrlManager();
            $this->urls = $this->urlManager->getSegment(0);
            $this->urlss = $this->urlManager->getSegment(1);


            if ($this->urls == NULL) {
                $this->urls = "index";
            }
      
        $this->base_url = $this->urlManager->baseUrl();

       
            $this->menuManager = new MenuManager2();
            $this->menu = $this->menuManager->buildMenuPrimary();
        

        $this->loadComponentData();
    }

    private function loadComponentData()
    {
        $this->componentData = DB::query("
        SELECT 
        lc.name AS componentName,
        c.contents_id AS contentId,
        c.order AS componentOrder,
        c.pages_id AS pageId,
        c.components_id AS componentsId
    FROM 
        pages AS p
    JOIN 
        components AS c ON p.pages_id = c.pages_id
    JOIN 
        list_components AS lc ON c.list_components_id = lc.list_components_id
    WHERE 
        p.uri =  %s
    ORDER BY 
        c.order
    ", $this->urls);

        if (empty($this->componentData)) {
            $this->render404();
        }
    }


    public function renderComponents()
    {
        if (!empty($this->componentData)) {
            foreach ($this->componentData as $data) {
                // data pro require na základě tabulky components sloupce contents_id  AS contentId
                $contentData = DB::queryFirstRow("SELECT * FROM contents WHERE contents_id = %i", $data['contentId']);

                if ($contentData) {
                    $page_content = $contentData;
                    //echo $page_content["content1"]; 
                    echo "Components id: <b>{$data['componentsId']}</b> Page id: <b>{$data['pageId']}</b> Component Order: <b>{$data['componentOrder']}</b> Component name: <b>{$data['componentName']}</b> Contents id: <b> {$data['contentId']}</b>";

                    $filePath = "components/" . $this->template . "/" . $data['componentName'] . ".php";

                    if (file_exists($filePath)) {
                        require $filePath;
                    } else {
                        echo "Komponenta <b>{$data['componentName']}</b> neexistuje pro šablonu {$this->template}</b> kterou používáte.";
                    }
                }
            }
        }
    }

    private function render404()
    {
        header("HTTP/1.1 404 Not Found");
        require_once "components/"  . $this->template . "/head.php";
        require_once "components/"  . $this->template . "/navigation.php";
        require_once "components/"   . $this->template . "/404.php";
        require_once "components/"  . $this->template . "/footer.php";
        exit; // Zajistíme, aby se další kód neprovedl po zobrazení 404 stránky
    }

    public function __toString()
    {
    }
}