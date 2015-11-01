<?php
header("Content-type: text/html; charset=utf-8");
define('ACCESS','1');
session_start();
include 'conn/connect.php';
include 'conn/operate.php';
$_POST['title']='测试标题';
$_POST['money']='100';
$pic='picxx';
$id=55;
$place="北京邮电大学宏福校区";




$post_string="key=ba8a19891a7cb1bc3e2f3411d01d9035&tableid=548fbe84e4b0d0b861454b2c&loctype=2&data={'_name'='sb振东','_address'='北京邮电大学宏福校区','img'='".$pic."','id'='".$id."','money'='".$_POST['money']."'}";


//$post_string="key=ba8a19891a7cb1bc3e2f3411d01d9035&tableid=548fbe84e4b0d0b861454b2c&loctype=2&data={'_name'='".$_POST['title']."','_address'='".$place."','img'='".$pic."','id'='".$id."','money'='".$_POST['money']."'}";
//echo operate::file_get_contents_post('http://www.olrenting.com/2try.php',$post_string);
//$post_string="key=ba8a19891a7cb1bc3e2f3411d01d9035&tableid=548fbe84e4b0d0b861454b2c&loctype=2&data={'_name'='".$_POST['title']."','_address'='".$place."','img'='".$pic."','id'='".$id."','money'='".$_POST['money']."'}";
echo operate::file_get_contents_post('http://yuntuapi.amap.com/datamanage/data/create',$post_string);


?>
<!--$post_string="key=ba8a19891a7cb1bc3e2f3411d01d9035&tableid=tableid&loctype=2&data={'_name'='".$_POST['title']."','_address'='".$place."','img'='"."$pic"."','id'='"."$id"."','money'='"."$_POST['money']"."'}";