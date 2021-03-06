<?php
return array(
	//'配置项'=>'配置值'
    'DB_TYPE'   => 'mysql',
    'DB_HOST'   => '115.159.69.193',
    'DB_NAME'   => 'dxyh',
    'DB_USER'   => 'root',
    'DB_PWD'    => '123456',
    'DB_PORT'   => 3306,
    'DB_PREFIX' => 'dxyh_',
    'DB_CHARSET'=> 'utf8',
    'DB_DEBUG'  =>  TRUE,



    'TMPL_ACTION_ERROR' => 'Public:error',  //默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS' => 'Public:success',  //默认成功跳转对应的模板文件
    'MEMBER'            => 'admin',
    'LOAD_EXT_FILE'     => 'functions',
    'PAGE_NUM'          => 10,  //分页：每页条数
    'URL_MODEL' => 2,

    'SHOW_PAGE_TRACE' => false,   // 显示页面Trace信息
    'DB_SQL_BUILD_CACHE' => true,   //SQL解析缓存
    'DB_SQL_BUILD_QUEUE' => 'xcache',
    'DB_SQL_BUILD_LENGTH' => 20,

    'LOG_RECORD' => true, // 开启日志记录
    'LOG_LEVEL'  =>'EMERG,ALERT,CRIT,ERR',

);