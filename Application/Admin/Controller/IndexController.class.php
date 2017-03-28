<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){

        $this->redirect('Coptic/index');
        $this->display();
    }

    public function blank(){
        $this->display();
    }
}