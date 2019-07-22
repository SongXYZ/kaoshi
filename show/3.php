<?php
include("conn.php");

if(!isset($_POST['jas']))
{
    echo "<script>alert('请输入答案！');history.back();</script>";
    exit;
}

//接收数据
//验证数据有效性
if(empty($_POST['tgjudge']))
{
    echo "<script>alert('请输入题干！');history.back();</script>";
    exit;  
}

$content=$_POST['tgjudge'];
$answer=$_POST['jas'];


//保存
if(!is_dir('../data/')) //检查上一级此目录是否存在
{
    mkdir('../data/');  //创建此目录
}
$file='../data/'.time().rand(0,100).'.txt';
$handle = fopen($file, "w") or die('添加失败！');
fwrite($handle,$content);
fclose($handle);

//构造sql语句
$str="insert into ts_judge set j_fct='$file',j_as=$answer";
$r=mysqli_query($conn,$str);
if($r)
{
    echo "<script>window.location.href='./a_tjudge.php';</script>";
}else {
    "<script>alert('添加失败！');history.back();</script>";
}
mysqli_close($conn);