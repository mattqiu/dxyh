<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>个人中心-个人信息</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/Public/home/css/base.css">
		<link rel="stylesheet" href="/Public/home/css/center.css">
		<link rel="Shortcut Icon" href="/Public/home/img/dyxh.ico" >
	</head>
	<body>
		<!-- 公共头部开始 -->
		<div class="commonTop">
    <div class="wrap">
        <!-- logo -->
        <a href="#" class="logoImg">
            <img src="/Public/home/img/logo.png" alt="">
            <img style="height: 18px;width: auto;" class="hidden-lg" src="/Public/home/img/cmt2.png" alt="">
            <!-- 小屏幕下个人导航图标开始 -->
            <img  class="hidden-lg cmtMenuLogo" src="/Public/home/img/cmt1.png" alt="">
            <!-- 小屏幕下个人导航图标结束 -->
        </a>
        <!-- logo -->
        <!-- 导航开始 -->
        <nav>
            <a href="<?php echo U('Index/index');?>" class="active">首页</a>
            <a href="<?php echo U('Coptic/index');?>">科普中心</a>
            <a href="<?php echo U('Activity/index');?>">活动中心</a>
            <a href="<?php echo U('HomeCare/index');?>">家庭护理</a>
            <a href="<?php echo U('Aboutus/index');?>">关于我们</a>
            <a href="<?php echo U('User/index');?>">个人中心</a>
        </nav>
        <!-- 导航结束 -->
        <!-- 登陆注册开始 -->
        <div class="loginBox visible-lg">
            <a href="login.html">登录</a>|<a href="regist.html">注册</a>
        </div>
        <!-- 登陆注册结束 -->

    </div>
</div>
		<!-- 公共头部结束 -->
		<div class="container wrap box">
			<!-- 左边导航开始 -->
			<div class="col-lg-2 left">
    <p class="leftTitle visible-lg">会员中心</p>
    <a href="<?php echo U('User/index');?>"><img src="/Public/home/img/c2.png" alt="">个人信息</a>
    <a href="<?php echo U('User/myKeep');?>"  class="leftActive"><img src="/Public/home/img/c3.png" alt="">我的收藏</a>
    <a href="<?php echo U('User/myActivity');?>"><img src="/Public/home/img/c4.png" alt="">我的活动</a>
    <a href="<?php echo U('User/myIntegral');?>"><img src="/Public/home/img/c9.png" alt="">我的积分</a>
    <a href="<?php echo U('User/modifyPasswd');?>"><img src="/Public/home/img/c5.png" alt="">修改密码</a>
</div>
			<!-- 左边导航结束 -->
			<!-- 右侧信息模块开始 -->
			<div class="col-lg-10">
				<div class="right">
					<p class="rightTitle visible-lg">我的活动</p>
					<!-- 一个活动开始 -->
					<div class="col-lg-4 avtiveList">
						<div>
							<p class="c2p">浏览：232425&nbsp;&nbsp;&nbsp;&nbsp;人数：2235</p>
							<div class="activeImg">
								<img src="/Public/home/img/img1.png" alt="">
								<div class="mengceng"></div><!-- 蒙层 -->
								<p>‘达医晓护’学生社团成立活动</p>
							</div>
							<div class="activeMessage">
								<p>开始时间：2017-03-20<a href="#">取消参加</a></p>
								<p>结束时间：2017-03-30</p>
								<p>地点：上海市长宁区天山路23号</p>
							</div>
						</div>
					</div>
					<!-- 一个活动结束 -->
					<!-- 一个活动开始 -->
					<div class="col-lg-4 avtiveList">
						<div>
							<p class="c2p">浏览：232425&nbsp;&nbsp;&nbsp;&nbsp;人数：2235</p>
							<div class="activeImg">
								<img src="/Public/home/img/img1.png" alt="">
								<div class="mengceng"></div><!-- 蒙层 -->
								<p>‘达医晓护’学生社团成立活动</p>
							</div>
							<div class="activeMessage">
								<p>开始时间：2017-03-20<a href="#">取消参加</a></p>
								<p>结束时间：2017-03-30</p>
								<p>地点：上海市长宁区天山路23号</p>
							</div>
						</div>
					</div>
					<!-- 一个活动结束 -->
					<!-- 一个活动开始 -->
					<div class="col-lg-4 avtiveList">
						<div>
							<p class="c2p">浏览：232425&nbsp;&nbsp;&nbsp;&nbsp;人数：2235</p>
							<div class="activeImg">
								<img src="/Public/home/img/img1.png" alt="">
								<div class="mengceng"></div><!-- 蒙层 -->
								<p>‘达医晓护’学生社团成立活动</p>
							</div>
							<div class="activeMessage">
								<p>开始时间：2017-03-20<a href="#">取消参加</a></p>
								<p>结束时间：2017-03-30</p>
								<p>地点：上海市长宁区天山路23号</p>
							</div>
						</div>
					</div>
					<!-- 一个活动结束 -->
				</div>
			</div>
			<!-- 右侧信息模块结束 -->
		</div>
		<!-- 公共底部模块开始 -->
		<div class="commonBottom visible-lg">
    <div class="links">
        <a href="#" class="key">友情链接</a>
        <a href="#">中路成员企业</a>
        <a href="#">星火钱包</a>
        <a href="#">贷出去多赚</a>
        <a href="#">网贷天眼</a>
        <a href="#">网贷之家</a>
        <a href="#">网贷专家</a>
        <a href="#">二手车之家</a>
        <a href="#">车300</a>
        <a href="#">车虫网</a>
        <a href="#">车8度</a>
        <a href="#">车蚂蚁</a><br>
        <a href="#">车讯商城</a>
        <a href="#">易车二手车</a>
        <a href="#">移动汽车网</a>
        <a href="#">汽车改装店</a>
        <a href="#">丝路汽车网</a>
        <a href="#">一起网贷</a>
        <a href="#">融途网</a>
        <p class="Copyright">Copyright © 2017达医晓护网，All&nbsp;rights&nbsp;reserved&nbsp;&nbsp;沪[CP备]4008832号&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;上海松点网络科技有限公司技术支持</p>
    </div>
</div>
		<!-- 公共底部模块结束 -->
		<script type="text/javascript" src="/Public/home/js/jquery1.91.min.js"></script>
	<script type="text/javascript">
								// 小屏幕展开导航效果
			$(function() {
				$(".cmtMenuLogo").click(function() {
					$(".commonTop nav").toggle();
					$(".commonTop").toggleClass('t6');
				}
				)
			}
			)
		</script>
	</body>
</html>