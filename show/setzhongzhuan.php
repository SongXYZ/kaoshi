<?php
include('./conn.php');

//接收数据
$snum=$_POST['snum'];
$sscore=$_POST['sscore'];
$cnum=$_POST['cnum'];
$cscore=$_POST['cscore'];
$jnum=$_POST['jnum'];
$jscore=$_POST['jscore'];
$pnum=$_POST['pnum'];
$pscore=$_POST['pscore'];
$time=$_POST['time'];
//验证数据有效性

//构造sql语句
$str="update answer set snum='$snum',sscore='$sscore',cnum='$cnum',cscore='$cscore',jnum='$jnum',jscore='$jscore',pnum='$pnum',pscore='$pscore',time='$time'";
$r=mysqli_query($conn,$str);
if($r)
{
    echo "<script>alert('设置成功！');window.location.href='./a_setjuans.php';</script>";
    exit;
}else {
    echo "<script>alert('设置失败！');history.back();</script>";
    exit;
}
mysqli_close($conn);