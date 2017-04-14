<?php
/**
 * 通用文件上传类
 */
class FileUpload
{
    private $filepath;	//指定上传文件保存的路径
    private $allowtype=array('gif','jpg','png','jpeg');//默认允许上传文件的类型
    private $maxsize=1024 * 1024 * 5;	//默认允许上传文件的最大长度
    private $israndname=true;	//是否使用随机文件名，false则使用原文件名

    private $originName; 	//原文件名
    private $tmpFileName; 	//临时文件名
    private $fileType;		//文件类型
    private $fileSize;		//文件大小
    private $newFileName; 	//新文件名
    private $errorNum=0; 	//错误号
    public $errorMsg=''; 	//错误消息

    //初始化文件上传
    //1.指定上传路径 2.限制类型 3.限制大小 4.是否使用随机文件名
    //使用可变数组来实现构造函数的重载【重载】
    //优点：
    //用户可以自定义参数的个数和顺序
    //用户在输入关联键值错误的情况下仍然可以使用默认参数，不影响代码执行
    //不区分键名的大小写
    function __construct($options=array()){
        //如果使用$this->filepath=$filepath的常规构造函数初始化：参数个数顺序用户无法自定义，用户输入错误时代码无法执行
        //根据类的对象获取类的属性的数组：get_class_vars(get_class($this));

        //判断用户给定的数组中的key是存在于类的属性中，如果存在，则给属性重新赋值
        foreach ($options as $key => $val) {
            $key = strtolower($key);//将用户给定的key转为小写 比较
            if (!array_key_exists($key, get_class_vars(get_class($this)))) {
                continue;
            }
            $this->SetOptions($key,$val);
        }
    }


    //上传文件
    public function UploadFile($fileField){
        //检查用户设置的上传文件的保存路径
        if(!$this->CheckFilePath()){
            $this->errorMsg=$this->SetErrorMsg();
            return false;
        }

        //取得上传文件的信息
        $name = $_FILES[$fileField]['name'];
        $tmp_name = $_FILES[$fileField]['tmp_name'];
        $size = $_FILES[$fileField]['size'];
        $error = $_FILES[$fileField]['error'];

        //判断 是否为多文件上传
        //一个文件上传出错，则全部失败，全部正确则全部上传
        $result=true;//申明变量$result用于判断上传过程中是否有错

        //如果是多文件上传
        if(is_array($name)){

            //定义错误信息数组，存储出错信息
            $errors = array();

            //循环读取文件信息并保存文件
            for ($i=0; $i < count($name); $i++) {
                //循环遍历文件信息，判断类型和大小
                if ($this->SetFileInfo($name[$i],$tmp_name[$i],$size[$i],$error[$i])) {
                    //检查文件大小和类型
                    if(!$this->CheckFileType()||!$this->CheckFileSize()){
                        //将出错信息储存到数组$errors中
                        $errors[]=$this->SetErrorMsg();
                        $result = false;
                    }
                } else {
                    $errors[]=$this->SetErrorMsg();
                    $result = false;
                }

                //将文件属性初始化，以免出错的文件信息被保留
                if(!$result){
                    $this->SetFileInfo();
                }
            }

            //如果检查上传的所有文件都没有问题了，则保存所有文件
            if ($result) {

                //定义一个数组变量$fileNames，用于存储上传成功后的图片文件名
                $fileNames = array();

                //循环文件信息，保存文件
                for ($i=0; $i < count($name); $i++) {
                    if ($this->SetFileInfo($name[$i],$tmp_name[$i],$size[$i],$error[$i])) {
                        $this->SetFileName();
                        if (!$this->CopyFile()) {
                            $errors=$this->SetErrorMsg();
                            $result=false;
                        } else {
                            $fileNames[]=$this->newFileName;
                        }
                    }
                }

                //将新文件名数组赋值给类的属性newFileName
                $this->newFileName=$fileNames;
            }

            $this->errorMsg = $errors;
            return $result;

        }else{//如果是单个文件上传
            if($this->SetFileInfo($name,$tmp_name,$size,$error)){
                //检查文件大小和类型
                if($this->CheckFileType()&&$this->CheckFileSize()){
                    //获取文件名
                    $this->SetFileName();
                    //保存文件
                    if($this->CopyFile())
                    {
                        return substr($this->filepath,1) . $this->newFileName;
                    }else{
                        $result=false;
                    }
                }
                else{
                    $result=false;
                }
            }else{
                $result=false;
            }
            if(!$result){
                $this->errorMsg= $this->SetErrorMsg();
            }
            return $result;

        }
    }



