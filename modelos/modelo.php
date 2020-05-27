<?php
    // include 'includes/simple_html_dom.php';
    class Modelo{
        static public function mdlHtmlDom(){
            
            $html = file_get_html("https://materialesandersen.com.ar/");
            $query = $html->find('ul li');
            return $query;
        }
    }
?>
