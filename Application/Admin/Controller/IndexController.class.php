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
        $sevenDayTime = array();
        $sevenDayString = "";
        for ($i=1;$i<=7;$i++){
            $sevenDayTime[] = dateTime("-" . $i . " day", 3);
        }
        var_dump(json_encode($sevenDayTime));

        $data['commentToday'] = M("Comment")->where("create_time >= $dateStart AND create_time <= $dateEnd")->count();
        $data['addUserToday'] = M("User")->where("create_time >= $dateStart AND create_time <= $dateEnd")->count();
        $data['visitToday'] = M("Visit")->where("create_time >= $dateStart AND create_time <= $dateEnd")->count();
        $data['sevenDay'] = json_encode($sevenDayTime);

        $this->assign($data);
        $this->display();
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
        $this->display();
    }

    /**
     * 活动内容详情
     */
    public function activityDetails(){
        $data['rows'] = D("Activity")->getDataInfo(array('id'=>$_GET['id']));
        $data['rows']['activity_type_id'] = M("ActivityType")->where(array('id'=>$data['rows']['activity_type_id']))->field('type_name')->find()['type_name'];
        $this->assign($data);
        $this->display();
    }

    public function shieldComment(){
        $boole = M("Comment")->where(array('id'=>$_GET['id']))->save(array('status' => 0));
        if ($boole){
            message(1, "屏蔽成功");
        }else{
            message(0, "屏蔽失败");
        }
    }
}