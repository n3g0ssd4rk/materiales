<?php
  class Controlador {
    static public function ctrIndex(){

      include "vistas/plantilla.php";

    }

    static public function ctrHtmlDom(){

      $respuesta = Modelo::mdlHtmlDom();
      return $respuesta;
    }
  }

?>
