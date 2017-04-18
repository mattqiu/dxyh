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
        $hotCoptic = M("Coptic")->where(array("referral"=>1))->field('id,coptic_title,coptic_cover')->order(array("create_time"=>"desc"))->select();
        $this->assign('hotCoptic', $hotCoptic);
    }

    /**
     * 科普中心
     */
    public function index(){
        $data = D("Coptic")->getList();
        $data['copticType'] = M("CopticType")->order(array("sort"=>"desc","create_time"=>"desc"))->select();
        $data['id'] = $_GET['typeId'];
        $data['keyword'] = $_GET['keyword'];

        $this->assign($data);
        $this->display("science");
    }

    /**
     * 科普详情
     */
    public function details(){
        $data['rows'] = D("Coptic")->getCopticDetails();
        $data['checkLikes'] = M("Likes")->where(array("uid"=>session("uid"), "coptic_id"=>$_GET['id']))->count();
        $data['checkStoreUp'] = M("Collection")->where(array("uid"=>session("uid"), "coptic_id"=>$_GET['id']))->count();
        $data['comment'] = D("Comment")->getCopticComment();
        //($data['comment']);
        $this->assign($data);
        $this->display("scienceDetail");
    }

    public function copticJsonData(){
        $data = D("Coptic")->getList();
        if ($data['rows']){
            $result = array('code'=>0, 'data'=>$data['rows']);
        }else{
            $result = array('code'=>1, 'data'=>$data['rows']);
        }
        echo json_encode($result);
    }





}