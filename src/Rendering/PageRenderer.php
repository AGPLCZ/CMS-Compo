<?php

namespace Compo\Rendering;

use Compo\Navigation\UrlManager;
use Compo\Navigation\MenuManager2;
use Compo\Registry;
use DB;
use Compo\Admin\Auth\Auth;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

final class PageRenderer
{
    private $template;
    private $componentData;
    private $urls;
    private $urlss;
    private $urlManager;
    private $menu;
    private $menuManager;
    public $baseUrl;
    public $url;
    public $urlName;
    public $page_content;
    public $language;
    private $auth;
    private $twig;
    public $edit;
    private $isLogin;
    private $onEdit = false;

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
        $this->auth = new Auth();


        $filePathTwig = "components/" . $this->template . "/templates";
        $loader = new FilesystemLoader($filePathTwig);
        $this->twig = new Environment($loader);




        if (isset($_SESSION['language'])) {
            $this->language = $_SESSION['language'];
        } else {
            $this->language = 'cs';
        }


        if (isset($_SESSION['tool'])) {
            $tool = $_SESSION['tool'];
            if ($tool == "on") {
                $this->edit = true;
            } else {
                $this->edit = false;
            }
        } else {
            $this->edit = false;
        }
        // if (session_status() !== PHP_SESSION_ACTIVE) {
        //     $this->edit = false;
        // }


        if ($this->auth->isLoggedIn()) {
            $this->isLogin = true;
        }
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


    public function setLanguage($lang)
    {
        $this->language = $lang;
    }


    public function getLocalizedContent($contents_id, $field, $language = 'cs')
    {
        $sql = "SELECT content FROM content_localizations WHERE contents_id = %i AND field_name = %s AND language = %s";
        return DB::queryFirstField($sql, $contents_id, $field, $language);
    }


    public function renderComponents()
    {
        $componentRenderData = [];
        foreach ($this->componentData as $data) {
            $contentData = DB::queryFirstRow("SELECT * FROM contents WHERE contents_id = %i", $data['contentId']);

            if ($contentData) {
                $this->page_content = $contentData;

                // Načtení překladů pro dané komponenty
                foreach ($contentData as $field => $value) {
                    // kontrola, zda je pole 'contentX'
                    if (strpos($field, 'content') === 0) {
                        // Získání lokalizovaného obsahu z databáze
                        $localizedContent = $this->getLocalizedContent($data['contentId'], $field, $this->language);

                        $componentRenderData[$field] = $localizedContent ?: htmlspecialchars($value);


                        if (($this->auth->isLoggedIn() == false) or ($this->edit == false)) {
                            $this->onEdit = false;
                        } else {
                            $this->onEdit = true; 
                        }
                    }
                }


                $url = $this->url;
                $menu = $this->menu;

                $twigName = $data['componentName'] . ".twig";
                $templateTwig = $this->twig->load($twigName);
                echo $templateTwig->render([
                    'contentData' => $componentRenderData,
                    'url' => $url,
                    'menu' => $menu,
                    'language' => $this->language,
                    'onEdit' => $this->onEdit,
                    'contentsId' => $data['contentId'],
                    'componentsId' => $data['componentsId'],
                    'pageId' => $data['pageId'],
                    'componentOrder' => $data['componentOrder'],
                    'componentName' => $data['componentName'],
                    'isLogin' => $this->isLogin
                ]);
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
        exit;
    }
}
