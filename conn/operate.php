<?php
class operate{
    //获取一行数据
    public static function getoneline($table,$condition,$filed="*"){
        $osql='select '.$filed.' from '.$table.' where '.$condition;
        return mysql_fetch_array(mysql_query($osql));
    }
    //获取数据数组
    public static function getmuchline($table,$condition="",$filed="*"){
        $osql='select '.$filed.' from '.$table;
        if($condition){$osql.=" $condition";}
        $result=mysql_query($osql);
        for($i=0;$i<mysql_num_rows($result);$i++){
             $rs[]=mysql_fetch_row($result);
        }
        if(!isset($rs)){
            $rs=false;
        }
        return $rs;
    }
    //更新一条数据
    public static function updateoneline($table,$datetitle,$datecontent,$condition){
        $datecontent[0]=str_replace("'","\'",$datecontent[0]);
        $osql='update '.$table.' set '.$datetitle[0].'=\''.$datecontent[0].'\'';
        for($i=1;$i<count($datetitle);$i++){
            $datecontent[$i]=str_replace("'","\'",$datecontent[$i]);
            $osql.=','.$datetitle[$i].'=\''.$datecontent[$i].'\'';
        }
        $osql.=' where '.$condition;
        return mysql_query($osql);
    }
    //插入一条数据
    public static function insertoneline($table,$datetitle,$datecontent){
        $osql='insert into '.$table.' ('.$datetitle[0];
        for($i=1;$i<count($datetitle);$i++){
            $osql.=','.$datetitle[$i];
        }
        $osql.=') values (\''.$datecontent[0].'\'';
        for($i=1;$i<count($datecontent);$i++){
            $datecontent[$i]=str_replace("'","\'",$datecontent[$i]);
            $osql.=',\''.$datecontent[$i].'\'';
        }
        $osql.=')';
        return mysql_query($osql);
    }
    //删除一条数据
    public static function deleteoneline($table,$datecontent){
        $osql='delete from '.$table.' where '.$datecontent;
        return mysql_query($osql);
    }
    //创建包括数字和大写字母的随机字符
    public static function create_randchar($pw_length = 8)
    {
        $randpwd = '';
        for ($i = 0; $i < $pw_length; $i++) 
        {
            $h = mt_rand(0,1);
            if($h){
                $randpwd .= chr(mt_rand(48, 57));
            }else{
                $randpwd .= chr(mt_rand(65, 90));
            }
        }
        return $randpwd;
    }
    //创建随机数字
    public static function create_randnum($pw_length = 4)
    {
        $randpwd = '';
        for ($i = 0; $i < $pw_length; $i++) 
        {
              $randpwd .= chr(mt_rand(48, 57));
        }
        return $randpwd;
    }
    //登录存储session
    public static function loginsession($username){
        $info = operate::getoneline("member","username='".$username."'");
        $_SESSION['username']=$info['username'];
        $_SESSION['id']=$info['id'];
        $_SESSION['qq']=$info['qq'];
        $_SESSION['phone']=$info['phone'];
        $_SESSION['Email']=$info['Email'];
    }
    //post发送数据，高德
    function file_get_contents_post($url, $post) {
            $options = array(
                'http' => array(
                    'method' => 'POST',
                    'header'=>'Content-type: application/x-www-form-urlencoded',
                    'content' => $post,
                ),
            );
            $result = file_get_contents($url, false, stream_context_create($options));
            return $result;
    }
}