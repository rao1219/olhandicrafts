<?php
session_start();
?>  <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title>购物车 - Handicrafts</title>
<?php
include 'templete\header.html';
define('ACCESS','1');
	// session_start();
include 'conn/connect.php';
include 'conn/operate.php';

if(isset($_SESSION['orderlist']))
  $orderlist = $_SESSION['orderlist'];
else
  $orderlist = [];
?>
<link rel="stylesheet" href="style/css/newslist.css">
<div class="fl wfs bcf7" style="padding-bottom:20px;">
        <div class="regist-process-wrapper">
            <div class="nearby-process-body fl wfs">

<div class="blank"></div>

<div class="place fl wfs">
                <div class="w900 about-article fl wfs">
                <h1>我的购物车</h1>
             
             <?php for($i=0;$i<sizeof($orderlist);$i++){?>
                <div class="content fl wfs" style="line-height:27px;"">
                <button class="btn btn-large btn-primary" type="button"><?=$i?></button>
                   
               <?=$orderlist[$i][0]?>
               <hr>
               <table class="table">
      <thead>
          <tr>
              <th>物品</th>
              <th>单价</th>
              <th>数量</th>
              <th>总价</th>
              <th>收件地址</th>
              <th>手机</th>
              <th>卖家姓名</th>
              <th>卖家住址</th>
              <th>卖家电话</th>
              <th>卖家地址</th>
          </tr>
      </thead>
      <tbody>
          
          <?php 
          
          
       
        echo '<tr>';
            echo '<td>';
            echo $orderlist[$i][0];
            echo '</td>';
            echo '<td>';
            echo $orderlist[$i][1];
            echo '</td>';
            echo '<td>';
            echo $orderlist[$i][2];
            echo '</td>';
            echo '<td>';
            echo $orderlist[$i][1] * $orderlist[$i][2];
            echo '</td>';
            echo '<td>';
            echo $orderlist[$i][3];
            echo '</td>';
            echo '<td>';
            echo $orderlist[$i][4];
            echo '</td>';
            echo '<td>';
            echo $orderlist[$i][5];
            echo '</td>';
            echo '<td>';
            echo $orderlist[$i][6];
            echo '</td>';
            echo '<td>';
            echo $orderlist[$i][7];
            echo '</td>';
            echo '<td>';
            echo $orderlist[$i][8];
            echo '</td>';
            //echo '<small></small>'
        echo '</tr>';   
    
        
          
          
          ?>
      </tbody>
  </table>
               
               <p><div align="center"><img width=400 height=400 src="<?=$orderlist[$i][11]?>"/></div></p></div>
                </div>
                
                </div></div>
               
              <?php }
              if(sizeof($orderlist)!=0){
              ?>
           <div align="center"> <p><button class="btn btn-large btn-block btn-primary" onclick="location.href='sendorder.php'" type="button">确认订单</button></p></div></div></div>
            <?php
            }else{
              
             echo '<a href = "http://localhost/olhandicrafts/category.php?k_template=0&keywords=%E6%89%8B%E5%B7%A5">您的购物车为空，快去逛逛吧~</a>';
            echo '</p></div></div></div>';
            }?>   
            <div class="blank"></div>

     <div class="cover-page-index fl wfs bcf2" style="padding-top:20px;">
        <div class="cover-page-wrapper">

<?php 
include 'templete/footer.html';
?>

 
</body>
</html>		