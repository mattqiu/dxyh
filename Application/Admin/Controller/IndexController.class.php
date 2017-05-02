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
        $startTime = "00:00:01";
        $endTime = "23:59:59";
        $dateStart = strtotime(dateTime(time(), 2) . $startTime);
        $dateEnd = strtotime(dateTime(time(), 2) . $endTime);


        $data['commentToday'] = M("Comment")->where("create_time >= $dateStart AND create_time <= $dateEnd")->count();
        $data['addUserToday'] = M("User")->where("create_time >= $dateStart AND create_time <= $dateEnd")->count();
        $data['visitToday'] = M("Visit")->where("create_time >= $dateStart AND create_time <= $dateEnd")->count();


        $this->assign($data);
        $this->display();
    }

    public function sevenDay(){
        $startTime = "00:00:01";
        $endTime = "23:59:59";
        $sevenDayTime = array();
        for ($i=7;$i>=1;$i--){
            $sevenDayTime[] = dateTime("-" . $i . " day", 3);
        }
        $sevenDay = $sevenDayTime;
        $commentSevenAry = array();
        $addUserSevenAry = array();
        $visiSevenAry = array();

        foreach ($sevenDayTime as $key=>$value){
            $dateStart = strtotime($value . $startTime);
            $dateEnd = strtotime($value . $endTime);
            $commentSevenAry[] = M("Comment")->where("create_time >= $dateStart AND create_time <= $dateEnd")->count();
            $addUserSevenAry[] = M("User")->where("create_time >= $dateStart AND create_time <= $dateEnd")->count();
            $visiSevenAry[] = M("Visit")->where("create_time >= $dateStart AND create_time <= $dateEnd")->count();
        }

        echo json_encode(array("sevenDay"=>$sevenDay,"commentSevenAry"=>$commentSevenAry,"addUserSevenAry"=>$addUserSevenAry,"visiSevenAry"=>$visiSevenAry));
    }

    public function blank(){
        $this->display();
    }

    /**
     * 科普文章详情
     */
    public function copticDetails(){
        $data['rows'] = D('Coptic')->copticDetails();//var_dump($data['rows']['comment']);
        $this->assign($data);
        $this->display("copticDetails");
    }

    /**
     * 活动内容详情
     */
    public function activityDetails(){
        $data['rows'] = D("Activity")->getDataInfo(array('id'=>$_GET['id']));
        $data['rows']['activity_type_id'] = M("ActivityType")->where(array('id'=>$data['rows']['activity_type_id']))->field('type_name')->find()['type_name'];
        $this->assign($data);
        $this->display("activityDetails");
    }

    public function shieldComment(){
        $status = "";
        if ($_GET['status'] == 0){
            $status = 1;
        }elseif ($_GET['status'] == 0){
            $status = 0;
        }
        $boole = M("Comment")->where(array('id'=>$_GET['id']))->save(array('status' => $status));
        if ($boole){
            message(1, "操作成功");
        }else{
            message(0, "操作失败");
        }
    }
}