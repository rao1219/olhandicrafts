<?php  
  header("Content-type: text/html;charset=utf-8");//输出编码,避免中文乱码  
  $pid=$_GET['pid'];  
include("conn.php");  
  mysql_query("set names 'GBK'");  
mysql_select_db($database_lr, $lr);  
  $sql="select * from smallclass where bigclassid='$pid'";  
  $result=mysql_query($sql);  
  while($rows=mysql_fetch_array($result)){  
   echo "<option value=".$rows['smallclassid'].">";  
      echo $rows['smallclassname'];  
   echo "</option>n";  
  }  
?> 