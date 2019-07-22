<?php
include('./conn.php');

$iid=$_GET['id'];

$str="delete from iuser where id='$iid'";
$r=mysqli_query($conn,$str);
if($r)
{
    //删除成功
    echo "<script>alert('删除成功');window.location.href='./a_minfo.php';</script>";
}else {
    echo "<script>alert('删除失败！');history.back();</script>";exit;
}
mysqli_close($conn);