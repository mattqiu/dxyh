<?php
namespace Home\Controller;


class IndexController extends CommonController {
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $ip = get_client_ip(1);
        M("Visit")->add(array("ip"=>$ip, "create_time"=>time()));

        $data['websiteImage'] = D("WebsiteImage")->getHomeList();
        $data['coptic'] = D("Coptic")->getHomeList();
        $data['copticType'] = D("CopticType")->getHomeList();
        $data['activity'] = D("Activity")->getHomeList();

        $this->assign($data);
        $this->display();
    }

    public function login(){
        vendor("API.QQ.qqConnectAPI");
        $qc = new \QC();
        $qc->qq_login();
    }

    public function register(){

    }

}