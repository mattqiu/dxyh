<?php
namespace Home\Controller;

use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $ip = get_client_ip(1);
        M("Visit")->add(array("ip"=>$ip, "create_time"=>time()));

    }
}