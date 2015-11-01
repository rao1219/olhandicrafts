<?php
session_start();
if(isset($_SESSION['username'])){
     header("Location: member.php"); 
}
if(isset($_POST['username'])){
    define('ACCESS','1');
    include 'conn/connect.php';
    include 'conn/operate.php';
    if(trim($_POST['username'])=="" || trim($_POST['password'])==""){
        $errurl="javascript:window.history.go(-1)";
        $errinfo="用户名和密码不能为空!";
        include('templete/err.html');
    }
    if(@!mysql_fetch_array(mysql_query('select id from member where username = "'.$_POST['username'].'" and password="'.md5($_POST['password']).'"'))){
        $errurl="javascript:window.history.go(-1)";
        $errinfo="用户名或者密码错误!";
        include('templete/err.html');
    }
    operate::loginsession($_POST['username']);
    header("Location: member.php"); 
}
?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title>登录 - E租时代</title>
<?php
include 'templete\header.html';
?>
<script>
function userLogin()
{
  var frm      = document.forms['formLogin'];
  var username = frm.elements['username'].value;
  var password = frm.elements['password'].value;
  var msg = '';

  if (username.length == 0)
  {
    msg += '用户名不能为空' + '\n';
  }

  if (password.length == 0)
  {
    msg += '密码不能为空' + '\n';
  }

  if (msg.length > 0)
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
<div class="blank"></div>

<div class="fl wfs bcf7" style="padding-bottom:20px;">
        <div class="regist-process-wrapper">
            <div class="regist-process-body fl wfs">
                
                <form id="loginForm" name="formLogin" action="login.php" method="post" onSubmit="return userLogin()">
                    <div class="regist-process-login-left fl">
                        <h2 class="title">登录</h2>
                          <input class="form-control text" name="username" id="username" type="text" placeholder="用户名">
                          <input class="form-control text" name="password" id="password" type="password" placeholder="密码">
                          <input  class="btn btn-danger login-btn" type="submit" name="submit" value="登录" />
                        <div class="operates fl wfs">
                          <a class="fr" href="user.php?act=get_password">忘记密码</a>
                          <p>
                             <input type="checkbox" value="1" name="remember" id="remember" />
                              下次自动登录<span>使用公用电脑勿选</span>
                          </p>
                        </div>
                    </div>
                </form>
                
                
                <div class="regist-process-login-right fr" style="padding-top:70px;">
                    <h2 class="title">没有账号？立即注册</h2>
                    <a class="btn btn-info free-registe" href="user.php?act=register">免费注册</a>
                   
                </div>
                
            </div>
        </div>
        
    </div>
     <div class="cover-page-index fl wfs bcf2" style="padding-top:20px;">
        <div class="cover-page-wrapper">
<?php
include 'templete/footer.html';
?>

 
</body>
</html>