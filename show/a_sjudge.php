<?php
include('./conn.php');

$id=$_GET['id'];

$strr="select * from ts_judge where id='$id'";
$rs=mysqli_query($conn,$strr);
$row=mysqli_fetch_assoc($rs);

$filename='../data/'.$row['j_fct'];
if(file_exists($filename))
{
    unlink($filename);
    echo "<script>alert('删除文件成功！');history.back();</script>";
}else {
    echo "<script>alert('删除失败！');history.back();</script>";exit;
}

$str="delete from ts_judge where id='$id'";
$r=mysqli_query($conn,$str);
if($r)
{
    echo "<script>alert('删除成功！');history.back();</script>";
}else {
    echo "<script>alert('删除失败！');history.back();</script>";
}