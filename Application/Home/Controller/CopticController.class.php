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
        $hotCoptic = M("Coptic")->where(array("referral"=>1,"isdisplay"=>2))->field('id,coptic_title,coptic_cover')->order(array("create_time"=>"desc"))->select();
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
        /*if (empty(session('uid'))) {
            redirect(U("Public/login"));
        }*/
        $Model = new \Think\Model();
        $Model->execute("update dxyh_coptic set browse_volume = browse_volume+1 where id={$_GET['id']}");

        $data['rows'] = D("Coptic")->getCopticDetails();
        if (session('uid')){
            $data['checkLikes'] = M("Likes")->where(array("uid"=>session("uid"), "coptic_id"=>$_GET['id']))->count();
            $data['checkStoreUp'] = M("Collection")->where(array("uid"=>session("uid"), "coptic_id"=>$_GET['id']))->count();
        }
        $data['comment'] = D("Comment")->getCopticComment();
        //var_dump($data['comment']);
        $this->assign($data);
        $this->display("scienceDetail");
    }

    /**
     * 移动端滚动翻页获取数据
     */
    public function copticJsonData(){
        $data = D("Coptic")->getList();
        if ($data['rows']){
            $result = array('code'=>0, 'data'=>$data['rows']);
        }else{
            $result = array('code'=>1, 'data'=>$data['rows']);
        }
        echo json_encode($result);
    }

    /**
     * 科普文章收藏与点赞切换功能
     */
    public function copticKeepLikes(){
        if (empty(session('uid'))){
            exit(json_encode(array('status'=>2,'info'=>'您还未登陆','url'=>U("Public/login",array('callbackUrl'=>$_POST['callbackUrl'])))));
        }
        $requset = I('post.');
        if (isset($requset['type'])){
            if ($requset['type'] == 'keep'){
                D("Collection")->changeKeep();
            }elseif ($requset['type'] == 'likes'){
                D("Likes")->changeLikes();
            }
        }
    }

    /**
     * 评论添加与回复功能
     */
    public function copticComment(){
        if (empty(session('uid'))){
            exit(json_encode(array('code'=>2,'msg'=>'您还未登陆','url'=>U("Public/login",array('callbackUrl'=>$_POST['callbackUrl'])))));
        }
        $data = D("Comment")->copticComment();
        echo json_encode($data);
    }


    /**
     * 评论点赞功能
     */
    public function commentLikes(){
        if (empty(session('uid'))){
            exit(json_encode(array('code'=>2,'msg'=>'您还未登陆','url'=>U("Public/login",array('callbackUrl'=>$_POST['callbackUrl'])))));
        }
        $data = D("CommentLikes")->commentLikes();
        echo json_encode($data);
    }
}