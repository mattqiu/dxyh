<?php
/**
 * 应用公共函数库
 * User: DarkVisitor
 * Date: 2017/3/29
 * Time: 10:07
 */

/**
 * Thinkphp的ajaxReturn函数简化只返回json数据
 * @param int $status   状态
 * @param $message 提示信息
 * @param string $jumpUrl 页面跳转地址
 */
function message($status=1, $message, $jumpUrl=''){
    $data['info']   =   $message;
    $data['status'] =   $status;
    $data['url']    =   $jumpUrl;
    // 返回JSON数据格式到客户端 包含状态信息
    header('Content-Type:application/json; charset=utf-8');
    exit(json_encode($data,0));
}

function dateTime($dateTime, $status = 0){
    if (empty($dateTime)) return false;
    switch ($status){
        case 0:
            return date("Y-m-d H:i:s", $dateTime);
        case 1:
            return date("Y-m-d H:i:s", strtotime($dateTime));
        case 2:
            return date("Y-m-d", $dateTime);
        case 3:
            return date("Y-m-d", strtotime($dateTime));
        case 4:
            return date("Ymd", $dateTime);
        case 5:
            return date("Ymd", strtotime($dateTime));
        case 6:
            return date("Y-m-d H:i", $dateTime);
        case 7:
            return date("Y-m-d H:i", strtotime($dateTime));
    }
}

/**
 * 比较函数
 * @param string $data 比较值
 * @param int $value 被比较值
 * @param string $result    返回值
 * @param string $type  比较类型
 * @return bool|string  返回bool或给定的返回值
 */
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
        case 'neq':
            if ($data != $value){
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



function upload($file=array(), $file_url=""){
    if (!isset($file['fileImage']['tmp_name'])){
        return "文件不存在";
    }

}

/**
 * 导出excel
 * @param string $title 标题
 * @param array $column 列标题
 * @param array $data 数据
 */
function export($title="", $column=array(), $data=array()){
    $num = count($column);
    $html = "";
    $html .= "<table border=1 cellpadding=0 cellspacing=0 width=\"100%\" >";
    //标题
    $html .= "<tr><td colspan=\"$num\" align=\"center\"><h2>$title</h2></td></tr>";
    //列标题
    $html .= "<tr>";
    foreach ($column as $key=>$item){
        $html .= "<td style='width:54pt' align=\"center\">$item</td>";
    }

    $html .= "</tr>";

    //数据
    /*$html .= "<tr>";*/
    foreach ($data as $key=>$item){
        $html .= "<tr>";
        foreach ($item as $k=>$val){
            $html .= "<td align=\"center\">$val</td>";
        }
        $html .= "</tr>";
    }

    $html .= "</table>";

    $file_name   = $title."-".date("Y-m-d",time());
    $file_suffix = "xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=$file_name.$file_suffix");
    header('Cache-Control: max-age=0');
    echo "\xEF\xBB\xBF"; // UTF-8 BOM  设置csv文件的编码方式
    echo $html;
}

/**
 * 递归返回所有子孙
 * @param $parentId 父id
 * @param array $array 所以子集数组
 * @return array 返回祖先的所有子孙，子与孙在同一级
 */
function RecursionCommentsAry($parentId, $array=array()){
    $subAry = array();
    foreach ($array as $key=>$value){
        if ($value['parent_id'] == $parentId){
            $arr = RecursionCommentsAry($value['id'], $array);
            if ($arr){
                foreach ($arr as $k=>$v){
                    $subAry[] = $v;
                }
            }
            $subAry[] = $value;

        }
    }
    return $subAry;
}


/**
 * 判断微信内置浏览器访问
 */
function is_weixin(){
    if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {
        return true;
    }
    return false;
}

function isMobile() {
    //判断手机发送的客户端标志
    if(isset($_SERVER['HTTP_USER_AGENT'])) {
        $userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);
        $clientkeywords = array(
            'nokia', 'sony', 'ericsson', 'mot', 'samsung', 'htc', 'sgh', 'lg', 'sharp', 'sie-'
        ,'philips', 'panasonic', 'alcatel', 'lenovo', 'iphone', 'ipod', 'blackberry', 'meizu',
            'android', 'netfront', 'symbian', 'ucweb', 'windowsce', 'palm', 'operamini',
            'operamobi', 'opera mobi', 'openwave', 'nexusone', 'cldc', 'midp', 'wap', 'mobile'
        );
        // 从HTTP_USER_AGENT中查找手机浏览器的关键字
        if(preg_match("/(".implode('|',$clientkeywords).")/i",$userAgent)&&strpos($userAgent,'ipad') === false)
        {
            return true;
        }
    }
    return false;
}