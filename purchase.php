<html>
<head>
    <html lang="zh-CN"><!--<![endif]-->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
    <title>Confirm-Order Elight</title>
    <link rel="stylesheet" href="style/css/member-center.css">

<?php
	session_start();
	define('ACCESS','1');
	// session_start();
	include 'conn/connect.php';
	include 'conn/operate.php';
	// $id = 1;
	$id = $_GET['id'];
	// echo $_SESSION['username'];
	// echo $id;
	$iteminfo = operate::getoneline("crafts","id=$id");
	if(!isset($_SESSION['username']))
	{
		$errurl="login.php";
		$errinfo="请先登录!";
		include('templete/err.html');
	}
	if(isset($_POST['productName'])){
		$showtime=date("Y-m-d H:i:s");
		// echo $iteminfo['name'],$iteminfo['price'],$_POST['number'],$_POST['username'],$_POST['userPhone'],$_POST['userAddress'],$iteminfo['seller'],$iteminfo['phone'],$iteminfo['selleradd'],$_POST['userComments'];
		// operate::insertoneline("order",array("productName","price","number","buyername","buyerphone","buyeraddress","sellername","sellerphone","selleraddress","comments"),array($iteminfo['name'],$iteminfo['price'],$_POST['number'],$_POST['username'],$_POST['userPhone'],$_POST['userAddress'],$iteminfo['seller'],$iteminfo['phone'],$iteminfo['selleradd'],$_POST['userComments']));
		if(operate::insertoneline("`order`",array("productName","price","number","buyername","buyerphone","buyeraddress","sellername","sellerphone","selleraddress","comments","time1"),array($iteminfo['name'],$iteminfo['price'],$_POST['number'],$_POST['username'],$_POST['userPhone'],$_POST['userAddress'],$iteminfo['seller'],$iteminfo['phone'],$iteminfo['selleradd'],$_POST['userComments'],$showtime))){
			
			$errurl="member.php";
			$errinfo="预定成功!";
			include('templete/err.html');
		}else{
			$errurl="javascript:window.history.go(-1)";
			$errinfo="系统出错，请稍后重试!";
			include('templete/err.html');
		}
	}
?>

<style>
body,input,button{background-color:white;font:normal 14px "Microsoft Yahei";margin:0;padding:0}
body{background-color:white}
.odform-tit{font-weight:normal;font-size:25px;color:#595757;line-height:40px;text-align:center;border-bottom:1px solid #c9cacb;margin:0;padding:5% 0}
.odform-tit img{height:40px;vertical-align:middle;margin-right:15px}
.odform{padding:5%}
.input-group{margin-bottom:5%;position:relative}
.input-group label{padding:2% 0;position:absolute;color:#595757}
.input-group input{margin-left:10em;padding:3% 5%	;box-sizing:border-box;background:#efeff0;border:0;border-radius:5px;color:#595757;width:100%}
.odform button{ background:#CC0000 ;color:#00FF00;text-align:center;border:0;border-radius:10px;padding:3%;width:100%;font-size:16px}
.odform .cal{background-image:url(style/images/daetixian-cal.png);background-repeat:no-repeat;background-position:95% center;background-size:auto 50%}
.odform .xl{background-image:url(style/images/daetixian-xl.png);background-repeat:no-repeat;background-position:95% center;background-size:auto 20%}
</style>





<?php
	 $id = $_GET['id'];
	// echo $id;
    $userinfo = operate::getoneline("member","username='".$_SESSION['username']."'");
	$iteminfo = operate::getoneline("crafts","id=$id");
	include "templete/header.html";
	// echo $iteminfo['type'];
	// echo $userinfo['qq'];
	
?>

<div class="blank"></div>
<div class="module fl wfs">
	<div class="cover-page-details fl wfs bcf2">
        <div class="cover-page-wrapper">
            <div class="place fz12" style="padding-left:20px;">
    <a href=".">主页</a> <code>&gt;</code> <a href="#"><?=$iteminfo['type']?></a> <code>&gt;</code> <?=$iteminfo['name']?> </div>
     

<script>
function checkForm()
{
  var frm      = document.forms['subform'];
  var number = frm.elements['number'].value;
  var address = frm.elements['userAddress'].value;
  var msg='';
  if(number.length==0)
  {
  	msg+='请输入预定数目！';
  }
  if(address.length==0)
  {
  	msg+='请输入地址！';
  }
  if(msg.length!=0)
  {
  	alert(msg);
  	return false;
  }
  else
  {
  	return true;
  }
}
</script>

<div class="fl wfs bcf7" style="padding-bottom:20px;">
        <div class="regist-process-wrapper">
            <div class="regist-process-body fl wfs">
                
               <h1 class="odform-tit"><img src="style/images/daetixian-tit.png" alt="">下订单</h1>
<div class="odform">
	<form action="purchase.php?id=<?=$_GET['id']?>" id="subform" method="post" onSubmit="return checkForm();">
		<div class="input-group">
			<label for="khname">名称:</label>
			<input type="text" class="xl" id="wdname" name="productName" readonly="<?=$iteminfo['name']?>" value="<?=$iteminfo['name']?>" >
	
		</div>
		<div class="input-group">
			<label for="khname">类别:</label>
			<input type="text" class="xl" id="wdname" name="productType" readonly="<?=$iteminfo['type']?>" value="<?=$iteminfo['type']?>" >
	
		</div>
		<div class="input-group">
			<label for="khname">价格:</label>
			<input type="text" class="xl" id="wdname" name="productPrice" readonly="<?=$iteminfo['price']?>" value="<?=$iteminfo['price']?>" >
		
		</div>

		
	
		<div class="input-group">
			<label for="khname">用户:</label>
			<input type="text" id="khname" name="username" readonly="<?=$_SESSION['username']?>" value="<?=$_SESSION['username']?>" >
		</div>
		
		<div class="input-group">
			<label for="khname">手机:</label>
			<input type="text" id="khname" name="userPhone" readonly="<?=$_SESSION['phone']?>"value="<?=$_SESSION['phone']?>">
		</div>
		<div class="input-group">
			<label for="khname">邮箱:</label>
			<input type="text" id="khname" name="userEmail" readonly="<?=$_SESSION['Email']?>" value="<?=$_SESSION['Email']?>">
		</div>
		
		
		<div class="input-group">
			<label for="khname">数量:</label>
			<input type="number" min="1" id="khname" name="number" placeholder="请输入预定数量">
		</div>
		<div class="input-group">
			<label for="khname">收件地址</label>
			<input type="text" id="khname" name="userAddress" placeholder="请填写收件地址">
		</div>
		<div class="input-group">
			<label for="khname">附加备注</label>
			<input type="text" id="khname" name="userComments" placeholder="备注">
		</div>
		<button>确认</button>
		
	</form>
                
                
                
                
            </div>
        </div>
        
    </div>
     <div class="cover-page-index fl wfs bcf2" style="padding-top:20px;">
        <div class="cover-page-wrapper">

	
     
     
</div>
 	
		
<?php
include 'templete/footer.html'
?>
 
</body>
</html>