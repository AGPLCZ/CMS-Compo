<?php

namespace Compo\Rendering;

use Compo\Navigation\UrlManager;
use Compo\Navigation\MenuManager2;
use Compo\Registry;
use DB;

final class PageRenderer
{
    private $template;
    private $componentData;
    private $urls;
    private $urlss;
    private $urlManager;
    private $base_url;
    private $menu;
    private $menuManager;
    private $slash;
    public $baseUrl;
    public $url;
    public $urlName;
    public $page_content;

    const COMPONENT_QUERY = "
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
        p.uri = %s
    ORDER BY 
        c.order
    ";

    public function __construct($template)
    {

        if (empty($template)) {
            throw new \InvalidArgumentException("Template nesmí být prázdný");
        }

        $this->template = $template;

        $this->urlManager = new UrlManager();
        $this->urls = $this->urlManager->getSegment(0);
        $this->urlss = $this->urlManager->getSegment(1);
        $this->slash = $this->urlManager->getSegmentSlash();

        if ($this->urls === null) {
            $this->urls = "index";
        }

        $this->url = $this->urlManager->getUrl();
        $this->urlName = $this->urlManager->getUrlName();


        $this->menuManager = new MenuManager2();
        $this->menu = $this->menuManager->buildMenuPrimary();


        $this->loadComponentData();
    }


    private function loadComponentData()
    {
        $this->componentData = DB::query(self::COMPONENT_QUERY, $this->urls);

        if (empty($this->componentData)) {
            $this->render404();
        }
    }

   public function renderComponentEditButton($column) {
    $form = '<form method="POST" action="' . $this->url . '/admin/edit.php" style="display: inline;">'; // Inline styl pro vyhnutí se zalomení
    $form .= '<input type="hidden" name="akce" value="edit">';
    $form .= '<input type="hidden" name="contents_id" value="' . htmlspecialchars($this->page_content['contents_id']) . '">';
    $form .= '<input type="hidden" name="column" value="' . htmlspecialchars($column) . '">';
    $form .= '<button type="submit" class="btn btn-primary" aria-label="Edit" style="padding: 2px 4px; margin-left: 10px; margin-top: 0px; margin-bottom: 0px; font-size: 10px; border:0px;"><i class="fa fa-edit"></i></button>';
    $form .= '</form>';

    return $form;



    }

    public function renderComponents()
    {

        
        if (!empty($this->componentData)) {
            foreach ($this->componentData as $data) {
                $contentData = DB::queryFirstRow("SELECT * FROM contents WHERE contents_id = %i", $data['contentId']);

                if ($contentData) {
                    $page_content = $contentData;
                    $this->page_content = $page_content;

                  //  echo "Components id: <b>{$data['componentsId']}</b> Page id: <b>{$data['pageId']}</b> Component Order: <b>{$data['componentOrder']}</b> Component name: <b>{$data['componentName']}</b> Contents id: <b> {$data['contentId']}</b>";
                    
                    
                    $filePath = "components/" . $this->template . "/" . $data['componentName'] . ".php";

                    if (file_exists($filePath)) {
                        require $filePath;
                    } else {
                        echo "Komponenta <b>{$data['componentName']}</b> neexistuje pro šablonu <b>{$this->template}</b>.";
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
        require_once "components/"  . $this->template . "/404.php";
        require_once "components/"  . $this->template . "/footer.php";
        exit; // Zajistíme, aby se další kód neprovedl po zobrazení 404 stránky
    }

    public function __toString()
    {
        // Implementace, pokud je potřeba
        return '';
    }
}
