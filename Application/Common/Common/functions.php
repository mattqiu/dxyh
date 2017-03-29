<?php
/**
 * 应用公共函数库
 * User: DarkVisitor
 * Date: 2017/3/29
 * Time: 10:07
 */


function message($status=1, $message, $jumpUrl=''){
    $data['info']   =   $message;
    $data['status'] =   $status;
    $data['url']    =   $jumpUrl;
    $this->ajaxReturn($data);
}

function dateTime($dateTime, $status = 0){
    switch ($status){
        case 0:
            return date("Y-m-d H:i:s", $dateTime);
        case 1:
            return date("Y-m-d H:i:s", strtotime($dateTime));
        case 2:
            return date("Y-m-d", $dateTime);
        case 3:
            return date("Y-m-d", strtotime($dateTime));
    }
}

function Judgement($data="", $value=0, $result="", $type='eq'){
    if (empty($data)){
        return false;
    }
    if (empty($result)){
        $result = true;
    }
    switch ($type){
        case 'eq':
            if ($data == $value){
                return $result;
            }else{
                return false;
            }
            break;
        case 'lt':
            if ($data < $value){
                return $result;
            }else{
                return false;
            }
            break;
        case 'gt':
            if ($data > $value){
                return $result;
            }else{
                return false;
            }
    }
}

/**
 * 权限判断选中函数
 * @param string $rules 所有拥有权限
 * @param int $tell 权限
 */
function checkboxTell($rules="", $tell=0){
    if ($rules){
        $rules = explode(',', $rules);
        if (in_array($tell, $rules)){
            return "checked";
        }
    }
}

function parentCheckboxTell($rule="", $tell=array()){
    if (!empty($rule) && $tell){
        $rule = explode(',', $rule);
        $auth = array();
        foreach($tell as $k=>$val){
            foreach ($val['auth'] as $key=>$item){
                $auth[] = $item['id'];
            }
        }
        foreach ($rule as $key=>$item){
            if (in_array($item, $auth)){
                return "checked";
            }
        }
    }
}


function array_column_cube($list=array(), $keys=""){
    if ($list){
        static $arr = array();
        foreach ($list as $key=>$item){
            if ($key == $keys){
                if (is_array($item)){
                    array_column_cube($item, $keys);
                }else{
                    $arr[] = $item;
                }
            }
        }
        return $arr;
    }
}