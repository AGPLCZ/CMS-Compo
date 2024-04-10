<?php

namespace Compo\Rendering;

use DB;
use Compo\Navigation\UrlManager;



class Template
{
    public $urlManager;
    public $urls;
    public $template;
    public $result;


    public function __construct()
    {

        $this->urlManager = new UrlManager();
        $this->urls = $this->urlManager->getSegment(0);
    }

    public function TemplateName()
    {
        $this->result = DB::queryFirstRow("
            SELECT 
                p.pages_id AS pageId, 
                p.uri AS pageUri, 
                it.name AS templateName
            FROM 
                pages p
            LEFT JOIN 
                templates t ON p.pages_id = t.pages_id
            LEFT JOIN 
                installed_templates it ON t.templates_id = it.id
            WHERE 
                p.uri = %s
            ", $this->urls);

        if ($this->result) {
            if ($this->result['templateName']) {
                // Výpis id stránky, URI a jména šablony
                echo "Page ID: " . $this->result['pageId'] . ", Page URI: " . $this->result['pageUri'] . ", Template Name: " . $this->result['templateName'] . "<br>";
                return $this->template = $this->result['templateName'];
            } else {
                return $this->template = "green";
            }
        } else {
            return $this->template = "green";
        }
    }
}
