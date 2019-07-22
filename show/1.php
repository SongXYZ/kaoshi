<?php
include('conn.php');

if(!isset($_POST['answer']))
{
    echo "<script>alert('请输入答案！');history.back();</script>";
    exit;
}

//接受数据
if(empty($_POST['tgradio'])||empty($_POST['answer1'])||empty($_POST['answer2'])||empty($_POST['answer3'])||empty($_POST['answer4']))
{
    
    echo "<script>alert('请输入题干！');history.back();</script>";
    exit;
    //header("location:./content.php");  
}
$content=$_POST['tgradio'].PHP_EOL;
$canswer1=$_POST['answer1'].PHP_EOL;
$canswer2=$_POST['answer2'].PHP_EOL;
$canswer3=$_POST['answer3'].PHP_EOL;
$canswer4=$_POST['answer4'];
$answer=$_POST['answer'];

//保存
if(!is_dir('../data/')) //检查上一级此目录是否存在
{
    mkdir('../data/');  //创建此目录
}
$file='../data/'.time().rand(0,100).'.txt';

$handle = fopen($file, "w") or die('添加失败！');
fwrite($handle, $content);
fwrite($handle, $canswer1);
fwrite($handle, $canswer2);
fwrite($handle, $canswer3);
fwrite($handle, $canswer4);
fclose($handle);

//构造sql语句
$str="insert into ts_chioce set c_fct='$file',c_as=$answer";
$r=mysqli_query($conn,$str);
if($r)
{
    echo "<script>window.location.href='./a_tchioce.php';</script>";
}else {
    "<script>alert('添加失败！');history.back();</script>";
}
mysqli_close($conn);
 