<?php
Class TestController extends Yaf_Controller_Abstract{
    public function indexAction(){
        A::ins()->abc();
        (new AModel())->abc();
        echo 111;
    }
}
