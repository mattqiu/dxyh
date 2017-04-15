/*
* @Author: Administrator
* @Date:   2017-04-13 23:59:59
* @Last Modified by:   Administrator
* @Last Modified time: 2017-04-14 00:06:35
*/


/*
 * @Author: Administrator
 * @Date:   2017-04-13 23:37:58
 * @Last Modified by:   Administrator
 * @Last Modified time: 2017-04-13 23:58:18
 */
function adjustF(){
			$(".figcaption").each(function(i) {
		var divH = $(this).height();
		var $p = $("p", $(this)).eq(0);
		while ($p.outerHeight() > divH) {
		$p.text($p.text().replace(/(\s)*([a-zA-Z0-9]+|\W)(\.\.\.)?$/, "..."));
		};
		})
		}
$(function() {
		// 摘要多行显示省略号
		adjustF();
		
	// 搜索框展示栏目分类
	$(".input").focus(function() {
		$(".activeStyle").show();
	})
	$(".input").blur(function() {
		$(".activeStyle").hide();
	})
})


//1. 下拉刷新功能开始
$(function() {
	var clientWidth = document.documentElement && document.documentElement.clientWidth || document.body.clientWidth || window.innerWidth;
	var n = 3; //轮播图显示个数
	if (clientWidth < 1200) {	
		 //小屏幕小，显示一个轮播页
	
	// 页数
	var page = 0;
	// 每页展示5个
	var size = 5;

	// dropload
	$('.activeListWrap').dropload({
		scrollArea: window,
		autoLoad:false,//设置自动加载
		loadDownFn: function(me) {
			page++;
			// 拼接HTML
			var result = '';
			$.ajax({
				type: 'GET',
				url: 'http://ons.me/tools/dropload/json.php?page=' + page + '&size=' + size,
				dataType: 'json',
				success: function(data) {
					var arrLen = data.length;
					if (arrLen > 0) {
						for (var i = 0; i < arrLen; i++) {
							result += '<!-- 一个文章开始 --><div class="activeList clearfix"><a href="scienceDetail.html"><div class="col-xs-4 col-lg-3"><img src="../img/img1.png"alt=""></div><div class="col-xs-8 col-lg-9 activeListR"><h1>标题标题标题标题标题标题标题标题标题标题标题标题标题标题</h1><p>作者：XXXX&nbsp;&nbsp;&nbsp;&nbsp;2017-02-15 <span class="author visible-lg">踏雪无痕</span></p><div class="figcaption"><p>文章内容，文章内容，文章内容，文章内容，文章内容，文章内容，文章内容，文章内容，文章内容，文章内容，文章内容，文章内容章内容，文章内容，文章内容，文章内容，文章内容，文章内容容，文章内容，文章内容，文章内容章内容，文章内容，文章内容，文章内容，文章内容，文章内容</p></div></div></a></div><!-- 一个文章结束 -->';
						}
						// 如果没有数据
					} else {
						// 锁定
						me.lock();
						// 无数据
						me.noData();
					}
					// 为了测试，延迟1秒加载
					setTimeout(function() {
						// 插入数据到页面，放到最后面
						$('.activeListBox').append(result);
						adjustF();
						// 每次数据插入，必须重置
						me.resetload();
					}, 1000);
				},
				error: function(xhr, type) {
					alert('Ajax error!');
					// 即使加载出错，也得重置
					me.resetload();
				}
			});
		}
	});
	}
});
// 下拉刷新功能结束