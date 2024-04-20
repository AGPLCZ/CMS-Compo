<?php

namespace Compo\Rendering;

use Compo\Navigation\UrlManager;
use Compo\Navigation\MenuManager2;
use Compo\Registry;
use DB;
use Compo\Admin\Auth\Auth;


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
    private $language = 'cz';

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

        if ($this->urls == null) {
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
        $this->componentData = DB::query("SELECT 
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
    ", $this->urls);

        if (empty($this->componentData)) {
            $this->render404();
        }
    }


    public function renderComponentEditButton($contents_id, $column, $language)
    {
        $form = '<form method="POST" action="' . $this->url . '/admin/editContent.php" style="display: inline;">';
        $form .= '<input type="hidden" name="akce" value="edit">';
        $form .= '<input type="hidden" name="contents_id" value="' . htmlspecialchars($contents_id) . '">';
        $form .= '<input type="hidden" name="column" value="' . htmlspecialchars($column) . '">';
        $form .= '<input type="hidden" name="language" value="' . htmlspecialchars($language) . '">';
        $form .= '<button type="submit" class="btn btn-primary" style="padding: 7px 6px 7px 7px; margin-left: 10px; margin-top: 0px; margin-bottom: 0px; font-size: 12px;"><i class="fa fa-edit"></i></button>';
        $form .= '</form>';

        return $form;
    }

    public function getContentOnly($field)
    {
        if (isset($this->page_content[$field])) {
            echo htmlspecialchars($this->page_content[$field]);
        }
    }

    public function getEditButton($field)
    {
        echo $this->renderComponentEditButton($this->page_content['contents_id'], $field, $this->language);
    }

    public function getContent($field)
    {
        if (isset($this->page_content[$field])) {
            echo htmlspecialchars($this->page_content[$field]) . $this->renderComponentEditButton($this->page_content['contents_id'], $field, $this->language);
        }
    }


    public function setLanguage($lang)
    {
        $this->language = $lang;
    }

    public function getLocalizedContent($contents_id, $field, $language = 'cz')
    {
        $sql = "SELECT content FROM content_localizations WHERE contents_id = %i AND field_name = %s AND language = %s";
        return DB::queryFirstField($sql, $contents_id, $field, $language);
    }


    public function CreateContentButon($pages_id,$order)
    {

        $form = '<section>
        <div class="container">
            <div class="inner-container-small text-center mb-4 mb-md-6">
        ';
        $form .= '<form method="POST" action="' . $this->url . '/admin/createContent.php">';
        $form .= '<input type="hidden" name="pages_id" value="' . htmlspecialchars($pages_id) . '">';
        $form .= '<input type="hidden" name="order" value="' . htmlspecialchars($order) . '">';
        $form .= '<button type="submit" name="submitPageRender" class="btn btn-primary">+</button>';
        $form .= '</form>';
        $form .= '</div></div>
    </section>
    <section class="pt-0">
	<div class="container">
		<div class="row g-4 g-sm-6" style="margin-bottom: 150px;">
		</div>
	</div>
</section>

    ';

        return $form;
    }

    public function renderComponents()
    {
        if (!empty($this->componentData)) {
            foreach ($this->componentData as $data) {
                $contentData = DB::queryFirstRow("SELECT * FROM contents WHERE contents_id = %i", $data['contentId']);

                if ($contentData) {
                    $page_content = $contentData;

                    //echo pro ladění systému
                    //echo "Components id: <b>{$data['componentsId']}</b> Page id: <b>{$data['pageId']}</b> Component Order: <b>{$data['componentOrder']}</b> Component name: <b>{$data['componentName']}</b> Contents id: <b> {$data['contentId']}</b>";


                    // Načtení překladů pro dané komponenty
                    foreach ($contentData as $field => $value) {
                        // kontrola, zda je pole 'contentX'
                        if (strpos($field, 'content') === 0) {
                            // Získání lokalizovaného obsahu z databáze
                            $localizedContent = $this->getLocalizedContent($data['contentId'], $field, $this->language);
                            // Přepis původního obsahu, pokud existuje překlad
                            $this->page_content[$field] = $localizedContent ?: $value;
                        }
                    }
                    $filePath = "components/" . $this->template . "/" . $data['componentName'] . ".php";
                    if (file_exists($filePath)) {
                        require $filePath;
                    } else {
                        echo "Component <b>{$data['componentName']}</b> does not exist for template <b>{$this->template}</b>.";
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


    // public function renderComponentsOld()
    // {

        
    //     if (!empty($this->componentData)) {
    //         foreach ($this->componentData as $data) {
                
    //             $contentData = DB::queryFirstRow("SELECT * FROM contents WHERE contents_id = %i", $data['contentId']);

    //             if ($contentData) {
    //                 $page_content = $contentData;
    //                 $this->page_content = $page_content;

    //               //  echo "Components id: <b>{$data['componentsId']}</b> Page id: <b>{$data['pageId']}</b> Component Order: <b>{$data['componentOrder']}</b> Component name: <b>{$data['componentName']}</b> Contents id: <b> {$data['contentId']}</b>";
                    
                    
    //                 $filePath = "components/" . $this->template . "/" . $data['componentName'] . ".php";

    //                 if (file_exists($filePath)) {
    //                     require $filePath;
    //                 } else {
    //                     echo "Komponenta <b>{$data['componentName']}</b> neexistuje pro šablonu <b>{$this->template}</b>.";
    //                 }
    //             }
    //         }
    //     }
    // }
