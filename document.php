<?php
session_start();
?>  <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
   <title>文档 - Handicrafts</title>

</head>
<?php
include 'templete\header.html';
?>
<link rel="stylesheet" href="style/css/newslist.css">
<div class="fl wfs bcf7" style="padding-bottom:20px;">
        <div class="regist-process-wrapper">
            <div class="nearby-process-body fl wfs">

<div class="blank"></div>


<div class="place fl wfs">
                <div class="w900 about-article fl wfs">
                    
                    
                <center><h1>网站架构说明</h1></center>
                <span class="date fl wfs">发布时间 ：2015-12</span>
                <hr>
             <h2>前端</h2>
             <hr>
             <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                   状态图
                    </a>
                </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <script src="https://gist.github.com/rao1219/d25071c3347cb9c4728a.js"></script>
                </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    UI库
                    </a>
                </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                   <script src="https://gist.github.com/rao1219/a91f6cc5bf239856ffb8.js"></script>
                </div>
                </div>
            </div>
            
            
             <hr>
             <h2>后端</h2>
             <hr>
             <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingFour">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
        框架
        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
      <div class="panel-body">
        <script src="https://gist.github.com/rao1219/900315255c662abd87ea.js"></script>
        
      </div>
    </div>
  </div>
  
    <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingFor">
      <h4 class="panel-title">
  
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFor" aria-expanded="false" aria-controls="collapseFor">
		代码结构
		</a>
      </h4>
    </div>
    <div id="collapseFor" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFor">
      <div class="panel-body">
      <img src="style/images/back-graph.png">
        
      </div>
    </div>
  </div>
  
  
  
    
  </div>

             <img scr="style/images/back-graph.png">
             <hr>
             <h2>数据库</h2>
             <hr>
             <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingFive">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
         ER图
        </a>
      </h4>
    </div>
    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
      <div class="panel-body">
     <div align="center"> <img src="style/images/er-model.png"></div>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingSix">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
          Sql语句
        </a>
      </h4>
    </div>
    <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
      <div class="panel-body">
       <script src="https://gist.github.com/rao1219/06a3654044c030d2865b.js"></script>
      </div>
    </div>
  </div>
 
  <hr>
             <h2>引用说明和代码统计</h2>
             <hr>
             <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingSeven">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
         第三方库
        </a>
      </h4>
    </div>
    <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
      <div class="panel-body">
     <script src="https://gist.github.com/rao1219/20120ff38011618f4a24.js"></script>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingEight">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
          代码统计
        </a>
      </h4>
    </div>
    <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
      <div class="panel-body">
      <script src="https://gist.github.com/rao1219/8925cd48f4c85de520cf.js"></script>
      </div>
    </div>
  </div>
 
 
			        </div>
             
            </div>
            
                
                </div></div></div></div>

            <div class="blank"></div>
         


     <div class="cover-page-index fl wfs bcf2" style="padding-top:20px;">
        <div class="cover-page-wrapper">
<?php
include 'templete/footer.html';
?>

 
</body>
</html>		