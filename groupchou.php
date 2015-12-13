<?php
session_start();
?>  <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title>标题 - Handicrafts</title>
<?php
if(!isset($_SESSION['username']))
{
	$errurl="camera.php";
	$errinfo="请先登录!";
	include('templete/err.html');
}
include 'templete\header.html';
define('ACCESS','1');
// session_start();
include 'conn/connect.php';
include 'conn/operate.php';
$iteminfo[] = operate::getmuchlinesql("`groupchou`","");
//echo var_dump($iteminfo);




?>

 
        

	<div class="cover-page-list fl wfs bcf2">
        <div class="place fz12" style="padding-left:20px;">
    您现在的位置：<a href=".">首页</a> <code>&gt;</code> <a href="#">手工艺众筹</a></div>
        <div class="regist-process-wrapper">
            <div class="nearby-process-body fl wfs">
				
				
<div class="blank"></div>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<ul class="thumbnails">
				<?php 
				$iteminfo[] = operate::getmuchlinesql("`groupchou`","");
				for($i=0;$i<sizeof($iteminfo[0]);$i++)
				{
				?>
				<li class="span4">
					<div class="thumbnail">
						<img alt="300x200" src="<?=$iteminfo[0][$i]['img']?>" height="400" width="400" />
						<div class="caption">
							
							<h3>
								<?=$iteminfo[0][$i]['name']?>
							</h3>
							<br>
							
							<p>
								<?=$iteminfo[0][$i]['description']?>
								<br>
							</p>
							
							<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>
							已筹款
						</th>
						<th>
							参与人次
						</th>
						<th>
							开始时间
						</th>
						<th>
							结束时间
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<?=$iteminfo[0][$i]['hasChou']?>
						</td>
						<td>
							<?=$iteminfo[0][$i]['participate_num']?>
						</td>
						<td>
							<?=$iteminfo[0][$i]['time1']?>
						</td>
						<td>
							<?=$iteminfo[0][$i]['time2']?>
						</td>
					</tr>
					
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>	





			
			<?php 
                  $N = $i+1;
                  $formname = 'subform'.$N."";
                 // echo $formname;
                  $checkform = 'return '.'checkForm'.$N."();";
                  // echo $checkform;
            ?>				
			<form action="purchasegroup.php" id="subform.<?=$formname?>" method="get" onSubmit="<?=$checkform?>">
			<div class="row">
				
				<div class="col-lg-6">
					
					<div class="input-group">
					<span class="input-group-btn">
						<button class="btn btn-primary" type="submit">
							参与
						</button>
						
					</span>
					<input type="text" name="money" class="input-mini">元
					<input type="hidden" name="id" value="<?=$iteminfo[0][$i]['id']?>">
					
					</div><!-- /input-group -->
				</div>
				
			</div>
			</form>
							
							
							
							
						</div>
					</div>
				</li>
				<?php
				}
				?>
				
			</ul>
		</div>
	</div>
</div>

                
                </div></div></div></div>

            <div class="blank"></div>

     <div class="cover-page-index fl wfs bcf2" style="padding-top:20px;">
        <div class="cover-page-wrapper">
			
			<script>
    function checkForm1()
    {
    var frm      = document.forms['subform1'];
    var number = frm.elements['money'].value;
	var id = frm.elements['id'].value;
    var msg='';
    alert(number);
    if(number.length==0)
    {
        msg+='金额不可以为空！';
    }
    if(isNaN(number))
    {
        msg+='金额不可以为非数字！';
    }
    if(number>2197||number<=0)
    {
        msg+='金额超出范围！';
    }
   
    if(msg.length!=0)
    {
        alert(msg);
        return false;
    }
    else
    {
		alert('参与成功！');
        return true;
    }
   }
   function checkForm2()
    {
    var frm      = document.forms['subform2'];
    var number = frm.elements['money'].value;
	var id = frm.elements['id'].value;
    var msg='';
    if(number.length==0)
    {
        msg+='金额不可以为空！';
    }
    if(isNaN(number))
    {
        msg+='金额不可以为非数字！';
    }
    if(number>2197||number<0)
    {
        msg+='金额超出范围！';
    }
   
    if(msg.length!=0)
    {
        alert(msg);
        return false;
    }
    else
    {
		alert('参与成功！');
        return true;
    }
   }
   function checkForm3()
    {
    var frm      = document.forms['subform3'];
    var number = frm.elements['money'].value;
	var id = frm.elements['id'].value;
    var msg='';
    if(number.length==0)
    {
        msg+='金额不可以为空！';
    }
    if(isNaN(number))
    {
        msg+='金额不可以为非数字！';
    }
    if(number>2197||number<0)
    {
        msg+='金额超出范围！';
    }
   
    if(msg.length!=0)
    {
        alert(msg);
        return false;
    }
    else
    {
		alert('参与成功！');
        return true;
    }
   }
   function checkForm4()
    {
    var frm      = document.forms['subform4'];
    var number = frm.elements['money'].value;
	var id = frm.elements['id'].value;
    var msg='';
    if(number.length==0)
    {
        msg+='金额不可以为空！';
    }
    if(isNaN(number))
    {
        msg+='金额不可以为非数字！';
    }
    if(number>2197||number<0)
    {
        msg+='金额超出范围！';
    }
   
    if(msg.length!=0)
    {
        alert(msg);
        return false;
    }
    else
    {
		alert('参与成功！');
        return true;
    }
   }
   function checkForm5()
    {
    var frm      = document.forms['subform5'];
    var number = frm.elements['money'].value;
	var id = frm.elements['id'].value;
    var msg='';
    if(number.length==0)
    {
        msg+='金额不可以为空！';
    }
    if(isNaN(number))
    {
        msg+='金额不可以为非数字！';
    }
    if(number>2197||number<0)
    {
        msg+='金额超出范围！';
    }
   
    if(msg.length!=0)
    {
        alert(msg);
        return false;
    }
    else
    {
		alert('参与成功！');
        return true;
    }
   }
</script>
<?php
include 'templete/footer.html';
?>

 
</body>
</html>		