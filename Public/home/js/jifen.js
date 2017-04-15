/*
 * @Author: Administrator
 * @Date:   2017-04-13 23:37:58
 * @Last Modified by:   Administrator
 * @Last Modified time: 2017-04-14 00:14:09
 */

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
	$('.right').dropload({
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
							result += '<tr><td>2016-12-04&nbsp;&nbsp;10:52</td><td class="Jjia">+1230</td><td>参与活动获取积分</td></tr>';
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
						$('.Jtable').append(result);
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