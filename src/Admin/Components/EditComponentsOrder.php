<?php

namespace Compo\Admin\Components;

use Compo\Navigation\UrlManager;
use DB;

class EditComponentsOrder
{
    private $urlManager;
    private $urlsss;

    public function __construct()
    {
        $this->urlManager = new UrlManager();
        $this->urlsss = $this->urlManager->getSegment(2);
    }

    public function handleRequest()
    {
           if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['akce'])) {
            if ($_POST['akce'] === 'edit') {
                return $this->handleEdit();
            } elseif ($_POST['akce'] === 'update') {
                $this->handleUpdate();
            }
        }
        return null;
    }

    private function handleEdit()
    {
        $components_id = $_POST['components_id'];
        $data = DB::queryFirstRow("SELECT * FROM components WHERE components_id=%i", $components_id);
        return [
            'action_url' => htmlspecialchars($this->urlManager->getFullUrl()),
            'back_url' => htmlspecialchars($this->urlManager->getBackPage()),
            'components_id' => htmlspecialchars($components_id),
            'order' => htmlspecialchars($data['order'])
        ];

       
        }

    private function handleUpdate()
    {
        $components_id = (int)$_POST['components_id'];
        $back_url = $_POST['back_url'];
        $order = $_POST['order'];
        $order = (int)$order;
        DB::update('components', ['order' => $order], "components_id=%i", $components_id);
        header("Location: " . htmlspecialchars($back_url));
        exit;
        
        

    }
}

