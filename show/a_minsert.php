<?php
include('./conn.php');

$user=$_POST['username'];
$pswd=$_POST['password'];

if(mb_strlen($user,'utf-8')<2)
{
    echo "<script>alert('用户名不能少于2个字！');history.back();</script>";exit;
}

if(mb_strlen($pswd,'utf-8')<6)
{
    echo "<script>alert('密码不能少于6位数！');history.back();</script>";exit;
}

$pswd=md5($pswd);
$str="insert into iuser set iuser='$user',ipswd='$pswd'";
$r=mysqli_query($conn,$str);
if($r)
{
    //添加成功
    echo "<script>alert('添加成功');window.location.href='./a_minfo.php';</script>";
}else {
    echo "<script>alert('添加失败！');history.back();</script>";exit;
}
?>