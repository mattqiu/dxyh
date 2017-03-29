<?php
/**
 * 权限model
 * User: DarkVisitor
 * Date: 2017/3/29
 * Time: 16:53
 */

namespace Admin\Model;

use Think\Model;
class AuthRuleModel extends BaseModel
{
    public function authTree(){
        $app = M("application")->where(array('parent_id'=>0))->field('id,app_name')->select();
        foreach ($app as $app_key=>$app_item){
            $app[$app_key]['sub_app'] = M("application")->where(array('parent_id'=>$app_item['id']))->field('id,app_name')->select();
            foreach ($app[$app_key]['sub_app'] as $key=>$item){
                $app[$app_key]['sub_app'][$key]['auth'] = $this->getDataList(array('app_id'=>$item['id']),'id,title');
            }
        }
        return $app;
    }
}