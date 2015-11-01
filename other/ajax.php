<?php  
  header("Content-type: text/html;charset=utf-8");
  $pid=$_GET['pid'];  
  define('ACCESS','1');
  include '../conn/connect.php';
  include '../conn/operate.php';
  $sql="select id,city from city where parentid=$pid";  
  $result=mysql_query($sql); 
  $i=0;
  while($rows=mysql_fetch_array($result)){
   $i++;
   echo "<option value=".$rows['0'].">";  
      echo $rows['1'];  
   echo "</option>";  
  }
  if($i==0){
      $cityone=operate::getoneline('city','id='.$pid,'city');
      echo "<option value=".$pid.">$cityone[0]</option>";  
  }
?> 