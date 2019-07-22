<?php
include("conn.php");

//接受数据,去换行符
//验证数据有效性
if(empty($_POST['tgpush'])||empty($_POST['pas']))
{
    echo "<script>alert('请输入题干！');history.back();</script>";
    exit;  
}
$content = str_replace(PHP_EOL,'', $_POST['tgpush']);
$answer = str_replace(PHP_EOL,'', $_POST['pas']);

//加换行符
$content.=PHP_EOL;

//保存数据
if(!is_dir('../data/')) //检查上一级此目录是否存在
{
    mkdir('../data/');  //创建此目录
}
$file='../data/'.time().rand(0,100).'.txt';
$handle = fopen($file, "w") or die('添加失败！');
fwrite($handle, $content);  //写入文件
fwrite($handle, $answer);
fclose($handle);

//构造SQL语句
$str="insert into ts_push set p_fct='$file'";
$r=mysqli_query($conn,$str);
if($r)
{
    echo "<script>window.location.href='./a_tpush.php';</script>";
}else {
    "<script>alert('添加失败！');history.back();</script>";
}
mysqli_close($conn);