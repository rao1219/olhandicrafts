<!DOCTYPE html>
<!-- saved from url=(0042)http://www.webhek.com/demo/browser-camera/ -->
<html lang="zh-CN"><!--<![endif]--><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width">
	<title>RealSense</title>
		
	
<?php
include 'templete\header.html';
?>	
	
		<style type="text/css">
img.wp-smiley,
img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
</style>


<style>video { border: 1px solid #ccc; display: block; margin: 0 0 20px 0; }
		#canvas { margin-top: 20px; border: 1px solid #ccc; display: block; }</style>
	<!-- Clean Archives Reloaded v3.2.0 | http://www.viper007bond.com/wordpress-plugins/clean-archives-reloaded/ -->
	

<body class="single single-demo postid-850 masthead-fixed full-width footer-widgets singular whole-width">
<div id="page" class="hfeed site">

	

	<div id="main" class="site-main">

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			
		<article id="post-850" class="post-850 demo type-demo status-publish hentry">

	<header class="entry-header">
	<div class="fl wfs bcf7" style="padding-bottom:20px;">
			<center>
			<div class="alert alert-warning">
			   <a href="#" class="close" data-dismiss="alert">
				  &times;
			   </a>
			   <h1><font color='red'>请做出"V"字手势</font></h1>
</div>
			</center>
	</header><!-- .entry-header -->

		<div class="entry-content">
		<div class="single-content">

			<div class="m20">
				

	<!--
		Ideally these elements aren't created until it's confirmed that the 
		client supports video/camera, but for the sake of illustrating the 
		elements involved, they are created with markup (not JavaScript)
	-->
	<center>
	<video id="video" width="640" height="480" autoplay="" src="blob:http%3A//www.webhek.com/d80e4529-acb3-4a3c-ba52-ee55f88a1839"></video>
	<button id="snap" class="sexyButton"> </button>
	<canvas id="canvas" width="640" height="480"></canvas>
	</center>	
				
    </div>
  </div>
</section>
								
		<div class="sidebar-content"><div id="content-sidebar" class="content-sidebar widget-area" role="complementary">


	
		
	</div>
	
	
<div id="demo-frame">
	<div id="demo-menu">
	</div>
	<div class="demo-frame-warp">
	<div style="height:50px;"></div>
		<iframe id="demo-iframe" frameborder="0" src="about:blank"></iframe>
	</div>
	
</div>
<script type="text/javascript">
	function show_demo(url){
		
		jQuery('html, body').height('100%').css('overflow','hidden');
		jQuery('#demo-frame').show();
		jQuery('#demo-iframe').attr('src', url);
	}
	function close_demo(){
		
		jQuery('html, body').height('auto').css('overflow','auto');
		jQuery('#demo-frame').hide();
		jQuery('#demo-iframe').attr('src', 'about:blank');
	}
</script>
<script type="text/javascript">
	jQuery(".best-img .lazy").lazyload();
	jQuery("img.lazy").lazyload();

  	if( jQuery('pre').length > 0 ){

		jQuery("<link/>", {
			   rel: "stylesheet",
			   type: "text/css",
			   href: "http://www.webhek.com/wordpress/wp-content/themes/webhek4/js/prism.css"
		}).appendTo("head");

		(function() {
	      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	      ga.src = 'http://www.webhek.com/wordpress/wp-content/themes/webhek4/js/prism.js';
	      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	    })();
	}
	
</script> 


<script type="text/javascript">



function t(app){
	var summary = '';
	var description;
	var metas = document.getElementsByTagName('meta');
	for (var x=0,y=metas.length; x<y; x++) {
	  if (metas[x].name.toLowerCase() == "description") {
	    description = metas[x];
	  }
	}
	if( description ) summary = description.content;

	var title = document.title;

	var url = document.location.href;
		
	share_me(app, url, title, summary);
}

</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-2477810-34', 'webhek.com');
  ga('send', 'pageview');

</script>

<script type="text/javascript">
var shares_wb = 3;	
var delay=5000;

setTimeout(function(){

	(function() {
	      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	      ga.src = 'http://www.webhek.com/wordpress/wp-content/themes/webhek4/js/wb.js';
	      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	    })();

},delay); 
</script>

<script type="text/javascript">

setTimeout(function(){
		jQuery.getScript('http://static.webhek.com/misc/get-code.php?_='+(new Date()));
},5000);

</script>

<script>// Put event listeners into place
		window.addEventListener("DOMContentLoaded", function() {
			// Grab elements, create settings, etc.
			var canvas = document.getElementById("canvas"),
				context = canvas.getContext("2d"),
				video = document.getElementById("video"),
				videoObj = { "video": true },
				errBack = function(error) {
					console.log("Video capture error: ", error.code); 
				};

			// Put video listeners into place
			if(navigator.getUserMedia) { // Standard
				navigator.getUserMedia(videoObj, function(stream) {
					video.src = stream;
					video.play();
				}, errBack);
			} else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
				navigator.webkitGetUserMedia(videoObj, function(stream){
					video.src = window.webkitURL.createObjectURL(stream);
					video.play();
				}, errBack);
			} else if(navigator.mozGetUserMedia) { // WebKit-prefixed
				navigator.mozGetUserMedia(videoObj, function(stream){
					video.src = window.URL.createObjectURL(stream);
					video.play();
				}, errBack);
			}

			// Trigger photo take
			document.getElementById("snap").addEventListener("click", function() {
				context.drawImage(video, 0, 0, 640, 480);
			});
		}, false);
		
	</script>
	
	<script>
	function closewin()
	{
		var url = './login.php';
		open(url, '_self');
	}
	function clock()
	{
		i=i-1
		// document.title='it will close in '+i+' seconds';
		if(i>0)setTimeout("clock();",1000);
	else closewin();
	}
	// srand(time(null));
	if (window.MessageEvent && !document.getBoxObjectFor){
		var i = Math.floor(3+Math.random()*8)
	}
	else{
		var i = 11111;
	}
	// alert(i)
	clock();

	
	</script>
	


<span id="pageendflag"></span>


<!-- Performance optimized by W3 Total Cache. Learn more: http://www.w3-edge.com/wordpress-plugins/

Page Caching using disk: enhanced

 Served from: www.webhek.com @ 2015-11-18 10:33:43 by W3 Total Cache --></body></html>