$(function() {
	var clientWidth = document.documentElement && document.documentElement.clientWidth || document.body.clientWidth || window.innerWidth;
	var n = 3; //轮播图显示个数
	if (clientWidth < 1200) {
		n = 1; //小屏幕小，显示一个轮播页
	}
	// 顶部轮播图
	var mySwiper1 = $('.swiper1').swiper({
		autoplay: 5000,
		loop: true,
		pagination: '.pagination',
		paginationClickable: true
	});
	// 板块风采轮播图
	var mySwiper2 = $('.swiper2').swiper({
		autoplay: 5000,
		loop: true,
		slidesPerView: n,
	});
	// 上一页
	$(".pre2").click(function() {
			mySwiper2.swipePrev();
		})
		// 下一页
	$(".next2").click(function() {
		mySwiper2.swipeNext();
	})
})

//		多行文本省略...显示开始
$(".figcaption").each(function(i) {
		var divH = $(this).height();
		var $p = $("p", $(this)).eq(0);
		while ($p.outerHeight() > divH) {
			$p.text($p.text().replace(/(\s)*([a-zA-Z0-9]+|\W)(\.\.\.)?$/, "..."));
		};
	})
	//			多行文本省略...结束