<?php
include("./conn.php");
require_once ("../Jpgraph/Jpgraph/jpgraph.php");
require_once ("../Jpgraph/Jpgraph/jpgraph_pie.php");
require_once ("../Jpgraph/Jpgraph/jpgraph_pie3d.php");			//引用3D饼图PiePlot3D对象所在的类文件


//构造sql语句
$strr="select * from answer";
$rss=mysqli_query($conn,$strr);
$roww=mysqli_fetch_assoc($rss);
$tscore=$roww['jnum']*$roww['jscore']+$roww['snum']*$roww['sscore']+$roww['cnum']*$roww['cscore']+$roww['pnum']*$roww['pscore'];
$a=$tscore*0.9;$b=$tscore*0.8;$c=$tscore*0.7;$d=$tscore*0.6;//分数段
$as=0;$bs=0;$cs=0;$ds=0;$es=0; //每个分数段的人数

$ida[0]=0;$idb[0]=0;$idc[0]=0;$idd[0]=0;$ide[0]=0;
$str="select * from user";
$rs=mysqli_query($conn,$str);
while($row=mysqli_fetch_assoc($rs))
{
    //id username major education tel score sta 100*0.6
    //$tscore*0.6  0.7  0.8  0.9 1
    if(!empty($row['score']))
    {
        //存id $row['id'] $id[]
        switch($row['score'])
        {
            case ($row['score']<$d && $row['score']>0):$ide[$es]=$row['id'];$es++;break;
            case $row['score']<$c && $row['score']>=$d:$idd[$ds]=$row['id'];$ds++;break;
            case $row['score']<$b && $row['score']>=$c:$idc[$cs]=$row['id'];$cs++;break;
            case $row['score']<$a && $row['score']>=$b:$idb[$bs]=$row['id'];$bs++;break;
            case $row['score']<$tscore && $row['score']>=$a:$ida[$as]=$row['id'];$as++;break;
            default:break;
        }
    }

}
//数组合成字符串
$ida=implode(' ',$ida);$idb=implode(' ',$idb);$idc=implode(' ',$idc);$idd=implode(' ',$idd);$ide=implode(' ',$ide);

$data = array($as,$bs,$cs,$ds,$es);//定义数组 数据人数
$graph = new PieGraph(700,600,'auto');				//创建画布
$graph->SetShadow();								//设置画布阴影

$graph->title->Set("Examinee Score Chart");			//创建标题
//$graph->title->SetFont(FF_SIMSUN,FS_BOLD);			//设置标题字体
//$graph->legend->SetFont(FF_SIMSUN,FS_NORMAL);			//设置图例字体

$p1 = new PiePlot3D($data);							//创建3D饼形图对象
$p1->SetLegends(array("90%~100%","80%~89%","70%~79%","60%~69%","<60%"));  //分数段
$targ=array("a_tjscored.php?v=$ida","a_tjscored.php?v=$idb","a_tjscored.php?v=$idc","a_tjscored.php?v=$idd","a_tjscored.php?v=$ide"); //分数段统计人数 链接
$alts=array("num=%d","num=%d","num=%d","num=%d","num=%d");  //分数段统计人数
$p1->SetCSIMTargets($targ,$alts);

$p1->SetCenter(0.5,0.4);					//设置饼形图所在画布的位置
$graph->Add($p1);//将3D饼图形添加到图像中
$graph->StrokeCSIM();//输出图像到浏览器