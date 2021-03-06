<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>科普文章 - 达晓医护</title>

    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- basic styles -->
    <link rel="shortcut icon" type="image/x-icon" href="/Public/img/dyxh.ico">
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
						<a href="#">科普中心</a>
					</li>
					<li class="active">科普文章</li>
				</ul>
			</div>

			<div class="page-content">
				<div class="page-header">
					<span>科普类别</span>
					<select name="copticType" form="form1">
						<option value="0">请选择类别</option>
						<?php if(is_array($copticType)): $i = 0; $__LIST__ = $copticType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php echo (Judgement($typeId,$vo['id'],"selected")); ?>><?php echo ($vo["category_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
					<span>是否推荐</span>
					<select name="nominate" form="form1">
						<option value="0">全部</option>
						<option value="1" <?php echo (Judgement($nominate,1,"selected")); ?>>推荐</option>
						<option value="2" <?php echo (Judgement($nominate,2,"selected")); ?>>不推荐</option>
					</select>
					<span>关键字</span>
					<input type="text" name="keyword" form="form1" value="<?php echo ($keyword); ?>" />
					<input type="submit" name="" value="搜索" form="form1">
					<a href="<?php echo U('Coptic/add');?>" class="btn btn-xs btn-info">添加</a>
					<form action="" method="get" id="form1"></form>

				</div>
				<div class="row">
					<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS 网页内容开始 -->
						<table id="sample-table-1" class="table table-striped table-bordered table-hover center">
							<thead>
							<tr>
								<th class="center">序号</th>
								<th class="center">类别</th>
								<th class="center">标题</th>
								<th class="center">作者</th>
								<th class="center">点赞数</th>
								<th class="center">收藏数</th>
								<th class="center">阅读/评论数</th>
								<th class="center">是否推荐</th>
								<th class="center">创建时间</th>
								<th class="center">排序</th>
                                <th class="center">是否原创</th>
								<th class="center">是否显示</th>
								<th class="center">操作</th>
							</tr>
							</thead>

							<tbody>
							<?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
									<td class="center">
										<?php echo ($vo["id"]); ?>
									</td>

									<td>
										<?php echo ($vo["category_name"]); ?>
									</td>
									<td>
										<?php echo ($vo["coptic_title"]); ?>
									</td>
									<td>
										<?php echo ($vo["author"]); ?>
									</td>
									<td>
										<?php echo ($vo["likes_num"]); ?>
									</td>
									<td>
										<?php echo ($vo["collection"]); ?>
									</td>
									<td>
										<?php echo ($vo["browse_volume"]); ?>/<?php echo ($vo["comment_num"]); ?>
									</td>
									<td><?php echo ($vo["referral"]); ?> </td>
									<td class="hidden-480"><?php echo ($vo["create_time"]); ?></td>
									<td><?php echo ($vo["sort"]); ?> </td>
                                    <td><?php if(empty($vo["original"])): ?>否<?php else: ?>是<?php endif; ?> </td>
                                    <td><?php if($vo['isdisplay'] == 1): ?>否<?php else: ?>是<?php endif; ?> </td>
									<td class="center">
										<a class="btn btn-xs btn-info" title="查看详情" href="<?php echo U('index/copticDetails',array('id'=>$vo['id']));?>">
											<i class="icon-zoom-in bigger-130"></i>
										</a>
										<a class="btn btn-xs btn-info ajax-get" title="编辑" href="<?php echo U('Coptic/edit',array('id'=>$vo['id'],'p'=>$_GET['p']));?>">
											<i class="icon-edit bigger-120"></i>
										</a>

										<a class="btn btn-xs btn-danger ajax-get confirm" title="删除" href="<?php echo U('Coptic/del',array('id'=>$vo['id']));?>">
											<i class="icon-trash bigger-120"></i>
										</a>
									</td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</tbody>
						</table>
						<!-- PAGE CONTENT ENDS 网页内容结束 -->
					</div>
					<?php echo ($page); ?>
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


<!-- inline scripts related to this page -->
</body>
</html>