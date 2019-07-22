<?php
include('./conn.php');

//接收数据
$id=$_GET['id'];
$sscore=0;

//判断单选
$str="select * from answer";
$rs=mysqli_query($conn,$str);
$arow=mysqli_fetch_assoc($rs); //取出题目信息
//$arow['sscore'] cscore jscore pscore
$times=$arow['snum']+$arow['cnum']+$arow['jnum']+$arow['pnum'];


$str="select * from t_answer where userid='$id'";//条件完成
$rs=mysqli_query($conn,$str);
$tarow=mysqli_fetch_assoc($rs); //取出提交的答案



$handle=fopen($tarow['ta_fct'],'rb+') or die('error');
$i=0;
while($i<$times){
	$daid[$i]=fgets($handle); //正确答案的id
	$i++;
}
$k=0;
while(!feof($handle))
{
	$tdaan[$k]=fgets($handle); //提交的答案
	$k++;
}
fclose($handle);

$j=0;
//判断
while($j<$arow['jnum'])
{
	$str="select * from ts_judge where id='$daid[$j]'";
	$rs=mysqli_query($conn,$str);
	while($zhrow=mysqli_fetch_assoc($rs))
	{
		if((int)($zhrow['j_as']) == (int)($tdaan[$j]))
		{
			$sscore+=$arow['jscore'];
		}
		
	}
	$j++;
}

//单选
while($j<($arow['jnum']+$arow['snum']))
{
	$str="select * from ts_chioce where id='$daid[$j]'";
	$rs=mysqli_query($conn,$str);
	while($zhrow=mysqli_fetch_assoc($rs))
	{
		if((int)($zhrow['c_as'])==(int)($tdaan[$j]))
		{
			$sscore+=$arow['sscore'];
		}
		
	}
	$j++;
}

//多选
//define('L1',1);define('L2',2);define('L3',4);define('L4',8);
while($j<($arow['jnum']+$arow['snum']+$arow['cnum']))
{
	$str="select * from ts_mchioce where id='$daid[$j]'";
	$rs=mysqli_query($conn,$str);
	while($zhrow=mysqli_fetch_assoc($rs))
	{
		if((int)($zhrow['mc_as'])==(int)($tdaan[$j]))
		{
			$sscore+=$arow['cscore'];
		}
		
	}
	$j++;
}


?>

<html>
<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>在线考试系统</title>
		<link rel="stylesheet" href="../style/view/css/style.css"/>
</head>
<body>
     	<form action="./m_savescore.php" method="post" id="testForm">
					<!-- 判断题 -->
			<div id="binary" class="anchor" ></div>
				<div class="question-wrap">
					<div class="question-type">主观题<span>（共<?=$arow['pnum'];?>题，每题<?=$arow['pscore'];?>分）</span></div>
					<?php
				
						$t=1;
						while($j<$times)
						{
							$str="select * from ts_push where id='$daid[$j]'";
							$rs=mysqli_query($conn,$str);
							while($zhrow=mysqli_fetch_assoc($rs))
							{
								
								$handle=fopen($zhrow['p_fct'],'rb+') or die('error');
								echo '<div class="question-each">';
									//题干
									
									//$fget=fgets($handle);
									echo '<div class="question-name">';
									echo fgets($handle);
									echo '</div>';
									//<!-- 选项 -->
									
									echo '<div class="question-option">';
									echo '<span><font color="black">考生答案：</font>'.$tdaan[$j].'</span>';
									echo "<span><font color='black'>参考答案：</font>".fgets($handle)."</span>";
									echo '</div>';
								echo '</div>';
								echo '<span>得分：<input type="text" name="score" required=""></span>';
							}
							$j++;
						}
						echo "<input type='hidden' name='sta' value='1'/>";
						echo "<input type='hidden' name='id' value='".$id."'/>";
						echo "<input type='hidden' name='sscore' value='".$sscore."'/>";
						echo "<input type='submit' value='提交'/>";
					?>		
								
			</div>
			
		</form>

</body>
</html>