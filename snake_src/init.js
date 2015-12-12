$(function(){
			
	snake.newGame();
	
	$("a#play").click(function(){
		$(this).toggle();
		$("a#pause").toggle();
		if (snake.paused){
			snake.resume();
		} else {
			snake.start();
		}
		return false;
	});

	$("a#pause").click(function(){
		$(this).toggle();
		$("a#play").toggle();
		snake.pause();
		return false;
	});

	$("a#stop").click(function(){
		$("a#pause").hide();
		$("a#play").show();
		snake.stop();				
		return false;				
	});

	$("a#overlayClose").click(function () {
		 snake.overlay('hide');
		 return false;
	});

	$("a#landing_play").click(function(){
		var $target = $(this.hash);
		$target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');
		if ($target.length) {
			var targetOffset = $target.offset().top;
			$('html,body').animate({scrollTop: targetOffset}, 1000);
			return false;
		}
	});

	$("a#twitter").hover(function(){
		$(this).find("img").css("display", "block");
	},
	function(){
		$(this).find("img").css("display", "none");
	});
});