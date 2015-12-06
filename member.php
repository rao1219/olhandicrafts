<?php
define('ACCESS','1');
session_start();
include 'conn/connect.php';
include 'conn/operate.php';
if(!isset($_SESSION['username'])){
     header("Location: login.php"); 
}
if(isset($_POST['act'])){
    if($_POST['act']=='edit_profile'){
        //修改信息
        if(trim($_POST['password'])==''){
            operate::updateoneline('member',array('Email','name','phone','qq'),array($_POST['Email'],$_POST['name'],$_POST['phone'],$_POST['qq']),'username = "'.$_SESSION['username'].'"');
        }else{
            operate::updateoneline('member',array('password','Email','name','phone','qq'),array(md5($_POST['password']),$_POST['Email'],$_POST['name'],$_POST['phone'],$_POST['qq']),'username = "'.$_SESSION['username'].'"');
             
        }
        operate::loginsession($_SESSION['username']);
        $errurl="javascript:window.history.go(-1)";
        $errinfo="修改成功!";
        include('templete/err.html');
    }else if($_POST['act']=='rent'){
        //检测数据填写情况
        if(trim($_POST['title'])=="" || empty($_FILES) || trim($_FILES['pic']['name'])==""||!isset($_POST['select2'])){
            $errurl="javascript:window.history.go(-1)";
            $errinfo="物品名称、需求草图、地区信息必须填写!";
            include('templete/err.html');
        }
        //上传图片
        $pic='';
        if (!empty($_FILES)) {
            $path = "upload/";	
            //得到上传的临时文件流
            $tempFile = $_FILES['pic']['tmp_name'];
            
            //允许的文件后缀
            $fileTypes = array('jpg','jpeg','gif','png'); 
            
            //设置文件名
            $fileParts = pathinfo($_FILES['pic']['name']);
            $fileName = md5(($_FILES["pic"]["name"])).'.'.$fileParts['extension'];
            //最后保存服务器地址
            if(!is_dir($path))
               mkdir($path);
            if (move_uploaded_file($tempFile, $path.$fileName)){
                $pic=$fileName;
            }else{
                //上传失败
            }
        }
        //API存储信息
        $city=$_POST['select2'];
        $cityone=operate::getoneline('city','id='.$city,'parentid,city');
        $adress;
        if($cityone[0]==0){
            $adress=$cityone[1].$_POST['address'];
        }else{
            $citytwo=operate::getoneline('city','id='.$cityone[0],'city');
            $adress=$citytwo[0].$cityone[1].$_POST['address'];
        }
        operate::insertoneline('item',array('title','pic','class','money','deposit','seller','content','city','address'),array($_POST['title'],$pic,$_POST['class'],$_POST['money'],$_POST['deposit'],$_SESSION['id'],$_POST['content'],$city,$_POST['address']));
        $temp=mysql_fetch_row(mysql_query('select id from item order by id desc limit 1'));
        @$post_string="key=ba8a19891a7cb1bc3e2f3411d01d9035&tableid=548fbe84e4b0d0b861454b2c&loctype=2&data={'_name'='".$_POST['title']."','_address'='".$adress."','img'='".$pic."','id'='".$temp[0]."','money'='".$_POST['money']."'}";
        operate::file_get_contents_post('http://yuntuapi.amap.com/datamanage/data/create',$post_string);
        $errurl="member.php?act=myrenting";
        $errinfo="恭喜您，发布成功!";
        include('templete/err.html');
    }
}
?><html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title>用户中心 - Handicrafts</title>
    	<link rel="stylesheet" href="style/css/member-center.css">
<?php
include 'templete\header.html';
?>
<div class="blank"></div>

	<div class="module fl wfs">
		<div class="wrapper mt20">
			
			<div class="menu fl">
    <div class="menu-body fl">
        <div class="infos fl wfs">
            <a href="#"><img class="fl" src="<?=$_SESSION['touxiang']?>"></a>
                            <span class="fl"><?=$_SESSION['username']?></span>
        </div>
        <p class="index fl wfs"><a href="member.php" style="color:#ffffff">用户中心&nbsp;-&nbsp;首页</a></p>
        <dl class="menu-dl fl wfs">
            <dt class="menu-dt order fl wfs"><i></i>交易中心</dt>
            <dd class="fl wfs">
                <p><a href="member.php?act=myrenting" >我的发布</a></p>
                <p><a href="member.php?act=rent" >我要定制</a></p>
                <p><a href="member.php?act=order_list" >历史订单</a></p>
                <p><a href="member.php?act=group_chou" >我的众筹</a></p>
            </dd>
        </dl>
        <dl class="menu-dl fl wfs">
            <dt class="menu-dt member fl wfs"><i></i>会员中心</dt>
            <dd class="fl wfs">
                <p><a href="member.php?act=profile">用户信息/修改</a></p>
            </dd>
        </dl>
        <dl class="menu-dl fl wfs">
            <dt class="menu-dt account fl wfs"><i></i>账户中心</dt>
            <dd class="fl wfs">
                <p><a href="member.php?act=account_detail"> 我的余额</a></p>
                <p><a href="member.php?act=account_recharge"> 在线充值</a></p>
            </dd>
        </dl>
    </div>
</div>			

			<?php include 'templete/member-left.html'; ?>
			
			
            </div>
				
			</div>
				
     <div class="cover-page-index fl wfs bcf2" style="padding-top:20px;">
        <div class="cover-page-wrapper">
<?php
include 'templete/footer.html';
?>

 
</body>
</html>