<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>个人中心-我的积分</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/Public/home/css/base.css">
		<link rel="stylesheet" href="/Public/home/css/dropload.css">
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
            <!-- 小屏幕下个人导航图标结束 -->
                    <img src="/Public/home/img/c6.png" class="cmtUser hidden-lg" alt="">
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
        <div class="loginBox">
            <a href="<?php echo U('Public/login');?>">登录</a><span>|</span><a href="<?php echo U('Public/regist');?>">注册</a>
        </div>
        <!-- 登陆注册结束 -->

    </div>
</div>
		<!-- 公共头部结束 -->
		<div class="container wrap box">
			<!-- 左边导航开始 -->
			<div class="col-lg-2 left" id="memberCenter">
    <p class="leftTitle visible-lg">会员中心</p>
    <a href="<?php echo U('User/index');?>"><img src="/Public/home/img/c2.png" alt="">个人信息</a>
    <a href="<?php echo U('User/myKeep');?>"><img src="/Public/home/img/c3.png" alt="">我的收藏</a>
    <a href="<?php echo U('User/myActivity');?>"><img src="/Public/home/img/c4.png" alt="">我的活动</a>
    <a href="<?php echo U('User/myIntegral');?>"><img src="/Public/home/img/c9.png" alt="">我的积分</a>
    <a href="<?php echo U('User/modifyPasswd');?>"><img src="/Public/home/img/c5.png" alt="">修改密码</a>
</div>
			<!-- 左边导航结束 -->
			<!-- 右侧信息模块开始 -->
			<div class="col-lg-10">
				<div class="right">
					<p class="rightTitle visible-lg">我的积分</p>
					<p class="Jamount">当前账户积分：<span>0</span><span>分</span></p>
					<table class="Jtable">
						<tr class="t1">
							<th>时间</th>
							<th>积分变化</th>
							<th>详情</th>
						</tr>
						<tr>
							<td>2016-12-04&nbsp;&nbsp;10:52</td>
							<td class="Jjia">+1230</td>
							<td>参与活动获取积分</td>
						</tr>
						<tr>
							<td>2016-12-04&nbsp;&nbsp;10:52</td>
							<td class="Jjia">+1230</td>
							<td>参与活动获取积分</td>
						</tr>
						<tr>
							<td>2016-12-04&nbsp;&nbsp;10:52</td>
							<td class="Jjia">+1230</td>
							<td>参与活动获取积分</td>
						</tr>
						<tr>
							<td>2016-12-04&nbsp;&nbsp;10:52</td>
							<td class="Jjian">-1230</td>
							<td>参与活动获取积分</td>
						</tr>
						<tr>
							<td>2016-12-04&nbsp;&nbsp;10:52</td>
							<td class="Jjia">+1230</td>
							<td>参与活动获取积分</td>
						</tr>
						<tr>
							<td>2016-12-04&nbsp;&nbsp;10:52</td>
							<td class="Jjian">-1230</td>
							<td>参与活动获取积分</td>
						</tr>
						<tr>
							<td>2016-12-04&nbsp;&nbsp;10:52</td>
							<td class="Jjia">+1230</td>
							<td>参与活动获取积分</td>
						</tr>
						<tr>
							<td>2016-12-04&nbsp;&nbsp;10:52</td>
							<td class="Jjian">-1230</td>
							<td>参与活动获取积分</td>
						</tr>
					</table>
					<!-- 分页开始 -->
					<div class="pages clearfix visible-lg">
						<a href="#" class="home">首页</a>
						<a class="pre" href="#">上一页</a>
						<a class="pageActive" href="#">1</a>
						<a href="#">2</a>
						<a href="#">3</a>
						<a href="#">4</a>
						<a href="#">5</a>
						<a class="next" href="#">下一页</a>
						<a href="#">尾页</a>
					</div>
					<!-- 分页结束 -->
				</div>
			</div>
			<!-- 右侧信息模块结束 -->
		</div>
		<!-- 公共底部模块开始 -->
		<div class="commonBottom visible-lg">
    <div class="links">
        <a href="#" class="key">友情链接</a>
        <?php echo ($link); ?>
        <p class="Copyright">Copyright © 2017达医晓护网，All&nbsp;rights&nbsp;reserved&nbsp;&nbsp;沪[CP备]4008832号&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;上海松点网络科技有限公司技术支持</p>
    </div>
</div>
		<!-- 公共底部模块结束 -->
		<script type="text/javascript" src="/Public/home/js/jquery1.91.min.js"></script>
		<script type="text/javascript" src="/Public/home/js/dropload.min.js"></script>
		<script type="text/javascript" src="/Public/home/js/jifen.js"></script>
			<script type="text/javascript">
                                
            $(function() {
                // 小屏幕展开导航效果
                $(".cmtMenuLogo").click(function() {
                    $(".cmtUser").toggle();
                    $(".logoImg").toggleClass('commonPR');
                    $(".commonTop nav").toggle();
                    $(".commonTop").toggleClass('t6');
                }
                )
                // 小屏幕展开登录
                $(".cmtUser").click(function() {
                    $(".cmtMenuLogo").toggle();
                    $(".logoImg").toggleClass('commonPL');
                    $(".loginBox").toggle();
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