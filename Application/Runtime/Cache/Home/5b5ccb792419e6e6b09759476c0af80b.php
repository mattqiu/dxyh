<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>个人中心-修改资料</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/dxyh/Public/home/css/base.css">
		<link rel="stylesheet" href="/dxyh/Public/home/css/center.css">
		<link rel="Shortcut Icon" href="/dxyh/Public/home/img/dyxh.ico" >
	</head>
	<body>
		<!-- 公共头部开始 -->
		<div class="commonTop">
    <div class="wrap">
        <!-- logo -->
        <a href="#" class="logoImg">
            <img src="/dxyh/Public/home/img/logo.png" alt="">
            <img style="height: 18px;width: auto;" class="hidden-lg" src="/dxyh/Public/home/img/cmt2.png" alt="">
            <!-- 小屏幕下个人导航图标开始 -->
            <img  class="hidden-lg cmtMenuLogo" src="/dxyh/Public/home/img/cmt1.png" alt="">
            <!-- 小屏幕下个人导航图标结束 -->
        </a>
        <!-- logo -->
        <!-- 导航开始 -->
        <nav id="sidebar-menu">
            <a href="<?php echo U('Index/index');?>">首页</a>
            <a href="<?php echo U('Coptic/index');?>">科普中心</a>
            <a href="<?php echo U('Activity/index');?>">活动中心</a>
            <a href="<?php echo U('HomeCare/index');?>">家庭护理</a>
            <a href="<?php echo U('Aboutus/index');?>">关于我们</a>
            <a href="<?php echo U('User/index');?>">个人中心</a>
        </nav>
        <!-- 导航结束 -->
        <!-- 登陆注册开始 -->
        <div class="loginBox visible-lg">
            <a href="<?php echo U('Public/login');?>">登录</a>|<a href="<?php echo U('Public/regist');?>">注册</a>
        </div>
        <!-- 登陆注册结束 -->

    </div>
</div>
		<!-- 公共头部结束 -->
		<div class="container wrap box">
			<!-- 左边导航开始 -->
			<div class="col-lg-2 left" id="memberCenter">
    <p class="leftTitle visible-lg">会员中心</p>
    <a href="<?php echo U('User/index');?>"><img src="/dxyh/Public/home/img/c2.png" alt="">个人信息</a>
    <a href="<?php echo U('User/myKeep');?>"><img src="/dxyh/Public/home/img/c3.png" alt="">我的收藏</a>
    <a href="<?php echo U('User/myActivity');?>"><img src="/dxyh/Public/home/img/c4.png" alt="">我的活动</a>
    <a href="<?php echo U('User/myIntegral');?>"><img src="/dxyh/Public/home/img/c9.png" alt="">我的积分</a>
    <a href="<?php echo U('User/modifyPasswd');?>"><img src="/dxyh/Public/home/img/c5.png" alt="">修改密码</a>
</div>
			<!-- 左边导航结束 -->
			<!-- 右侧信息模块开始 -->
			<div class="col-lg-10">
				<div class="right cpright clearfix">
					<p class="rightTitle visible-lg">修改资料</p>
					<form action="" class="cmForm">
						<table class="cpTable">
							<tr>
								<td>头像</td>
								<td><label class="cmImgLabel" for="cmIMG"><img src="/dxyh/Public/home/img/cm2.png" alt=""><p>上传头像</p></label></td>
							</tr>
							<tr>
								<td>昵称</td>
								<td><input type="text" value="花香四溢"></td>
							</tr>
							<tr>
								<td>真实姓名</td>
								<td><input type="text" value="董小姐"></td>
							</tr>
							<tr>
								<td>性别</td>
								<td class="sexbox">
									<input checked="checked" name="sex" type="radio">保密
									<input name="sex" type="radio"><img src="/dxyh/Public/home/img/cm1.png" alt="">
									<input style="margin-left: 20px" name="sex" type="radio"><img src="/dxyh/Public/home/img/c1.png" alt="">
								</td>
							</tr>
							<tr>
								<td>手机号</td>
								<td><input type="text" value="1842524266"></td>
							</tr>
							<tr>
								<td></td>
								<td>
									<button type="submit" class="cpSubmit">确认</button>
									<button type="button" class="cpCancle">取消</button>
								</td>
							</tr>
							<!-- 头像 -->
							<input id="cmIMG" style="display: none;" type="file">
						</table>
					</form>
					
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
		<script type="text/javascript" src="/dxyh/Public/home/js/jquery1.91.min.js"></script>
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
		<script>
    //js控制导航选中效果
    (function(){
        var tDiv = document.getElementById("sidebar-menu"),
        links = tDiv.getElementsByTagName("a"),
        index = 0,//默认第一个菜单项
        url = location.href.split('?')[0].split('/');//取当前URL最后一个 / 后面的文件名，pop方法是删除最后一个元素并返回最后一个元素
        if(url[3] && url[4]){    //如果有取到, 则进行匹配, 否则默认为首页(即index的值所指向的那个)
            url = url[3]+'/'+url[4];
            for (var i=links.length; i--;) {    //遍历 menu 的中连接地址
                if(links[i].href.indexOf(url) !== -1){
                    index = i;
                    break;
                }
            }
        }
        links[index].className = 'active';
    })();


</script>
		<script type="text/javascript">
		var mcenter = document.getElementById("memberCenter"),
		alinks = mcenter.getElementsByTagName("a"),
		indexes = 0,//默认第一个菜单项
		aurl = location.href.split('?')[0].split('/');//取当前URL最后一个 / 后面的文件名，pop方法是删除最后一个元素并返回最后一个元素
		if(aurl[5]){    //如果有取到, 则进行匹配, 否则默认为首页(即index的值所指向的那个)
		aurl = aurl[5];
		for (var j=alinks.length; j--;) {    //遍历 menu 的中连接地址
		if(alinks[j].href.indexOf(aurl) !== -1){
		indexes = j;
		break;
		}
		}
		}
		alinks[indexes].className = 'leftActive';
		</script>
	</body>
</html>