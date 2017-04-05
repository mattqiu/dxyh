<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title><?php echo ($title); ?> - 达晓医护</title>

    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- basic styles -->

    <link href="/Public/admin/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/Public/admin/css/font-awesome.min.css" />

    <!--[if IE 7]>
    <link rel="stylesheet" href="/Public/admin/css/font-awesome-ie7.min.css" />
    <![endif]-->

    <!-- page specific plugin styles -->

    <!-- fonts -->

    <link rel="stylesheet" href="/Public/admin/css/ace-fonts.css" />

    <!-- ace styles -->

    <link rel="stylesheet" href="/Public/admin/css/ace.min.css" />
    <link rel="stylesheet" href="/Public/admin/css/ace-rtl.min.css" />
    <link rel="stylesheet" href="/Public/admin/css/ace-skins.min.css" />

    <!--[if lte IE 8]>
    <link rel="stylesheet" href="/Public/admin/css/ace-ie.min.css" />
    <![endif]-->
    <!--Thinkphp框架error/success函数返回界面弹出框提示-->
    <link href="/Public/admin/think/think.css" rel="stylesheet" />
    <!-- inline styles related to this page -->

    <!-- ace settings handler -->

    <script src="/Public/admin/js/ace-extra.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
    <script src="/Public/admin/js/html5shiv.js"></script>
    <script src="/Public/admin/js/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
        #sample-table-1 tr td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
<!--顶部导航-->
<div class="navbar navbar-default" id="navbar">
    <script type="text/javascript">
        try{ace.settings.check('navbar' , 'fixed')}catch(e){}
    </script>

    <div class="navbar-container" id="navbar-container">
        <div class="navbar-header pull-left">
            <a href="#" class="navbar-brand">
                <small>
                    <!--<i class="icon-leaf"></i>-->
                    <img src="/Public/img/logo.png" style="width: 50px;">
                    达医晓护
                </small>
            </a><!-- /.brand -->
        </div><!-- /.navbar-header -->

        <div class="navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
                <li class="light-blue">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="/Public/admin/avatars/user.jpg" alt="Jason's Photo" />
                        <span class="user-info">
									<small>欢迎,</small>
									<?php echo (session('aname')); ?>
								</span>

                        <i class="icon-caret-down"></i>
                    </a>

                    <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <!--<li>
                            <a href="#">
                                <i class="icon-cog"></i>
                                设 置
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="icon-user"></i>
                                简 介
                            </a>
                        </li>

                        <li class="divider"></li>-->

                        <li>
                            <a href="<?php echo U('Public/logout');?>" class="ajax-get confirm">
                                <i class="icon-off"></i>
                                退 出
                            </a>
                        </li>
                    </ul>
                </li>
            </ul><!-- /.ace-nav -->
        </div><!-- /.navbar-header -->
    </div><!-- /.container -->
