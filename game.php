
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title>2048 - Handicrafts</title>
    <?php
session_start();
include 'templete/header.html';
?> 
<link href="./2048_files/main.css" rel="stylesheet" type="text/css">

<link rel="shortcut icon" href="style/images/favicon.ico" />
    
    <link rel="stylesheet" href="style/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/css/index.css">
    <script src="style/js/jquery.min.js"></script>
    <script src="style/bootstrap/js/bootstrap.min.js"></script>
    
    <script type='text/javascript' src='style/js/jquery.lazyload.js'></script>

<body>
   
<div class="container">
<div class="heading">
<h1 class="title">2048</h1>
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
<a class="retry-button">Try again</a>
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
<hr>
</div>
<script src="./2048_files/bind_polyfill.js"></script>
<script src="./2048_files/classlist_polyfill.js"></script>
<script src="./2048_files/animframe_polyfill.js"></script>
<script src="./2048_files/keyboard_input_manager.js"></script>
<script src="./2048_files/html_actuator.js"></script>
<script src="./2048_files/grid.js"></script>
<script src="./2048_files/tile.js"></script>
<script src="./2048_files/local_storage_manager.js"></script>
<script src="./2048_files/game_manager.js"></script>
<script src="./2048_files/application.js"></script>

 
</body>

</html>		