<?php
include('./conn.php');

$str="select * from answer"; //题目信息
$rs=mysqli_query($conn,$str);
$row=mysqli_fetch_assoc($rs);

//接收数据
$userid=$_POST['id'];//正在答题用户的id

$aid=$_POST['a']; //正确答案id

$i=0;
foreach($aid as $k=>$a)  //提交的答案
{
    //单选和判断
    if($i < $row['snum']+$row['jnum'])
    {
        $tas[$k]=$_POST[$a];
    }
    else if($i < $row['snum']+$row['jnum']+$row['cnum']){
        $s=$_POST[$a];
        $status=array_sum($s);
        $tas[$k]=$status;
    }
    else {
        //去换行符
        $answer = str_replace(PHP_EOL,'', $_POST[$a]);
        //加换行符
        //$answer.=PHP_EOL;
        $tas[$k]=$answer;
    }
    $i++;
}



//保存提交的答案
if(!is_dir('../daandata/')) //检查上一级此目录是否存在
{
    mkdir('../daandata/');  //创建此目录
}
$file='../daandata/'.'a_'.time().rand(0,100).'.txt';

$handle = fopen($file, "a") or die('添加失败！');
foreach($aid as $k=>$a)
{
    $b=$a;
    $b.=PHP_EOL;
    fwrite($handle, $b); //答案id
}
$end=array_pop($tas);
foreach($tas as $a)
{
    //if(end($tas)==$a)
    //{
    //    fwrite($handle, $b);
    //}else {
        $b=$a;
        $b.=PHP_EOL;
        fwrite($handle, $b); //提交的答案
    //}
}
fwrite($handle, $end);
fclose($handle);
//构造sql语句
$str="insert into t_answer set userid='$userid',ta_fct='$file'";
//$id=mysqli_insert_id($conn);
mysqli_query($conn,$str);
mysqli_close($conn);
echo "<script>alert('提交成功');window.location.href='../index.html';</script>";