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
    }

    public function details(){

        //$data['checkLikes'] = M("Comment")->where(array("uid"=>session("uid"), "coptic_id"=>$_GET['id'], "status"=>1))->find();
        //$data['checkStoreUp'] = M("Collection")->where(array("uid"=>session("uid"), "coptic_id"=>$_GET['id']))->find();
        $data['comment'] = D("Comment")->getCopticComment();
    }


    public function test(){
        $categories = array(
            array('id'=>1,'name'=>'电脑','pid'=>0),
            array('id'=>2,'name'=>'手机','pid'=>0),
            array('id'=>3,'name'=>'笔记本','pid'=>1),
            array('id'=>4,'name'=>'台式机','pid'=>1),
            array('id'=>5,'name'=>'智能机','pid'=>2),
            array('id'=>6,'name'=>'功能机','pid'=>2),
            array('id'=>7,'name'=>'超级本','pid'=>3),
            array('id'=>8,'name'=>'游戏本','pid'=>3),
        );
        //参考:http://www.cnblogs.com/xqschool/p/6413300.html
        print_r($this->get_attr($categories,0));
    }
    function get_attr($a,$pid){
        $tree = array();                                //每次都声明一个新数组用来放子元素
        foreach($a as $v){
            if($v['pid'] == $pid){                      //匹配子记录
                $v['children'] = $this->get_attr($a,$v['id']); //递归获取子记录
                if($v['children'] == null){
                    unset($v['children']);             //如果子元素为空则unset()进行删除，说明已经到该分支的最后一个元素了（可选）
                }
                $tree[] = $v;                           //将记录存入新数组
            }
        }
        return $tree;                                  //返回新数组
    }



}