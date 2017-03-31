<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function __construct()
    {
        parent::__construct();
        if (empty(session("aid"))){
            redirect(U("Public/login"));
        }
    }

    public function index(){
        $this->display();
    }

    public function blank(){
        $this->display();
    }
}