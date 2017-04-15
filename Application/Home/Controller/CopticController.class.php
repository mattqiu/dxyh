<?php
/**
 * 科普中心
 * User: DarkVisitor
 * Date: 2017/4/7
 * Time: 14:39
 */

namespace Home\Controller;


class CopticController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
        $data['hotCoptic'] = M("Coptic")->where(array("referral"=>1))->order(array("create_time"=>"desc"))->select();
    }

    public function index(){
        $data['rows'] = D("Coptic")->getList();

        $data['copticType'] = M("CopticType")->order(array("sort"=>"desc","create_time"=>"desc"))->select();
        $this->display("science");
    }

    public function details(){
        $data['rows'] = D("Coptic")->getCopticDetails();
        $data['checkLikes'] = M("Comment")->where(array("uid"=>session("uid"), "coptic_id"=>$_GET['id'], "status"=>1))->find();
        $data['checkStoreUp'] = M("Collection")->where(array("uid"=>session("uid"), "coptic_id"=>$_GET['id']))->find();
        $data['comment'] = D("Comment")->getCopticComment();
        $this->details("scienceDetail");
    }





}