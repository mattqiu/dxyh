<?php if (!defined('THINK_PATH')) exit();?> <html lang="zh-cn">
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>
            Demo for QQ登录oauth2.0
        </title>
        <script type="text/javascript">
            var childWindow;
            function toQzoneLogin()
            {
                childWindow = window.open("oauth/index.php","TencentLogin","width=450,height=320,menubar=0,scrollbars=1, resizable=1,status=1,titlebar=0,toolbar=0,location=1");
            } 
            
            function closeChildWindow()
            {
                childWindow.close();
            }
        </script>
    </head>
    <body>
        <br><br>
        <a href="#" onclick='toQzoneLogin()'>登录</a>
        <!--<br><br>
        <a href="user/get_user_info.php"    target="_blank">获取用户信息</a>
		<br><br>
        <a href="share/add_share.html"      target="_blank">添加分享</a>
        <br><br>
        <a href="photo/list_album.php"      target="_blank">获取相册列表</a>
        <br><br>
        <a href="photo/add_album.html"      target="_blank">创建相册</a>
        <br><br>
        <a href="photo/upload_pic.php"     target="_blank">上传相片</a>
        <br><br>
        <a href="blog/add_blog.html"     target="_blank">发表日志</a>
        <br><br>
        <a href="topic/add_topic.html"     target="_blank">发表说说</a>
        <br><br>
        <a href="weibo/add_weibo.html"     target="_blank">发表微博</a>
        <br><br>
        <a href="check_fan/check_page_fans.php"     target="_blank">检查是否是认证空间的粉丝</a>
        <br><br>
        <a href="add_pic_t/add_pic_t.php"     target="_blank">发图片消息到微博</a>
        <br><br>
        <a href="get_info/get_info.php"     target="_blank">获取微博用户信息</a>
        <br><br>
        <a href="get_fanslist/get_fanslist.php"     target="_blank">获取用户的听众列表</a>
        <br><br>
        <a href="get_idollist/get_idollist.php"     target="_blank">获取用户的收听列表</a>
        <br><br>
        <a href="add_idol/add_idol.php"     target="_blank">收听腾讯微博上的用户</a>
        <br><br>
        <a href="get_tenpay_addr/get_tenpay_addr.php"     target="_blank">获取财付通用户的收货地址</a>-->
    </body>
</html>