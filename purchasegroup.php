<?php
session_start();
?>  <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title>标题 - Handicrafts</title>
<?php
include 'templete\header.html';
define('ACCESS','1');
// session_start();
include 'conn/connect.php';
include 'conn/operate.php';
$id = $_GET['id'];
$iteminfo[] = operate::getmuchlinesql("`groupchou`","where id=$id");
if(isset($_GET['id'])&&isset($_GET['money']))
{
	$id = $_GET['id'];
	$item = operate::getoneline("`groupchou`","id=$id");
	// echo var_dump($item);
	$item['hasChou'] = $item['hasChou']+$_GET['money'];
	$item['participate_num'] = $item['participate_num']+1;
    
    $money = $_GET['money'];
    $user = $_SESSION['username'];
	
 	operate::updateonelinesql("`groupchou`","hasChou",$item['hasChou'],"id=$id");
	operate::updateonelinesql("`groupchou`","participate_num",$item['participate_num'],"id=$id");
    operate::insertoneline("`member_has_chou`",array("membername","groupid","money"),array($user,$id,$money));
}
//echo var_dump($iteminfo);
//echo var_dump($iteminfo);

?>
<script>
    window.location.href="groupchou.php";
</script>

 
        

	<div class="cover-page-list fl wfs bcf2">
        <div class="place fz12" style="padding-left:20px;">
    您现在的位置：<a href=".">首页</a> <code>&gt;</code> <a href="#">手工艺众筹 - <?=$iteminfo[0][0]['name']?></a></div>
        <div class="regist-process-wrapper">
            <div class="nearby-process-body fl wfs">


                
                </div></div></div></div>

            <div class="blank"></div>

     <div class="cover-page-index fl wfs bcf2" style="padding-top:20px;">
        <div class="cover-page-wrapper">
<?php
include 'templete/footer.html';
?>

 
</body>
</html>		