<?php
/**
 * 活动
 * User: DarkVisitor
 * Date: 2017/4/1
 * Time: 11:21
 */

namespace Admin\Model;

use Think\Page;
class ActivityModel extends BaseModel
{
    public $addressUrl;
    public function __construct()
    {
        parent::__construct();
        $this->addressUrl = U("Activity/index");
    }

    public function getList(){
        $qustData = I("get.");
        $where = null;
        if (!empty($qustData['typeId'])){
            $where = array("activity_type_id"=>trim($qustData['typeId']));
        }
        if (!empty($qustData['keyword'])) {
            $where["activity_name"] = array("like", "%".trim($qustData['keyword'])."%");
        }
        if (!empty($qustData['status'])){
            $where['status'] = $qustData['status'];
        }
        $join = "INNER JOIN dxyh_activity_type as at ON a.activity_type_id = at.id";
        $field = "a.id,at.type_name,a.activity_name,a.activity_start_time,a.activity_end_time,a.activity_number,a.activity_integral,a.browse_volume,a.status,a.whether_audit";
        $order = array("a.id"=>"desc");
        $count = $this->alias("a")->getJoinCount($join, $where);
        $page = new Page($count, C("PAGE_NUM"));
        $list = $this->alias("a")->getJoinDataList($join, $where, $field, $order, $page->firstRow, $page->listRows);
        foreach ($list as $key=>$item) {
            $list[$key]['activity_start_time'] = dateTime($item['activity_start_time'], 6);
            $list[$key]['activity_end_time'] = dateTime($item['activity_end_time'], 6);
            switch ($item['status']){
                case 1:
                    $list[$key]['status'] = "进行中";
                    break;
                case 2:
                    $list[$key]['status'] = "未开始";
                    break;
                case 3:
                    $list[$key]['status'] = "已结束";
                    break;
            }
            $list[$key]['attend_count'] = M("AttendActivity")->where(array('activity_id'=>$item['id']))->count();
        }
        $list['page'] = $page->show();
        return $list;
    }

    public function modify(){
        if (IS_POST){
            $request = I("post.");
            if (!isset($request['activityType']) || empty($request['activityType'])){
                message(0, "请选择活动类别");
            }
            if (!isset($request['activityName']) || empty($request['activityName'])){
                message(0, "请输入活动名称");
            }
            if (!isset($request['activityStartTime']) || empty($request['activityStartTime'])){
                message(0, "请选择活动开始时间");
            }
            if (!isset($request['activityEndTime']) || empty($request['activityEndTime'])){
                message(0, "请选择活动结束时间");
            }
            if (strtotime($request['activityStartTime']) > strtotime($request['activityEndTime'])){
                message(0, "活动结束时间不能小于活动开始时间<br>请重新选择");
            }
            if (!isset($request['enrollStartTime']) || empty($request['enrollStartTime'])){
                message(0, "请选择报名开始时间");
            }
            if (!isset($request['enrollEndTime']) || empty($request['enrollEndTime'])){
                message(0, "请选择报名结束时间");
            }
            if (strtotime($request['enrollStartTime']) > strtotime($request['enrollEndTime'])){
                message(0, "报名结束时间不能小于报名开始时间<br>请重新选择");
            }
            /*if (!isset($request['activityIntegral']) || empty($request['activityIntegral'])){
                message(0, "请输入活动积分");
            }*/
            if (!isset($request['address']) || empty($request['address'])){
                message(0, "请输入活动地址");
            }
            if (!isset($request['content']) || empty($request['content'])){
                message(0, "请输入活动内容");
            }

            $fileUrl = "./upload/activityimag/" . dateTime(time(), 4) . "/";
            import('Org.Net.FileUpload');
            $fileUp = new \FileUpload(array('filepath'=>$fileUrl));
            $data = array(
                "activity_type_id" => $request['activityType'],
                "activity_name" => $request['activityName'],
                "activity_start_time"  => strtotime($request['activityStartTime']),
                "activity_end_time" => strtotime($request['activityEndTime']),
                "enroll_start_time" => strtotime($request['enrollStartTime']),
                "enroll_end_time" => strtotime($request['enrollEndTime']),
                "activity_number" => $request['activityNumber'],
                "activity_integral" => $request['activityIntegral'],
                "address" => $request['address'],
                "content" => $request['content'],
                "referral" => $request['referral'],
                "whether_audit" => $request['whetherAudit'],
            );
            if ($request['id'] > 0){
                if ($_FILES['activityCover']['tmp_name']){
                    $url = $fileUp->UploadFile("activityCover");
                    if (empty($url)){
                        message(0, "图片上传失败！");
                    }
                    $data['activity_cover'] = $url;
                }
                $boole = $this->editData(array('id'=>$request['id']), $data);
                if ($boole !== false){
                    message(1, "编辑成功", $this->addressUrl);
                }else{
                    message(0, "编辑失败");
                }
            }else{
                if (empty($_FILES['activityCover']['tmp_name'])){
                    message(0, "请选择上传图片");
                }
                $url = $fileUp->UploadFile("activityCover");
                if (empty($url)){
                    message(0, "图片上传失败!");
                }
                $data['activity_cover'] = $url;
                $data['create_time'] = time();
                $boole = $this->addData($data);
                if ($boole){
                    message(1, "新增成功", $this->addressUrl);
                }else{
                    message(0, "新增失败");
                }
            }

        }
    }

    public function remove(){
        $id = I("get.id");
        $boole = $this->deleteData(array('id'=>$id));
        if ($boole){
            message(1, "删除成功", $this->addressUrl);
        }else{
            message(0, "删除失败");
        }
    }
}