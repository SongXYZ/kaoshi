<?php
include('./conn.php');

//接受数据
$username=$_POST['username'];
$password=$_POST['password'];

//验证数据有效性
if(mb_strlen($username,'utf-8')<2)
{
    echo "<script>alert('用户名不能少于2个字！');history.back();</script>";
    exit;
}

if($username=='admin' && $password='admin')
{
    echo "<script>window.location.href='./a_index.html';</script>";//管理员
}else {
    //构造sql语句
    session_start();
    $password=md5($password);
    $str="select * from user where username='$username' and pswd='$password'";
    $rs=mysqli_query($conn,$str);
    $row=mysqli_fetch_assoc($rs);
    $id=$row['id'];

    $istr="select * from iuser where iuser='$username' and ipswd='$password'";
    $irs=mysqli_query($conn,$istr);
    $row=mysqli_fetch_assoc($irs);
    $iid=$row['id'];
    if(mysqli_num_rows($rs)>0 )
    {       
        $_SESSION['userid']=$id;
        $_SESSION['username']=$username;
        //跳转到考生页面
        echo "<script>window.location.href='./kaosheng.php';</script>";
    }else if(mysqli_num_rows($irs)>0)
    {
        $_SESSION['userid']=$iid;
        $_SESSION['username']=$username;
        echo "<script>window.location.href='./m_userinfoa.php';</script>";
    }else {
        echo "<script>alert('用户名或密码错误！');history.back();</script>";
        exit;
    }
}
mysqli_close($conn);