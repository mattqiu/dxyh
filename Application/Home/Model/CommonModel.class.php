<?php
/**
 * 客户端基础Model类
 */

namespace Home\Model;

use Think\Model;

class CommonModel extends Model
{
    /**
     * 基础查询多条记录方法
     * @param null $where   查询条件，默认查询所有数据
     * @param null $field   查询字段，默认查询所有字段
     * @param null $order   查询排序，默认不排序
     * @param int $pageNum  查询起始数，默认从索引为 0 的记录开始查询
     * @param int $pageSize 查询记录数，默认查询 15 条记录
     * @return mixed    返回数据（二维数组形式）
     */
    public function getDataList($where=null, $field=null, $order=null, $pageNum=0, $pageSize=15){
        if ($where){
            $this->where($where);
        }
        if ($field){
            $this->field($field);
        }
        if ($order){
            $this->order($order);
        }
        $this->limit($pageNum, $pageSize);
        $list = $this->select();
        return $list;
    }

    /**
     * 基础查询一条记录数据方法
     * @param null $where   查询条件，默认查询表中的第一条记录
     * @param null $field   查询字段，默认查询所有字段
     * @return mixed    返回数据（一维数组）
     */
    public function getDataInfo($where=null, $field=null){
        if ($where){
            $this->where($where);
        }
        if ($field){
            $this->field($field);
        }
        $info = $this->find();
        return $info;
    }

    /**
     * 基础统计数据查询方法
     * @param null $where   查询条件，默认统计表中所有记录
     * @return mixed    返回统计结果（int类型）
     */
    public function countData($where=null){
        if ($where){
            $this->where($where);
        }
        $count = $this->count();
        return $count;
    }

    /**
     * 基础添加一条数据方法
     * @param array $data   添加数据，默认为空
     * @return mixed    返回操作结果
     */
    public function addData($data=array()){
        if ($data){
            $this->data($data);
        }
        $boole = $this->add();
        return $boole;
    }

    /**
     * 基础添加多条数据方法
     * @param array $data   添加数据，默认为空
     * @return bool|string  返回操作结果
     */
    public function addAllData($data=array()){
        if ($data){
            $this->data($data);
        }
        $boole = $this->addAll();
        return $boole;
    }

    /**
     * 基础修改数据方法
     * @param null $where   修改条件，默认修改表中所有数据
     * @param array $data   修改数据，默认为空
     * @return bool 返回操作结果
     */
    public function editData($where=null, $data=array()){
        if ($where){
            $this->where($where);
        }
        if (!empty($data)){
            $this->data($data);
        }
        $boole = $this->save();
        return $boole;
    }

    /**
     * 基础删除方法
     * @param null $where   删除条件，默认为 null ，当为 null 是不执行删除操作
     * @return bool|mixed   返回操作结果
     */
    public function deleteData($where=null){
        if (empty($where)){
            return false;
        }
        $this->where($where);
        $boole = $this->delete();
        return $boole;
    }

    /**
     * 基础连表查询一条记录
     * @param array $join   关联表数据
     * @param array $where  查询条件
     * @param string $field 查询字段
     * @param string $order 排序字段
     * @return mixed
     */
    public function getJoinDataInfo($join=array(), $where=array(), $field="", $order=""){
        if ($join){
            $this->join($join);
        }
        if ($where){
            $this->where($where);
        }
        if ($field){
            $this->field($field);
        }
        if ($order){
            $this->order($order);
        }
        return $this->find();
    }

    /**
     * 基础连表查询多条记录
     * @param array $join   关联表数据
     * @param array $where  查询条件
     * @param string $field 查询字段参数
     * @param string $order 排序参数
     * @param int $pageNum  分页开始数
     * @param int $pageSize 每页查询记录数
     * @return mixed
     */
    public function getJoinDataList($join = array(), $where = array(), $field = "", $order = "", $pageNum = 0, $pageSize = 15){
        if ($join){
            $this->join($join);
        }
        if ($where){
            $this->where($where);
        }
        if ($field){
            $this->field($field);
        }
        if ($order){
            $this->order($order);
        }
        return $this->limit($pageNum, $pageSize)->select();
    }

    /**
     * 基础连表查询统计数
     * @param array $join   连表信息
     * @param array $where  查询条件
     * @return mixed
     */
    public function getJoinCount($join=array(), $where=array()){
        if ($join){
            $this->join($join);
        }
        if ($where){
            $this->where($where);
        }
        return $this->count();
    }
}