<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends BaseController {
    public function index(){

        //$this->success("测试错误弹出");
        //$this->redirect('Coptic/index');

        $this->display();
    }

    public function blank(){
        $this->display();
    }
}