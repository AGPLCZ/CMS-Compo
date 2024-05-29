<?php

namespace Compo\Rendering;

use Compo\Navigation\UrlManager;
use Compo\Registry;
use DB;
use Compo\Admin\Auth\Auth;
use Compo\Admin\Auth\FlashManager;
use Compo\Admin\Content\CreateContent;
use Compo\Admin\Content\EditContent;
use Compo\Admin\Components\EditComponentsOrder;
use Compo\Admin\Components\DeleteComponents;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;


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

        if ($this->urlss == "editContent") {
            $editContent = new EditContent();
            // $editContent->handleRequest();
            $editContent->inPlaceEditing();
        }

        if (($this->urlss == "editContentt")){
            $editContent = new EditContent();
            $editContent->handleRequest();
var_dump($form);
            // require_once "admin/header.php";
            // require_once "admin/editContent.php";
            // require_once "admin/footer.php";
        }



        if ($this->urlss == "EditComponentsOrder") {
            $this->isLogin();
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
