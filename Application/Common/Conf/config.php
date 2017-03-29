<?php
return array(
	//'配置项'=>'配置值'
    'DB_TYPE'   => 'mysql',
    'DB_HOST'   => '140.207.213.38',
    'DB_NAME'   => 'dxyh',
    'DB_USER'   => 'root',
    'DB_PWD'    => 'songdian2015',
    'DB_PORT'   => 3306,
    'DB_PREFIX' => 'dxyh_',
    'DB_CHARSET'=> 'utf8',
    'DB_DEBUG'  =>  TRUE,



    'TMPL_ACTION_ERROR' => 'Public:error',  //默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS' => 'Public:success',  //默认成功跳转对应的模板文件
    'MEMBER'            => 'admin',
    'LOAD_EXT_FILE'     => 'functions',
    'PAGE_NUM'          => 15,  //分页：每页条数

);