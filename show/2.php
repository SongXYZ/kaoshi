<?php
include('conn.php');

//存在并且值不是 NULL 则返回 TRUE，否则返回 FALSE
//接受数据,验证数据有效性
if(!isset($_POST['manswer']))
{
    echo "<script>alert('请输入答案！');history.back();</script>";
    exit;
}

if(empty($_POST['tgcheck'])||empty($_POST['answer1'])||empty($_POST['answer2'])||empty($_POST['answer3'])||empty($_POST['answer4']))
{
    
    echo "<script>alert('请输入题干！');history.back();</script>";
    exit;
    //header("location:./content.php");  
}

//加换行符
$content=$_POST['tgcheck'].PHP_EOL;
$canswer1=$_POST['answer1'].PHP_EOL;
$canswer2=$_POST['answer2'].PHP_EOL;
$canswer3=$_POST['answer3'].PHP_EOL;
$canswer4=$_POST['answer4'];
$answer=$_POST['manswer'];
$status=array_sum($answer);


//保存数据
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
$str="insert into ts_mchioce set mc_fct='$file',mc_as='$status'";
$r=mysqli_query($conn,$str);
if($r)
{
    echo "<script>window.location.href='./a_tmchioce.php';</script>";
}else {
    "<script>alert('添加失败！');history.back();</script>";
}
// $idc=mysqli_insert_id($conn);
// foreach($answer as $asw)
// {
//     switch($asw)
//         {
//             case 1:{
//                         $str="update ts_mchioce set mc_as1=$asw where id=$idc";
//                         mysqli_query($conn,$str);
//                         break;}
//             case 2:{
//                         $str="update ts_mchioce set mc_as2=$asw where id=$idc";
//                         mysqli_query($conn,$str);
//                         break;}
//             case 3:{
//                         $str="update ts_mchioce set mc_as3=$asw where id=$idc";
//                         mysqli_query($conn,$str);
//                         break;}
//             case 4:{
//                         $str="update ts_mchioce set mc_as4=$asw where id=$idc";
//                         mysqli_query($conn,$str);
//                         break;}
//             default:break;
//         }
// }
mysqli_close($conn);