</div>
<div class="main-container" id="main-container">
    <script type="text/javascript">
        try{ace.settings.check('main-container' , 'fixed')}catch(e){}
    </script>

    <div class="main-container-inner">
        <a class="menu-toggler" id="menu-toggler" href="#">
            <span class="menu-text"></span>
        </a>
        <div class="sidebar" id="sidebar">
    <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
    </script>

    <!--<div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="icon-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="icon-pencil"></i>
            </button>

            <button class="btn btn-warning">
                <i class="icon-group"></i>
            </button>

            <button class="btn btn-danger">
                <i class="icon-cogs"></i>
            </button>
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div>--><!-- #sidebar-shortcuts -->

    <ul class="nav nav-list">
        <li>
            <a href="<?php echo U('Index/index');?>" class="ajax-get">
                <i class="icon-dashboard"></i>
                <span class="menu-text"> 仪表盘 </span>
            </a>
        </li>

        <li>
            <a href="#" class="dropdown-toggle">
                <i class="icon-desktop"></i>
                <span class="menu-text"> 科普中心 </span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li>
                    <a href="<?php echo U('Coptic/copticType');?>" class="ajax-get">
                        <i class="icon-double-angle-right"></i>
                        科普分类管理
                    </a>
                </li>

                <li>
                    <a href="<?php echo U('Coptic/index');?>" class="ajax-get">
                        <i class="icon-double-angle-right"></i>
                        科普文章管理
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#" class="dropdown-toggle">
                <i class="icon-list"></i>
                <span class="menu-text"> 活动中心 </span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li>
                    <a href="<?php echo U('Activity/activityType');?>" class="ajax-get">
                        <i class="icon-double-angle-right"></i>
                        活动分类管理
                    </a>
                </li>

                <li>
                    <a href="<?php echo U('Activity/index');?>" class="ajax-get">
                        <i class="icon-double-angle-right"></i>
                        活动管理
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#" class="dropdown-toggle">
                <i class="icon-text-width"></i>
                <span class="menu-text"> 家庭护理 </span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li>
                    <a href="<?php echo U('HomeCare/index');?>" class="ajax-get">
                        <i class="icon-double-angle-right"></i>
                        家庭护理
                    </a>
                </li>

            </ul>
        </li>

        <li>
            <a href="widgets.html" class="dropdown-toggle">
                <i class="icon-group"></i>
                <span class="menu-text"> 用户管理 </span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li>
                    <a href="<?php echo U('UserManage/user_list');?>" class="ajax-get">
                        <i class="icon-double-angle-right"></i>
                        用户管理
                    </a>
                </li>

                <li>
                    <a href="<?php echo U('UserManage/integral');?>" class="ajax-get">
                        <i class="icon-double-angle-right"></i>
                        积分明细
                    </a>
                </li>

                <li>
                    <a href="<?php echo U('UserManage/collection');?>" class="ajax-get">
                        <i class="icon-double-angle-right"></i>
                        用户收藏列表
                    </a>
                </li>

                <li>
                    <a href="<?php echo U('UserManage/user_activity');?>" class="ajax-get">
                        <i class="icon-double-angle-right"></i>
                        用户参加活动列表
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#" class="dropdown-toggle">
                <i class="icon-gears"></i>
                <span class="menu-text"> 系统设置 </span>

                <b class="arrow icon-angle-down"></b>
            </a>

            <ul class="submenu">
                <li>
                    <a href="<?php echo U('System/role_manage');?>" class="ajax-get">
                        <i class="icon-double-angle-right"></i>
                        角色管理
                    </a>
                </li>

                <li>
                    <a href="<?php echo U('System/account_manage');?>" class="ajax-get">
                        <i class="icon-double-angle-right"></i>
                        账户管理
                    </a>
                </li>

                <li>
                    <a href="<?php echo U('System/website_image');?>" class="ajax-get">
                        <i class="icon-double-angle-right"></i>
                        网站图片
                    </a>
                </li>

                <li>
                    <a href="<?php echo U('System/link_manage');?>" class="ajax-get">
                        <i class="icon-double-angle-right"></i>
                        友情链接
                    </a>
                </li>

                <li>
                    <a href="<?php echo U('System/about_us');?>" class="ajax-get">
                        <i class="icon-double-angle-right"></i>
                        关于我们
                    </a>
                </li>

                <li>
                    <a href="<?php echo U('Public/modify_password');?>">
                        <i class="icon-double-angle-right"></i>
                        修改密码
                    </a>
                </li>
            </ul>
        </li>
    </ul><!-- /.nav-list -->

    <div class="sidebar-collapse" id="sidebar-collapse">
        <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
    </div>

    <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
    </script>
