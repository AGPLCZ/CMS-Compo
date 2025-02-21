<?php

namespace Compo\Rendering;

use Compo\Navigation\UrlManager;
use Compo\Registry;
use DB;
use Compo\Admin\Auth\Auth;
use Compo\Admin\Auth\FlashManager;
use Compo\Admin\Content\CreateContent;
use Compo\Admin\Content\CreateContentWhere;
use Compo\Admin\Content\EditContent;
use Compo\Admin\Components\EditComponentsOrder;
use Compo\Admin\Components\EditComponentsListContentsName;
use Compo\Admin\Components\DeleteComponents;
use Compo\Admin\Components\Page;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Compo\Admin\Content\AssignContent;


final class AdminRenderer
{
    private $template;
    private $componentData;
    private $urls;
    private $urlss;
    private $urlsss;
    private $urlManager;
    private $base_url;
    private $slash;
    public $baseUrl;
    public $url;
    public $urlName;
    public $page_content;
    private $auth;
    private $twig;



    public function __construct()
    {

        //Twig
        // Nastavení cesty k šablonám
        $loader = new FilesystemLoader('admin/templates/');

        // Vytvoření instance Twig Environment
        $this->twig = new Environment($loader);

        // Nyní můžete renderovat Twig šablony
        // Příklad: echo $this->twig->render('index.twig', ['name' => 'John']);
        // end Twig




        $this->auth = new Auth();


        $this->urlManager = new UrlManager();
        $this->urls = $this->urlManager->getSegment(0);
        $this->urlss = $this->urlManager->getSegment(1);
        $this->urlsss = $this->urlManager->getSegment(2);
        $this->slash = $this->urlManager->getSegmentSlash();

        $this->urls;

        if ($this->urlss == null) {
            $this->urlss = "index";
        }

        $this->url = $this->urlManager->getUrl();
        $this->urlName = $this->urlManager->getUrlName();

        $this->auth = new Auth();
    }


    private function isLogin()
    {

        if (!$this->auth->isLoggedIn()) {
            $this->auth->logout();
            $this->auth->redirect('login/');
        }
    }

    public function renderComponents()
    {



        if ($this->urlss == "index") {
            require_once "admin/header.php";
            require_once "admin/components.php";
            require_once "admin/footer.php";
        }
        if ($this->urlss == "components") {
            require_once "admin/header.php";
            require_once "admin/components.php";
            require_once "admin/footer.php";
        }

        if ($this->urlss == "contentList") {
            require_once "admin/header.php";
            require_once "admin/contentList.php";
            require_once "admin/footer.php";
        }

        if ($this->urlss == "assignContent.php") {
            require_once "admin/header.php";
            $assignContent = new AssignContent();
            $formData = $assignContent->getFormData();
            require_once "admin/assignContent.php";
            require_once "admin/footer.php";
        }



        if ($this->urlss == "viewContentDetails") {
            require_once "admin/header.php";
            require_once "admin/viewContentDetails.php";
            require_once "admin/footer.php";
        }

        if ($this->urlss == "pages") {
            require_once "admin/header.php";
            require_once "admin/pages.php";
            require_once "admin/footer.php";
        }
        if ($this->urlss == "login") {
            require_once "admin/login.php";
        }
        if ($this->urlss == "email") {
            require_once "admin/email.php";
        }
        if ($this->urlss == "reset") {
            require_once "admin/reset.php";
        }

        if ($this->urlss == "createContent") {
            $createContent = new CreateContent();
            $formData = $createContent->handleRequest();
            $components = $createContent->selectListComponents();
            require_once "admin/header.php";
            require_once "admin/createContent.php";
            require_once "admin/footer.php";
        }
        if ($this->urlss == "createContentWhere") {
            $createContent = new CreateContentWhere();
            $formData = $createContent->handleRequest();
            $components = $createContent->selectListComponents();
            $pages = $createContent->getPages(); // Přidáno pro správné načtení stránek
            require_once "admin/header.php";
            require_once "admin/createContentWhere.php"; // Ujisti se, že tento soubor existuje
            require_once "admin/footer.php";
        }

        if ($this->urlss == "createPage") {
            $createPage = new Page();
            $formData = $createPage->getFormData();
            $pages = $createPage->getPages(); // Pro seznam nadřazených stránek
            require_once "admin/header.php";
            require_once "admin/createPage.php";
            require_once "admin/footer.php";
        }


        if ($this->urlss == "editComponentsListContentsName") {
            $createPage = new Page();
            $editComponent = new EditComponentsListContentsName();
            $formData = $editComponent->handleRequest();
            require_once "admin/header.php";
            require_once "admin/editComponentsListContentsName.php";
            require_once "admin/footer.php";
        }



        if ($this->urlss == "editContent") {
            $editContent = new EditContent();
            // $editContent->handleRequest();
            $editContent->inPlaceEditing();
        }

        if (($this->urlss == "editContentt")) {
            $editContent = new EditContent();
            $formData = $editContent->handleRequest();
            require_once "admin/header.php";
            require_once "admin/editContent.php";
            require_once "admin/footer.php";
        }




        if ($this->urlss == "EditComponentsOrder") {
            $EditComponentsOrder = new EditComponentsOrder();
            $formData = $EditComponentsOrder->handleRequest();

            if ($formData) {
                $url = $this->url;
                echo $this->twig->render('header.twig', ['url' => $url]);
                echo $this->twig->render('EditComponentsOrder.twig', ['formData' => $formData]);
                require_once "admin/footer.php";
            }

            //require_once "admin/EditComponentsOrder.php";
            require_once "admin/footer.php";
        }


        if ($this->urlss == "deleteComponets") {
            $deleteComponents = new DeleteComponents();
            $deleteComponents->deleteComponents();
        }
    }



    public function __toString()
    {
        // Implementace, pokud je potřeba
        return '';
    }
}
