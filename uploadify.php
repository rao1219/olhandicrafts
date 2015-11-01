<?php

//设置上传目录
if (!empty($_FILES)) {
    $path = "upload/";	
	//得到上传的临时文件流
	$tempFile = $_FILES['Filedata']['tmp_name'];
	
	//允许的文件后缀
	$fileTypes = array('jpg','jpeg','gif','png'); 
	
	//设置文件名
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	$fileName = md5(($_FILES["Filedata"]["name"])).'.'.$fileParts['extension'];
	//接受动态传值
	$files=$_POST['typeCode'];
	
	//最后保存服务器地址
	if(!is_dir($path))
	   mkdir($path);
	if (move_uploaded_file($tempFile, $path.$fileName)){
		echo $fileName;
	}else{
		//上传失败
	}
}
?>