</div>
        <div class="main-content">
            <div class="breadcrumbs" id="breadcrumbs">
                <script type="text/javascript">
                    try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
                </script>
                <ul class="breadcrumb">
                    <li>
                        <i class="icon-home home-icon"></i>
                        <a href="<?php echo U('Index/index');?>">首页</a>
                    </li>

                    <li>
                        <a href="<?php echo U('HomeCare/index');?>">家庭护理</a>
                    </li>
                    <li>
                        <a href="<?php echo U('HomeCare/index');?>">家庭护理</a>
                    </li>
                    <li class="active"><?php echo ($title); ?></li>
                </ul>
            </div>

            <div class="page-content">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS 网页内容开始 -->
                        <form class="form-horizontal" id="form-submit" role="form" style="padding-top: 10rem;" action="<?php echo ($Url); ?>">
                            <input type="hidden" name="id" value="<?php echo ($rows["id"]); ?>">
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 目录 </label>
                                <div class="col-sm-9">
                                    <select class="col-sm-5" name="chapter">
                                        <option value="0">请选择章</option>
                                        <?php if(is_array($chapter)): $i = 0; $__LIST__ = $chapter;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php echo (Judgement($vo["id"],$id,"selected")); ?> <?php echo (Judgement($vo["id"],$rows['chapter'],"selected")); ?>><?php echo ($vo["chapter_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                    <label style="margin-left: 10px;color: red;">注意：新增目录时无需选择，新增节时选择对应的目录</label>
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 章节名称 </label>
                                <div class="col-sm-9">
                                    <input type="text" id="form-field-2" class="col-xs-10 col-sm-5" name="chapter_name" value="<?php echo ($rows["chapter_name"]); ?>" placeholder="请输入章节名称，格式：第一章或第一节" />
                                </div>
                            </div>


                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 章节标题 </label>
                                <div class="col-sm-9">
                                    <input type="text" class="col-xs-10 col-sm-5" name="title" value="<?php echo ($rows["title"]); ?>" placeholder="请输入章节标题，格式：基本家庭护理操作" />
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> 内容 </label>
                                <div class="col-sm-9">
                                    <script id="editor" name="content" type="text/plain" style="width:1024px;height:500px;"><?php echo (htmlspecialchars_decode($rows["content"])); ?></script>
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="clearfix form-actions" style="background-color: inherit;border: inherit;">
                                <div class="col-md-offset-3 col-md-9">
                                    <button class="btn btn-info ajax-post" type="button" target-form="form-submit">
                                        <i class="icon-ok bigger-110"></i>
                                        提交
                                    </button>

                                    &nbsp; &nbsp; &nbsp;
                                    <button class="btn" type="reset">
                                        <i class="icon-undo bigger-110"></i>
                                        重置
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- PAGE CONTENT ENDS 网页内容结束 -->
                    </div>
                </div>
            </div>
        </div>
        <div class="ace-settings-container" id="ace-settings-container">
    <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
        <i class="icon-cog bigger-150"></i>
    </div>

    <div class="ace-settings-box" id="ace-settings-box">
        <div>
            <div class="pull-left">
                <select id="skin-colorpicker" class="hide">
                    <option data-skin="default" value="#438EB9">#438EB9</option>
                    <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                    <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                    <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                </select>
            </div>
            <span>&nbsp; 选择皮肤</span>
        </div>
    </div>
</div><!-- /#ace-settings-container -->
    </div>

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="icon-double-angle-up icon-only bigger-110"></i>
    </a>
</div>
<!-- basic scripts -->

<!--[if !IE]> -->

<script type="text/javascript">
    window.jQuery || document.write("<script src='/Public/admin/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='/Public/admin/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

<script type="text/javascript">
    if("ontouchend" in document) document.write("<script src='/Public/admin/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="/Public/admin/js/bootstrap.min.js"></script>
<script src="/Public/admin/js/typeahead-bs2.min.js"></script>

<!-- page specific plugin scripts -->

<!-- ace scripts -->

<script src="/Public/admin/js/ace-elements.min.js"></script>
<script src="/Public/admin/js/ace.min.js"></script>
<!--Thinkphp框架error/success函数返回界面弹出框提示-->
<script src="/Public/admin/think/think.js"></script>

<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>
<!-- inline scripts related to this page -->
<script type="text/javascript">
    var ue = UE.getEditor('editor',{autoFloatEnabled:false});

    $(function () {
        var title = "<?php echo ($title); ?>";
        if (title == "编辑科普类别"){
            $("p").css('display','none');
        }
    });
    $(".showImage").click(function () {
        $("#fileupload").click();
    });
    function showPreview(source) {
        var file = source.files[0];
        if(window.FileReader) {
            var fr = new FileReader();
            fr.onloadend = function(e) {
                //document.getElementById("portrait").src = e.target.result;
                $(".showImage img").attr("src",e.target.result);
            };
            fr.readAsDataURL(file);
        }
        $("p").css('display','none');
        $(".unImage").css('display','block');
    };

    function unsetImage() {
        $(".showImage img").attr("src", "");
        $("p").css('display','block');
        var obj = document.getElementById('fileupload') ;
        obj.outerHTML = obj.outerHTML;
        $(".unImage").css('display','none');
    }

</script>
</body>
</html>