<?php
/**
 * 收藏
 * User: DarkVisitor
 * Date: 2017/4/2
 * Time: 17:13
 */

namespace Admin\Model;

use Think\Page;
class CollectionModel extends BaseModel
{
    public function getList(){
        $qustData = I("get.");
        $where = null;
        if (!empty($qustData['keyword'])) {
            $where['_string'] = ' (u.nickname like "%'.trim($qustData['keyword']).'%") OR (u.name like "%'.trim($qustData['keyword']).'%") OR (dc.coptic_title like "%'.trim($qustData['keyword']).'%") ';
        }
        if (!empty($qustData['typeId'])){
            $where['dct.id'] = $qustData['typeId'];
        }

        $join = array("INNER JOIN dxyh_user as u ON c.uid=u.uid","INNER JOIN dxyh_coptic as dc ON dc.id=c.coptic_id","INNER JOIN dxyh_coptic_type as dct ON dct.id=c.coptic_type_id");

        $count = $this->alias("c")->getJoinCount($join, $where);
        $page = new Page($count, C("PAGE_NUM"));
        $field = "c.id,c.create_time,u.mobile,u.nickname,u.name,u.sex,dc.coptic_title,dct.category_name";
        $list = $this->alias("c")->getJoinDataList($join, $where, $field, null, $page->firstRow, $page->listRows);
        //var_dump($this->getLastSql());
        foreach ($list as $key=>$item){
            $list[$key]['create_time'] = dateTime($item['create_time']);
        }
        $list['page'] = $page->show();
        return $list;
    }
}