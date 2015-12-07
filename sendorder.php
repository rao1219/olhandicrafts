<?php
session_start();
?>  <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title>标题 - Handicrafts</title>
<?php

define('ACCESS','1');
	// session_start();
include 'conn/connect.php';
include 'conn/operate.php';

if(!isset($_SESSION['orderlist'])){

	  $errurl="javascript:window.history.go(-1)";
      $errinfo="购物车为空!";
      include('templete/err.html');
}
else{
	include 'templete\header.html';
	$orderlist = $_SESSION['orderlist'];
	echo var_dump($orderlist);

	for($i=0;$i<sizeof($orderlist);$i++){
	operate::insertoneline("`order`",array("productName","price","number","buyername","buyerphone","buyeraddress","sellername","sellerphone","selleraddress","comments","time1"),array($orderlist[$i][0],$orderlist[$i][1],$orderlist[$i][2],$orderlist[$i][3],$orderlist[$i][4],$orderlist[$i][5],$orderlist[$i][6],$orderlist[$i][7],$orderlist[$i][8],$orderlist[$i][9],$orderlist[$i][10]));
	
	}
	unset($_SESSION['orderlist']);
	?>
	
	<script>
		alert("订单提交成功！");
		window.location="member.php";
	</script>
	
<?php 

}?>
