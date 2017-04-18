<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>活动中心</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/dxyh/Public/home/css/base.css">
		<link rel="stylesheet" href="/dxyh/Public/home/css/dropload.css">
		<link rel="stylesheet" href="/dxyh/Public/home/css/activity.css">
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
		<img class="visible-lg" style="width: 100%;height: 460px;" src="/dxyh/Public/home/img/a3.png" alt="">
		<!-- 大屏幕下标题开始 -->
		<div class="titleLogo container visible-lg">
			<div class="col-xs-6 col-lg-1 col-lg-push-5 titleLogoL"><p>A</p></div>
			<div class="col-xs-6 col-lg-2 col-lg-push-5 titleLogoR">
				<p>活动中心</p>
				<p>ctivity</p>
			</div>
		</div>
		<!-- 大屏幕下标题结束 -->
		<!-- 活动分类开始 -->
		<div class="container wrap activeStyle">
			<div class="col-lg-1 activeStyleL">活动分类</div>
			<div class="col-lg-11 activeStyleR">
				<p>
					<a href="#">6e药师</a>
					<a class="activeStyleActive" href="#">社区卫生</a>
					<a href="#">踏雪无痕</a>
					<a href="#">肾入人心</a>
					<a href="#">金牌阿姨</a>
					<a href="#">科教电影</a>
					<a href="#">打开眼界</a>
					<a href="#">6e药师</a>
					<a href="#">社区卫生</a>
					<a href="#">踏雪无痕</a>
					<a href="#">社区卫生</a>
				</p>
				<p>
					<a href="#">6e药师</a>
					<a href="#">社区卫生</a>
					<a href="#">踏雪无痕</a>
					<a href="#">肾入人心</a>
					<a href="#">金牌阿姨</a>
					<a href="#">科教电影</a>
					<a href="#">打开眼界</a>
					<a href="#">6e药师</a>
					<a href="#">社区卫生</a>
					<a href="#">踏雪无痕</a>
					<a href="#">社区卫生</a>
				</p>
				<p>
					<a href="#">6e药师</a>
					<a href="#">社区卫生</a>
					<a href="#">踏雪无痕</a>
					<a href="#">肾入人心</a>
				</p>
				
			</div>
		</div>
		<!-- 活动分类结束 -->
		<!-- 搜索开始 -->
		<div class="container wrap searchBox">
			<div class="col-lg-1 searchBoxL visible-lg">关键词</div>
			<div class="col-lg-11 searchBoxR">
				<form action="">
					<span class="hidden-lg styleBtn" >分类</span>
					<input type="text" class="input">
					<input type="submit" class="submit visible-lg" value="查询">
					<span class="submit hidden-lg">查询</span><!-- 小屏幕下的查询 -->
				</form>
			</div>
		</div>
		<!-- 搜索结束 -->
		<!-- 小屏幕下显示的图片开始 -->
		<img class="visible-xs" style="width: 100%;height: auto;margin-top: 20px;" src="/dxyh/Public/home/img/s1.png" alt="">
		<!-- 小屏幕下显示的图片结束 -->
		<!-- 活动开始 -->
		<div class="container wrap activeBox">
			<!-- 左边活动列表开始 -->
			<div class="col-lg-9 activeListWrap">
				<div class="activeListBox">
					<!-- 一个活动开始 -->
					<div class="activeList clearfix">
						<a href="activityDetail.html">
							<div class="col-xs-4 col-lg-3">
								<img src="/dxyh/Public/home/img/img1.png" alt="">
							</div>
							<div class="col-xs-8 col-lg-9 activeListR">
								<h1>活动标题</h1>
								<p>时间：2017-03-10&nbsp;&nbsp;10:30
									<span class="number">人数限制：300人</span><span class="activeState stateBg1">正在报名</span></p>
									<p>积分：10积分</p>
									<p class="visible-lg">地点：上海市长宁区xxx路526号&nbsp;&nbsp;&nbsp;&nbsp;xxx室</p>
									<!-- 活动状态 -->
								</div>
							</a>
						</div>
						<!-- 一个活动结束 -->
						<!-- 一个活动开始 -->
						<div class="activeList clearfix">
							<a href="activityDetail.html">
								<div class="col-xs-4 col-lg-3">
									<img src="/dxyh/Public/home/img/img1.png" alt="">
								</div>
								<div class="col-xs-8 col-lg-9 activeListR">
									<h1>活动标题</h1>
									<p>时间：2017-03-10&nbsp;&nbsp;10:30
										<span class="number">人数限制：300人</span><span class="activeState">已截止</span></p>
										<p>积分：10积分</p>
										<p class="visible-lg">地点：上海市长宁区xxx路526号&nbsp;&nbsp;&nbsp;&nbsp;xxx室</p>
										<!-- 活动状态 -->
									</div>
								</a>
							</div>
							<!-- 一个活动结束 -->
							<!-- 一个活动开始 -->
							<div class="activeList clearfix">
								<a href="activityDetail.html">
									<div class="col-xs-4 col-lg-3">
										<img src="/dxyh/Public/home/img/img1.png" alt="">
									</div>
									<div class="col-xs-8 col-lg-9 activeListR">
										<h1>活动标题</h1>
										<p>时间：2017-03-10&nbsp;&nbsp;10:30
											<span class="number">人数限制：300人</span><span class="activeState stateBg2">已报满</span></p>
											<p>积分：10积分</p>
											<p class="visible-lg">地点：上海市长宁区xxx路526号&nbsp;&nbsp;&nbsp;&nbsp;xxx室</p>
											<!-- 活动状态 -->
										</div>
									</a>
								</div>
								<!-- 一个活动结束 -->
								<!-- 一个活动开始 -->
								<div class="activeList clearfix">
									<a href="activityDetail.html">
										<div class="col-xs-4 col-lg-3">
											<img src="/dxyh/Public/home/img/img1.png" alt="">
										</div>
										<div class="col-xs-8 col-lg-9 activeListR">
											<h1>活动标题</h1>
											<p>时间：2017-03-10&nbsp;&nbsp;10:30
												<span class="number">人数限制：300人</span><span class="activeState stateBg1">正在报名</span></p>
												<p>积分：10积分</p>
												<p class="visible-lg">地点：上海市长宁区xxx路526号&nbsp;&nbsp;&nbsp;&nbsp;xxx室</p>
												<!-- 活动状态 -->
											</div>
										</a>
									</div>
									<!-- 一个活动结束 -->
									<!-- 一个活动开始 -->
									<div class="activeList clearfix">
										<a href="activityDetail.html">
											<div class="col-xs-4 col-lg-3">
												<img src="/dxyh/Public/home/img/img1.png" alt="">
											</div>
											<div class="col-xs-8 col-lg-9 activeListR">
												<h1>活动标题</h1>
												<p>时间：2017-03-10&nbsp;&nbsp;10:30
													<span class="number">人数限制：300人</span><span class="activeState stateBg1">正在报名</span></p>
													<p>积分：10积分</p>
													<p class="visible-lg">地点：上海市长宁区xxx路526号&nbsp;&nbsp;&nbsp;&nbsp;xxx室</p>
													<!-- 活动状态 -->
												</div>
											</a>
										</div>
										<!-- 一个活动结束 -->
									</div>
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
									</div>
									<!-- 分页结束 -->
								</div>
								<!-- 左边活动列表结束 -->
								<!-- 右边热门活动回顾开始 -->
								<div class="col-lg-3 history visible-lg">
									<h2>热门活动推荐</h2>
									<ul class="historyList">
										<!-- 一个热门活动开始 -->
										<li>
											<a href="#">
												<img src="/dxyh/Public/home/img/img1.png" alt="">
												<!-- 标题 -->
												<div class="mengceng"></div><!-- 蒙层 -->
												<p class="historyTitle">这里是标题，这里是标题，这里是标题,这里是标题，这里是标题，这里是标题</p>
											</a>
										</li>
										<!-- 一个热门活动结束 -->
										<!-- 一个热门活动开始 -->
										<li>
											<a href="#">
												<img src="/dxyh/Public/home/img/img1.png" alt="">
												<!-- 标题 -->
												<div class="mengceng"></div><!-- 蒙层 -->
												<p class="historyTitle">这里是标题，这里是标题，这里是标题,这里是标题，这里是标题，这里是标题</p>
											</a>
										</li>
										<!-- 一个热门活动结束 -->
										<!-- 一个热门活动开始 -->
										<li>
											<a href="#">
												<img src="/dxyh/Public/home/img/img1.png" alt="">
												<!-- 标题 -->
												<div class="mengceng"></div><!-- 蒙层 -->
												<p class="historyTitle">这里是标题，这里是标题，这里是标题,这里是标题，这里是标题，这里是标题</p>
											</a>
										</li>
										<!-- 一个热门活动结束 -->
									</ul>
								</div>
								<!-- 右边热门活动回顾结束 -->
							</div>
							<!-- 活动结束 -->
							<!-- 公共底部模块开始 -->
							<div class="commonBottom visible-lg">
    <div class="links">
        <a href="#" class="key">友情链接</a>
        <?php echo ($link); ?>
        <p class="Copyright">Copyright © 2017达医晓护网，All&nbsp;rights&nbsp;reserved&nbsp;&nbsp;沪[CP备]4008832号&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;上海松点网络科技有限公司技术支持</p>
    </div>
</div>
							<!-- 公共底部模块结束 -->
							<script type="text/javascript" src="/dxyh/Public/home/js/jquery1.91.min.js"></script>
							<script type="text/javascript" src="/dxyh/Public/home/js/dropload.min.js"></script>
							<script type="text/javascript" src="/dxyh/Public/home/js/activity.js"></script>
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
	</body>
</html>