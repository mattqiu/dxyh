<?php
/**
 * 用户
 * User: DarkVisitor
 * Date: 2017/3/27
 * Time: 22:32
 */

namespace Admin\Model;

use Think\Model;
use Think\Page;
class UserModel extends BaseModel
{
    public function getList(){
        $qustData = I("get.");
        $where = null;
        if (!empty($qustData['keyword'])) {
            $where['_string'] = ' (mobile like "%'.trim($qustData['keyword']).'%")  OR (nickname like "%'.trim($qustData['keyword']).'%") OR (name like "%'.trim($qustData['keyword']).'%") ';
        }
        $count = $this->countData($where);
        $page = new Page($count, C("PAGE_NUM"));
        $list = $this->getDataList($where, null, array("uid"=>"desc"), $page->firstRow, $page->listRows);
        foreach ($list as $key=>$item) {
            $list[$key]['create_time'] = dateTime($item['create_time']);
            switch ($item['sex']){
                case 0:
                    $list[$key]['sex'] = "保密";
                    break;
                case 1:
                    $list[$key]['sex'] = "男";
                    break;
                case 2:
                    $list[$key]['sex'] = "女";
                    break;
            }
        }
        $list['page'] = $page->show();
        return $list;
    }
}