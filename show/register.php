<?php
include('./conn.php');

//接收数据
$username=$_POST['username'];
$password1=$_POST['password1'];
//$password2=$_POST['password2'];
$gender=$_POST['gender'];
$major=$_POST['major'];
$education=$_POST['education'];
$tel=$_POST['tel'];

//验证数据有效性
if(empty($gender)||empty($major)||empty($education)||empty($tel))
{
    echo "<script>alert('请填写完所有信息！');history.back();</script>";exit;
}
if(mb_strlen($tel,'utf-8')!=11)
{
    echo "<script>alert('手机号不是11位！');history.back();</script>";exit;
}
if(mb_strlen($password1,'utf-8')<6)
{
    echo "<script>alert('密码不能少于6位数！');history.back();</script>";exit;
}
if(mb_strlen($username,'utf-8')<2)
{
    echo "<script>alert('用户名不能少于2个字！');history.back();</script>";exit;
}
//if($password1!=$password2)
//{
 ////   echo "<script>alert('两次输入的密码不一样！');history.back();</script>";exit;
//}

//构造sql语句
$password=md5($password1);
$str="insert into user set username='$username',pswd='$password',gender='$gender',major='$major',education='$education',tel='$tel'";
$r=mysqli_query($conn,$str);
if($r)
{
    $id=mysqli_insert_id($conn);
    session_start();
    $_SESSION['userid']=$id;
    $_SESSION['username']=$username;
    echo "<script>window.location.href='./k_chujuana.php';</script>";
}else {
    echo "<script>alert('注册失败！');history.back();</script>";
    exit;
}
mysqli_close($conn);