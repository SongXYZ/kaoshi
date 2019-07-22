<?php
include('./conn.php');

$score=$_POST['score']; //加分题
$sscore=$_POST['sscore'];//单 多 判
$id=$_POST['id'];

$sc=$score+$sscore; //总分

$str="update user set score='$sc',sta='1' where id='$id'";
$r=mysqli_query($conn,$str);
if($r)
{
    echo "<script>window.location.href='./m_userinfoa.php';</script>";
}else {
    echo "<script>alert('提交失败！');history.back();</script>";
    exit;
}
mysqli_close($conn);