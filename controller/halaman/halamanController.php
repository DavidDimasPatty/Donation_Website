<?php
require_once "controller/services/view.php";



class halamanController{

    public function view_halaman(){

        return View::createView2('halaman/HalamanDepan.php');

    }



}



?>

