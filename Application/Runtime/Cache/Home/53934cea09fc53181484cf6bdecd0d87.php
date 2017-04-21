<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>科普中心</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="/Public/home/css/base.css">
		<link rel="stylesheet" href="/Public/home/css/dropload.css">
		<link rel="stylesheet" href="/Public/home/css/activity.css">
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
            <?php if(!empty($_SESSION['uid'])): ?><a href="<?php echo U('User/index');?>">个人中心</a><?php endif; ?>
        </nav>
        <!-- 导航结束 -->
        <!-- 登陆注册开始 -->
        <div class="loginBox">
            <?php if(empty($_SESSION['uid'])): ?><a href="<?php echo U('Public/login');?>">登录</a><span>|</span><a href="<?php echo U('Public/regist');?>">注册</a>
                <?php else: ?>
                <a href="<?php echo U('Public/signOut');?>">退出</a><?php endif; ?>
        </div>
        <!-- 登陆注册结束 -->

    </div>
</div>
		<!-- 公共头部结束 -->
		<img class="visible-lg" style="width: 100%;height: 460px;" src="/Public/home/img/s1.png" alt="">
		<!-- 活动分类开始 -->
		<!-- 大屏幕下标题开始 -->
		<div class="titleLogo container visible-lg">
			<div class="col-xs-6 col-lg-1 col-lg-push-5 titleLogoL"><p>S</p></div>
			<div class="col-xs-6 col-lg-2 col-lg-push-5 titleLogoR">
				<p>科普中心</p>
				<p>cience</p>
			</div>
		</div>
		<!-- 大屏幕下标题结束 -->
		<div class="container wrap activeStyle">
			<div class="col-lg-1 activeStyleL">栏目分类</div>
			<div class="col-lg-11 activeStyleR">
                <a href="javascript:;" data-value="0">全部</a>
					<?php if(is_array($copticType)): $i = 0; $__LIST__ = $copticType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="javascript:;" data-value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["category_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
					<!--<a href="#">6e药师</a>
					<a href="#" class="activeStyleActive">社区卫生</a>
					<a href="#">踏雪无痕</a>
					<a href="#">肾入人心</a>
					<a href="#">金牌阿姨</a>
					<a href="#">科教电影</a>
					<a href="#">打开眼界</a>
					<a href="#">6e药师的方式发生</a>
					<a href="#">社区卫生</a>
					<a href="#">踏雪无痕</a>
					<a href="#">社区卫生</a>
					<a href="#">6e药师</a>
					<a href="#">社区卫生</a>
					<a href="#">踏雪无痕</a>
					<a href="#">肾入人心</a>-->
			</div>
		</div>
		<!-- 活动分类结束 -->
		<!-- 搜索开始 -->
		<div class="container wrap searchBox">
			<div class="col-lg-1 searchBoxL visible-lg">关键词</div>
			<div class="col-lg-11 searchBoxR">
				<form action="<?php echo U('Coptic/index');?>" method="get" id="form1">    <span class="hidden-lg styleBtn" >分类</span>
					<input type="text" class="input" name="keyword" value="<?php echo ($keyword); ?>">
					<input type="submit" class="submit visible-lg" onclick="subKeyWord()" value="查询">
					<span class="submit hidden-lg" onclick="subKeyWord()">查询</span><!-- 小屏幕下的查询 -->
                    <input name="typeId" type="hidden" value=""/>
				</form>
			</div>
		</div>
		<!-- 搜索结束 -->
		<!-- 小屏幕下显示的图片开始 -->
		<img class="visible-xs" style="width: 100%;height: auto;margin-top: 20px;" src="/Public/home/img/s1.png" alt="">
		<!-- 小屏幕下显示的图片结束 -->
		<!-- 活动开始 -->
		<div class="container wrap activeBox">
			<!-- 左边文章列表开始 -->
			<div class="col-lg-9 activeListWrap">
				<div class="activeListBox">
					<!-- 一个文章开始 -->
                    <?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="activeList clearfix">
                            <a href="<?php echo U('Coptic/details',array('id'=>$vo['id']));?>">
                                <div class="col-xs-4 col-lg-3">
                                    <img src="<?php echo ($vo["coptic_cover"]); ?>" alt="">
                                </div>
                                <div class="col-xs-8 col-lg-9 activeListR">
                                    <h1><?php echo ($vo["coptic_title"]); ?></h1>
                                    <p>作者：<?php echo ($vo["author"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($vo["create_time"]); ?> <span class="author visible-lg"><?php echo ($vo["category_name"]); ?></span></p>
                                    <div class="figcaption">
                                        <p><?php echo ($vo["abstract"]); ?></p>
                                    </div>

                                </div>
                            </a>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
					<!-- 一个文章结束 -->
				</div>
				<!-- 分页开始 -->
				<div class="pages clearfix visible-lg">
                    <?php echo ($page); ?>
                </div>
				<!-- 分页结束 -->
			</div>
			<!-- 左边文章列表结束 -->
			<!-- 右边热门活动回顾开始 -->
			<div class="col-lg-3 history visible-lg">
				<h2>热门科普推荐</h2>
				<ul class="historyList">
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
		<script type="text/javascript" src="/Public/home/js/jquery1.91.min.js"></script>
		<script type="text/javascript" src="/Public/home/js/dropload.min.js"></script>
		<script type="text/javascript" src="/Public/home/js/science.js"></script>
        <script type="text/javascript" src="/Public/home/js/common.js"></script>
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
            $(function () {
                $('.activeStyle a:first').addClass("activeStyleActive");

                var id = "<?php echo ($id); ?>";
                if (id){
                    $(".activeStyle").find('a').removeClass('activeStyleActive');
                    $(".activeStyle").find('a').each(function () {
                        if ($(this).attr("data-value") == id){
                            $(this).addClass('activeStyleActive');
                        }
                    })
                }
            });

            $(".activeStyle").find('a').each(function () {
                $(this).on('click', function () {
                    var typeId = $(this).attr('data-value');
                    $("input[name='typeId']").val(typeId);
                    $("#form1").submit();
                });
            });

            function subKeyWord() {
                $("input[name='typeId']").val($(".activeStyleActive").attr("data-value"));
                $("#form1").submit();
            }


            /*if (browserRedirect() == "pc") {

                $(function () {
                    $('.activeStyle a:first').addClass("activeStyleActive");
                    Coptic();
                })

                function Coptic(typeId, keyword, p) {
                    var data = {};
                    if (typeId){
                        data['typeId'] = typeId;
                    }
                    if (keyword){
                        data['keyword'] = keyword;
                    }
                    if (p){
                        data['p'] = p;
                    }else{
                        data['p'] = 0;
                    }
                    console.log(data);

                    $.ajax({
                        url: '<?php echo U("Coptic/copticJsonData");?>',
                        data: data,
                        dataType: 'json',
                        type: 'get',
                        success: function (json) {
                            console.log(json);
                            if (json.code == 0){
                                var url = "<?php echo U('Coptic/scienceDetail');?>?id=";
                                var row = [];
                                $.each(json.data.list, function (key, item) {
                                    row[key] = '<div class="activeList clearfix">';
                                    row[key] += '<a href="'+url+item.id+'"><div class="col-xs-4 col-lg-3">';
                                    row[key] += '<img src="'+item.coptic_cover+'"alt=""></div>';
                                    row[key] += '<div class="col-xs-8 col-lg-9 activeListR">';
                                    row[key] += '<h1>'+item.coptic_title+'</h1>';
                                    row[key] += '<p>作者：'+item.author+'&nbsp;&nbsp;&nbsp;&nbsp;'+item.create_time;
                                    row[key] += '<span class="author visible-lg">'+item.category_name+'</span></p>';
                                    row[key] += '<div class="figcaption"><p>'+item.abstract+'</p></div></div></a></div>';
                                });
                                row = row.join('');
                                console.log(row);
                                $('.activeListBox').html(row);

                                if (json.data.totalPages > 1){
                                    //分页
                                    var nowPage = parseInt(json.data.p);
                                    var totalPages = json.data.totalPages;
                                    var rollPage = 5;
                                    var now_cool_page      = rollPage/2;
                                    var now_cool_page_ceil = Math.ceil(now_cool_page);
                                    var page;
                                    var pages = '';
                                    //首页
                                    if(nowPage > 1) {
                                        pages += '<a href="javascript:;" class="home" onclick="js_method(this)" data-value="0">首页</a>';
                                    }
                                    //上一页
                                    pages += ((nowPage - 1) > 0)?'<a class="pre" href="javascript:;" onclick="js_method(this)" data-value="'+(nowPage-1)+'">上一页</a>':'';
                                    for(var i = 1; i <= rollPage; i++){
                                        if((nowPage - now_cool_page) <= 0 ){
                                            page = i;
                                        }else if((nowPage + now_cool_page - 1) >= totalPages){
                                            page = totalPages - rollPage + i;
                                        }else{
                                            page = nowPage - now_cool_page_ceil + i;
                                        }
                                        if(page > 0 && page != nowPage){

                                            if(page <= totalPages){
                                                pages += '<a href="javascript:;" onclick="js_method(this)" data-value="'+page+'">'+page+'</a>';
                                            }else{
                                                break;
                                            }
                                        }else{
                                            if(page > 0 && totalPages != 1){
                                                pages += '<a class="pageActive" href="javascript:;" onclick="js_method(this)" data-value="'+page+'">'+page+'</a>';
                                            }
                                        }
                                    }
                                    pages += ((nowPage + 1) <= totalPages)?'<a class="pre" href="javascript:;" onclick="js_method(this)" data-value="'+(parseInt(nowPage)+1)+'">下一页</a>':'';
                                    if(nowPage < totalPages) {
                                        pages += '<a class="pre" href="javascript:;" onclick="js_method(this)" data-value="' + totalPages + '">尾页</a>';
                                    }
                                    $(".pages").html(pages);
                                }else{
                                    $(".pages").html('');
                                }
                            }else {
                                $(".activeListBox").html("暂无数据");
                                $(".pages").html('');
                            }

                            if (json.data.typeId){
                                $(".activeStyle").find('a').removeClass('activeStyleActive');
                                $(".activeStyle").find('a').each(function () {
                                    if ($(this).attr("data-value") == json.data.typeId){
                                        $(this).addClass('activeStyleActive');
                                    }
                                })
                            }
                        }
                    });
                }

                function js_method(obj) {
                    var p = $(obj).attr('data-value');
                    var typeId = '';
                    $(".activeStyle").find("a").each(function () {
                        if ($(this).hasClass("activeStyleActive")){
                            typeId = $(this).attr('data-value');
                        }
                    });
                    var keyword = $("input[name='keyword']").val();
                    Coptic(typeId, keyword, p);
                }

                $(".activeStyle").find('a').each(function () {
                    $(this).on('click', function () {
                        var typeId = $(this).attr('data-value');
                        var keyword = $("input[name='keyword']").val();
                        Coptic(typeId, keyword);
                    });
                });

                function subKeyWord() {
                    var typeId = '';
                    $(".activeStyle").find("a").each(function () {
                        if ($(this).hasClass("activeStyleActive")){
                            typeId = $(this).attr('data-value');
                        }
                    });
                    var keyword = $("input[name='keyword']").val();
                    Coptic(typeId, keyword);
                }
			}else if (browserRedirect() == "phone"){
                $.ajax({
                    url: '<?php echo U("Coptic/copticJsonData");?>',
                    dataType: 'json',
                    type: 'get',
                    success: function (json) {
                        console.log(json);
                        if (json.code == 0){
                            var url = "<?php echo U('Coptic/scienceDetail');?>?id=";
                            var row = [];
                            $.each(json.data.list, function (key, item) {
                                row[key] = '<div class="activeList clearfix">';
                                row[key] += '<a href="'+url+item.id+'"><div class="col-xs-4 col-lg-3">';
                                row[key] += '<img src="'+item.coptic_cover+'"alt=""></div>';
                                row[key] += '<div class="col-xs-8 col-lg-9 activeListR">';
                                row[key] += '<h1>'+item.coptic_title+'</h1>';
                                row[key] += '<p>作者：'+item.author+'&nbsp;&nbsp;&nbsp;&nbsp;'+item.create_time;
                                row[key] += '<span class="author visible-lg">'+item.category_name+'</span></p>';
                                row[key] += '<div class="figcaption"><p>'+item.abstract+'</p></div></div></a></div>';
                            });
                            row = row.join('');
                            console.log(row);
                            $('.activeListBox').append(row);
                        }else {
                            $(".activeListBox").html("暂无数据");
                        }

                        if (json.data.typeId){
                            $(".activeStyle").find('a').removeClass('activeStyleActive');
                            $(".activeStyle").find('a').each(function () {
                                if ($(this).attr("data-value") == json.data.typeId){
                                    $(this).addClass('activeStyleActive');
                                }
                            })
                        }
                    }
                })
            }*/
		</script>
	</body>
</html>