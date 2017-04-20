<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>家庭护理详情</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/Public/home/css/base.css">
		<link rel="stylesheet" href="/Public/home/css/familyDetail.css">
		<link rel="Shortcut Icon" href="/Public/home/img/dyxh.ico" >
		<link rel="stylesheet" href="/Public/artDialog/css/dialog.css">
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
		<div class="wrap main">
			<!-- 左侧目录模块开始 -->
			<div class="leftMenu visible-lg">
				<a href="<?php echo U('HomeCare/index',array('id'=>1));?>" class="leftMulu">目录</a>
				<a href="<?php echo U('HomeCare/detail',array('id'=>$prevChapter));?>" data-value="<?php echo ($prevChapter); ?>" class="leftSZ prev">上一章</a>
				<a href="<?php echo U('HomeCare/detail',array('id'=>$prevSection));?>" data-value="<?php echo ($prevSection); ?>" class="leftSJ prev">上一节</a>
				<a href="<?php echo U('HomeCare/detail',array('id'=>$nextSection));?>" data-value="<?php echo ($nextSection); ?>" class="leftXJ next">下一节</a>
				<a href="<?php echo U('HomeCare/detail',array('id'=>$nextChapter));?>" data-value="<?php echo ($nextChapter); ?>" class="leftXZ next">下一章</a>
			</div>
			<!-- 左侧目录模块结束 -->
			<!-- 文字区域开始 -->
			<?php if($chapter): if($chapter.parent_name): ?><h1><?php echo ($chapter["parent_name"]); ?>&nbsp;&nbsp;<?php echo ($chapter["chapter_name"]); ?></h1>
					<?php else: ?>
					<h1><?php echo ($chapter["chapter_name"]); ?></h1><?php endif; ?>
				<div class="time"><?php echo ($chapter["create_time"]); ?></div>
				<h2 class="title"><?php echo ($chapter["title"]); ?></h2>
				<?php echo ($chapter["content"]); ?>
				<?php else: ?>
				<h2 class="title">暂无数据</h2><?php endif; ?>

			<!-- 文字区域结束 -->
			<!-- 底部上一章控制区域开始 -->
			<div class="bottomMenu">
				<a href="<?php echo U('HomeCare/detail',array('id'=>$prevChapter));?>" data-value="<?php echo ($prevChapter); ?>" class="prev">上一章</a>
				<a href="<?php echo U('HomeCare/detail',array('id'=>$prevSection));?>" data-value="<?php echo ($prevSection); ?>" class="prev">上一节</a>
				<a href="<?php echo U('HomeCare/index',array('id'=>1));?>" class="mulu">目录</a>
				<a href="<?php echo U('HomeCare/detail',array('id'=>$nextSection));?>" data-value="<?php echo ($nextSection); ?>" class="next">下一节</a>
				<a href="<?php echo U('HomeCare/detail',array('id'=>$nextChapter));?>" data-value="<?php echo ($nextChapter); ?>" class="next">下一章</a>
			</div>
			<!-- 底部上一章控制区域结束 -->
			<div></div>
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
		<script type="text/javascript" src="/Public/artDialog/dist/dialog.js"></script>
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
			$(function () {
				$(".prev").click(function () {
					if ($(this).attr('data-value') == ''){
                        var d = dialog({
                            content: '已经是开始章节'
                        });
                        d.show();
                        setTimeout(function () {
                            d.close().remove();
                        }, 2000);
                        return false;
					}
                });

				$(".next").click(function () {
                    if ($(this).attr('data-value') == ''){
                        var d = dialog({
                            content: '已经是最新章节'
                        });
                        d.show();
                        setTimeout(function () {
                            d.close().remove();
                        }, 2000);
                        return false;
                    }
                })
            })
		</script>
	</body>
</html>