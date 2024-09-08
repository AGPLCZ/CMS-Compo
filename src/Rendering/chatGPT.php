<?php

namespace Compo\Rendering;

use Compo\Navigation\UrlManager;
use Compo\Navigation\MenuManager2;
use Compo\Registry;
use Compo\Admin\Auth\Auth;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Compo\Models\Component;

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

        $this->language = $_SESSION['language'] ?? 'cs';
        $this->edit = isset($_SESSION['tool']) && $_SESSION['tool'] === "on";
        $this->isLogin = $this->auth->isLoggedIn();
    }

    private function loadComponentData()
    {
        // ORM dotaz pomocí Eloquent
        $this->componentData = Component::join('list_components', 'components.list_components_id', '=', 'list_components.list_components_id')
            ->join('pages', 'pages.pages_id', '=', 'components.pages_id')
            ->where('pages.uri', $this->urls)
            ->select('list_components.name as componentName', 'components.contents_id', 'components.order', 'components.pages_id', 'components.components_id')
            ->orderBy('components.order')
            ->get();

        if ($this->componentData->isEmpty()) {
            $this->render404();
        }
    }

    public function setLanguage($lang)
    {
        $this->language = $lang;
    }

    public function getLocalizedContent($contents_id, $field, $language = 'cs')
    {
        // Pokud chceš přejít na Eloquent, bylo by třeba i tuto část přepsat
        $sql = "SELECT content FROM content_localizations WHERE contents_id = %i AND field_name = %s AND language = %s";
        return DB::queryFirstField($sql, $contents_id, $field, $language);
    }

    public function renderComponents()
    {
        $componentRenderData = [];
        
        foreach ($this->componentData as $data) {
            // Nyní pracuješ s Eloquent objektem, k datům přistupuješ pomocí getterů
            $contentData = DB::queryFirstRow("SELECT * FROM contents WHERE contents_id = %i", $data->contents_id);

            if ($contentData) {
                $this->page_content = $contentData;

                foreach ($contentData as $field => $value) {
                    if (strpos($field, 'content') === 0) {
                        $localizedContent = $this->getLocalizedContent($data->contents_id, $field, $this->language);
                        $componentRenderData[$field] = $localizedContent ?: htmlspecialchars($value);
                    }
                }

                $this->onEdit = ($this->auth->isLoggedIn() && $this->edit);

                $twigName = $data->componentName . ".twig";
                $templateTwig = $this->twig->load($twigName);
                echo $templateTwig->render([
                    'contentData' => $componentRenderData,
                    'url' => $this->url,
                    'menu' => $this->menu,
                    'language' => $this->language,
                    'onEdit' => $this->onEdit,
                    'contentsId' => $data->contents_id,
                    'componentsId' => $data->components_id,
                    'pageId' => $data->pages_id,
                    'componentOrder' => $data->order,
                    'componentName' => $data->componentName,
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
