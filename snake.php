
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title>轻松一刻 - Handicrafts</title>
    <?php
session_start();
include 'templete/header.html';
?> 
	
			

<link href="./2048_js/main.css" rel="stylesheet" type="text/css">

<link rel="shortcut icon" href="style/images/favicon.ico" />
    
    <link rel="stylesheet" href="style/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/css/index.css">
    <script src="style/js/jquery.min.js"></script>
    <script src="style/bootstrap/js/bootstrap.min.js"></script>
    
    <script type='text/javascript' src='style/js/jquery.lazyload.js'></script>

<body>
  
<link type="text/css" rel="stylesheet" href="snake_src/snake.css">
		<link rel="stylesheet" href="snake_src/products.css" type="text/css">
		
		<div id="container">
		


			<div id="header_wrap">
			
             
				&nbsp;&nbsp;
			</div>
			
			
		
			<div id="middle_wrap">
					
				
				&nbsp;&nbsp;
				&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;
				&nbsp;&nbsp;
				&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;
				
				
				<font size=16> 贪吃蛇</font>
				
				&nbsp;&nbsp;	
				&nbsp;&nbsp;
				&nbsp;&nbsp;<img width=300 height=150 src="style/images/snake.jpg">
				
				<div id="middle">
				
					<div id="box">
						
						<div id="snake" style="left: 40px; top: 240px;"></div>
			
					</div>
					
				
					
					<div style="clear: both"></div>
					
					<!-- <div id="navigator">
						
						<div id="joystick">
							<a href="#" class="nav" rev="right" id="left"></a>
							<a href="#" class="nav" rev="down" id="up"></a>
							<a href="#" class="nav" rev="left" id="right"></a>
							<a href="#" class="nav" rev="up" id="down"></a>
						</div>
						
					</div> -->
					
					
								
					
				</div> <!-- middle -->
				
			</div> <!-- middle_wrap -->
	
			
		</div> <!-- container -->
		
		<div id="overlay" style="width: 1266px; height: 1616px; display: block;"></div>
		<div id="overlayBox" style="left: 133px; top: 351.667px; display: block;">
			<p id="overlayNote">贪吃蛇</p>
			<p>点击<a href="http://www.bulgaria-web-developers.com/projects/javascript/snake/#" id="overlayClose">这里</a><b>输入Esc开始游戏</b></p>
		</div>

		
		<script type="text/javascript" src="snake_src/snake.js"></script>
		<script type="text/javascript" src="snake_src/init.js"></script>
        
        
        
        
         
<div class="container">
<div class="heading">
<h1 class="title">2048        </h1>

<div class="scores-container">

<div class="score-container">2148<div class="score-addition">+2148</div></div>
<div class="best-container">2324</div>
</div>
</div>

<div class="above-game">
<p class="game-intro">移动数字使得到 <strong>2048!</strong></p>

<a class="restart-button">重新开始</a>   


</div>

<div class="game-container">
<div class="game-message">
<p></p>
<div class="lower">
<a class="keep-playing-button">Keep going</a>
<a class="retry-button">再来一次</a>
</div>
</div>
<div class="grid-container">
<div class="grid-row">
<div class="grid-cell"></div>
<div class="grid-cell"></div>
<div class="grid-cell"></div>
<div class="grid-cell"></div>
</div>
<div class="grid-row">
<div class="grid-cell"></div>
<div class="grid-cell"></div>
<div class="grid-cell"></div>
<div class="grid-cell"></div>
</div>
<div class="grid-row">
<div class="grid-cell"></div>
<div class="grid-cell"></div>
<div class="grid-cell"></div>
<div class="grid-cell"></div>
</div>
<div class="grid-row">
<div class="grid-cell"></div>
<div class="grid-cell"></div>
<div class="grid-cell"></div>
<div class="grid-cell"></div>
</div>
</div>
<div class="tile-container"><div class="tile tile-2 tile-position-1-1 tile-new"><div class="tile-inner">2</div></div><div class="tile tile-64 tile-position-1-2 tile-new"><div class="tile-inner">64</div></div><div class="tile tile-8 tile-position-1-3 tile-new"><div class="tile-inner">8</div></div><div class="tile tile-2 tile-position-1-4 tile-new"><div class="tile-inner">2</div></div><div class="tile tile-4 tile-position-2-2 tile-new"><div class="tile-inner">4</div></div><div class="tile tile-256 tile-position-2-3 tile-new"><div class="tile-inner">256</div></div><div class="tile tile-16 tile-position-2-4 tile-new"><div class="tile-inner">16</div></div><div class="tile tile-2 tile-position-3-3 tile-new"><div class="tile-inner">2</div></div><div class="tile tile-8 tile-position-3-4 tile-new"><div class="tile-inner">8</div></div><div class="tile tile-2 tile-position-4-3 tile-new"><div class="tile-inner">2</div></div><div class="tile tile-4 tile-position-4-4 tile-new"><div class="tile-inner">4</div></div></div>
</div>
<p class="game-explanation">
使用 <strong>方向键</strong> 来移动小格


</p>

</div>
<script src="./2048_js/bind_polyfill.js"></script>
<script src="./2048_js/classlist_polyfill.js"></script>
<script src="./2048_js/animframe_polyfill.js"></script>
<script src="./2048_js/keyboard_input_manager.js"></script>
<script src="./2048_js/html_actuator.js"></script>
<script src="./2048_js/grid.js"></script>
<script src="./2048_js/tile.js"></script>
<script src="./2048_js/local_storage_manager.js"></script>
<script src="./2048_js/game_manager.js"></script>
<script src="./2048_js/application.js"></script>



	<div align="right"><button type="button" class="btn btn-primary">Primary</button></div>

 
</body>

</html>		