    //获取文件名
    public function GetNewFileName(){
        return $this->newFileName;
    }

    //获取错误信息
    public function GetError(){
        return $this->errorMsg;
    }

    //初始化文件信息
    private function SetFileInfo($name='',$tmp_name='',$size=0,$error=0)
    {
        $this->SetOptions('errorNum',$error);
        if($error){
            return false;
        }
        $this->SetOptions('originName',$name);
        $this->SetOptions('tmpFileName',$tmp_name);
        $this->SetOptions('fileSize',$size);

        $arrStr = explode('.', $name);
        $this->SetOptions('fileType',strtolower($arrStr[count($arrStr)-1]));

        return true;
    }

    //获取上传后的文件名
    private function SetFileName()
    {
        if($this->israndname){
            $fileName =@date('YmdHis').rand(100,999);
            $fileName =  $fileName.'.'.$this->fileType;
            $this->SetOptions("newFileName",$fileName);
        }else{
            $this->SetOptions('newFileName',$this->originName);
        }
    }

    //上传失败时，获取失败消息
    private function SetErrorMsg()
    {
        $msg='上传文件<font color="red">'.$this->originName.'</font>时出错：';
        switch ($this->errorNum) {
            case 4:$msg.="没有文件被上传";break;
            case 3:$msg.="文件只有部分被上传";break;
            case 2:$msg.="文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值";break;
            case 1:$msg.="文件超过了 php.ini 中 upload_max_filesize 选项限制的值";break;
            case -1:$msg.="未允许的文件类型";break;
            case -2:$msg.="文件过大，上传文件不能超过{$this->maxSize}个字节";break;
            case -3:$msg.="上传失败";break;
            case -4:$msg.="建立存放文件目录失败，请重新指定上传目录";break;
            case -5:$msg.="必须指定上传文件的路径";break;
            default:$msg.="未知错误";
        }
        return $msg.'<br>';
    }

    //设置属性
    private function SetOptions($key,$val){
        $this->$key=$val;
    }

    //检查文件的保存路径
    private function CheckFilePath(){
        //如果用户没有指定文件的保存路径
        if(empty($this->filepath)){
            $this->SetOptions('errorNum',-5);
            return false;
        }

        //如果用户设置的文件目录不存在或不可写
        if(!file_exists($this->filepath)||!is_writable($this->filepath)){
            //尝试创建目录，如果不成功，则设置错误信息
            if(!@mkdir($this->filepath,0755,true)){
                $this->SetOptions('errorNum',-4);
                return false;
            }
        }

        return true;
    }

    //检查上传的文件类型
    private function CheckFileType(){
        if(in_array(strtolower($this->fileType),$this->allowtype)){
            return true;
        }else{
            $this->SetOptions("errorNum",-1);
            return false;
        }
    }

    //检查上传的文件大小
    private function CheckFileSize(){
        if($this->fileSize>$this->maxsize){
            $this->SetOptions('errorNum',-2);
            return false;
        }else{
            return true;
        }
    }

    //保存文件 移动成功返回true,否则返回false
    private function CopyFile(){
        if (!$this->errorNum) {
            $newPath=rtrim($this->filepath,'/').'/';
            $newPath.=$this->newFileName;

            if(@move_uploaded_file($this->tmpFileName, $newPath)){
                return true;
            }else{
                $this->SetOptions('errorNum',-3);
                return false;
            }
        } else {
            return false;
        }
    }

}