<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>科普详情</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/Public/home/css/base.css">
		<link rel="stylesheet" href="/Public/home/css/activeDetail.css">
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
		<div class="container wrap activeDetail">
			<!-- 左边详情开始 -->
			<div class="col-lg-9 activeDetailL">
				<!-- 标题开始 -->
				<h1 class="activeTitle">科技部公布2016优秀科普作品名单</h1>
				<!-- 标题结束 -->
				<p class="author">作者：<?php echo ($rows["author"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($rows["create_time"]); ?></p>
				<div class="container">
					<div class="col-lg-8 keyWord">关键词：<span><?php echo ($rows["keyword"]); ?></span></div>
					<div class="col-lg-4 keyWord">
						<strong><img src="/Public/home/img/ss0.png" alt=""><img style="display: none;" src="/Public/home/img/ss1.png" alt="">收藏</strong>
						<strong><img src="/Public/home/img/zz0.png" alt=""><img style="display: none;" src="/Public/home/img/zz1.png" alt="">赞</strong>
					</div>
				</div>
				
				<!-- 活动内容开始 -->
				<div class="content">
					<?php echo ($rows["content"]); ?>
					<!-- 活动时间等信息开始 -->
					<div class="from">来源：<?php echo ($rows["source"]); ?></div>
					<div class="fromA">原文链接：<a href="<?php echo ($rows["original_link"]); ?>"><?php echo ($rows["original_link"]); ?></a></div>
					<!-- 发表评论开始 -->
					<a href="#publish" class="publishBtn">发表评论</a>
					<!-- 评论列表开始 -->
					<div class="discussBox">
						<div class="filter">
							<span class="filterActive">最热</span>&nbsp;&nbsp;|&nbsp;&nbsp;<span>最新</span>
						</div>
						<!-- 一个评论开始 -->
						<div class="discussList">
							<p class="user">
								<img src="/Public/home/img/img1.png" alt=""><!-- 头像 -->
								<span>二十</span><!-- 用户名 -->
							</p>
							<!-- 评论内容开始 -->
							<p>要说套路，要说套路，要说套路，要说套路，要说套路要说套路，要说套路，要说套路，要说套路</p>
							<!-- 评论内容结束 -->
							<!-- 对评论的点评内容开始 -->
							<div class="reBox">
								<img class="sanjiao" src="/Public/home/img/sanjiao.png" alt=""><!-- 三角图标 -->
								<p class="reTitle"><span>点评</span></p>
								<div class="container discussContent">
									<div class="col-lg-3 username">
										<img src="/Public/home/img/img1.png" alt="">
										辣条不辣 ：
									</div>
									<div class="col-lg-9 discussContentR">我差点就信了</div>
								</div>
								<p class="r1">回复</p>
								<form action="" class="reForm">
									<textarea class="content1" placeholder="回复 辣条不辣："></textarea>
									<button class="reFormBtn">发表</button>
								</form>
							</div>
							<!-- 对评论的点评内容结束 -->
							<!-- 评论时间开始 -->
							<p class="discussTime">
								<span class="discusstime">2017-04-01 09:10</span>
								<span class="dianPing">我要点评</span>
								<img src="/Public/home/img/zz0.png" alt="">
								<span>8</span>
							</p>
							<!-- 评论时间结束 -->
							<!-- 发表点评表单开始 -->
							<form action="" class="reForm2">
								<textarea class="content1"></textarea>
								<button class="reFormBtn">发表</button>
							</form>
							<!-- 发表点评表单结束 -->
						</div>
						<!-- 一个评论结束 -->
						<!-- 一个评论开始 -->
						<div class="discussList">
							<p class="user">
								<img src="/Public/home/img/img1.png" alt=""><!-- 头像 -->
								<span>二十</span><!-- 用户名 -->
							</p>
							<!-- 评论内容开始 -->
							<p>要说套路，要说套路，要说套路，要说套路，要说套路要说套路，要说套路，要说套路，要说套路</p>
							<!-- 评论内容结束 -->
							<!-- 点评结束 -->
							<!-- 评论时间开始 -->
							<p class="discussTime">
								<span class="discusstime">2017-04-01 09:10</span>
								<span class="dianPing">我要点评</span>
								<img src="/Public/home/img/zz1.png" alt="">
								<span>8</span>
							</p>
							<!-- 评论时间结束 -->
							<!-- 发表点评表单开始 -->
							<form action="" class="reForm2">
								<textarea class="content1"></textarea>
								<button class="reFormBtn">发表</button>
							</form>
							<!-- 发表点评表单结束 -->
						</div>
						<!-- 一个评论结束 -->
					</div>
					<!-- 评论列表结束 -->
					<!-- 发表评论结束 -->
				</div>
				<!-- 发表评论开始 -->
				<form id="publish" action="" class="reForm2 reForm3">
					<p style="font-size: 18px;margin-bottom: 5px;">我要评论</p>
					<textarea class="content1"></textarea>
					<button class="reFormBtn">发表</button>
				</form>
				<!-- 发表评论结束 -->
				<!-- 活动内容结束 -->
			</div>
			<!-- 左边详情结束 -->
			<!-- 右边热门科普推荐开始 -->
			<div class="col-lg-3 history scienceHistory">
				<h2 class="visible-lg">热门科普推荐</h2>
				<ul class="historyList visible-lg">
					<!-- 一个热门科普推荐开始 -->
					<?php if(is_array($hotCoptic)): $i = 0; $__LIST__ = $hotCoptic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
							<a href="<?php echo U('Coptic/details', array('id'=>$vo['id']));?>">
								<img src="<?php echo ($vo["coptic_cover"]); ?>" alt="">
								<!-- 标题 -->
								<div class="mengceng"></div><!-- 蒙层 -->
								<p class="historyTitle"><?php echo ($vo["coptic_title"]); ?></p>
							</a>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
					<!-- 一个热门科普推荐结束 -->
				</ul>
			</div>
			<!-- 右边热门科普推荐结束 -->
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
		<script type="text/javascript">
			$(function(){
				// 点击回复，展开回复框
				$(".r1").click(function(){
					$(this).siblings('.reForm').toggle();
				})
				// 点击我要点评，展开点评表单
				$(".dianPing").click(function(){
					$(this).parent().siblings('.reForm2').toggle();
				})
				// 点赞与收藏功能
				$(".keyWord img").click(function(){
					$(this).toggle().siblings('img').toggle();
				})
			})
		</script>
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