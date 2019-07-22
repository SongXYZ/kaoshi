<?php
include('../show/conn.php');

$str="select * from answer"; //题目信息
$rs=mysqli_query($conn,$str);
$arow=mysqli_fetch_assoc($rs);
?>

<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>在线考试系统</title>
		<link rel="stylesheet" href="../style/view/css/style.css"/>
		<link rel="stylesheet" href="../style/view/css/bootstrap.css"/>
		<script src="../style/view/js/jquery.min.js"></script>
		<script src="../style/view/js/jquery.timeout.js"></script>
		<script>
			$(function () {
				//关闭页面前提示
				$(window).on("beforeunload", function () {
					return "您尚未交卷！此操作将导致您的回答丢失。";
				});
				timeOver = false; //保存当前是否已经达到交卷时间
				//倒计时功能
				$(".timeout").timeout({
					//考试时间（页面刷新时，时间会重置。）
					"maxTime": <?=$arow['time'];?>,
					//到达时间自动交卷。（如果浏览器禁用JavaScript，此功能不会生效）
					"onTimeOver": function () {
						timeOver = true;
						alert("考试时间结束，系统自动交卷。");
						$("#testForm").submit();//交卷
					}
				});
				$("#testForm").submit(function (event) {
					$(window).off("beforeunload");      //解除绑定页面关闭事件
					timeOver || checkMultiple(event);	//检查多选题是否全部作答
				});
				//多选题至少选择一项
				function checkMultiple(event) {
					$(".jq-multiple .question-each").each(function () {
						if ($(this).find(".question-option input[type=checkbox]:checked").length > 1) {
							$(this).find(".question-option input[type=checkbox]:first").focus();
							event.preventDefault();  //阻止表单提交
							alert('您有多选题未作答！');
							return false;
						}
					});
				}
				;
			});
		</script>
	</head>
	<body>
		<div class="top">
			<div class="top-title"><span class="glyphicon glyphicon-hourglass"></span>正在考试 （剩余时间 <span class="timeout"></span>）</div>
		</div>
		<div class="main">
			<div class="main-wrap">
				<!-- 顶部标题 -->
				<div class="question-top">
					<!-- 试卷标题 -->
					<div class="question-title">姓名：<?php session_start();echo $_SESSION['username'];?></div>
					<!-- 题型导航 -->
					<div class="question-nav">
						<a href="#binary">判断题</a>
						<a href="#single">单选题</a>
						<a href="#multiple">多选题</a>
						<a href="#fill">填空题</a>
					</div>
				</div>
				<!-- 题目内容 -->
				<form action="./saveanswer.php" method="post" id="testForm">
					<!-- 判断题 -->
					<div id="binary" class="anchor" ></div>
					<div class="question-wrap">
						<div class="question-type">一、判断题<span>（共<?=$arow['jnum'];?>题，每题<?=$arow['jscore'];?>分）</span></div>
							<?php //用循环读题
							$str="select * from ts_judge where id>=(select floor(rand()*(select max(id) from ts_judge))) order by id limit $arow[jnum]";
							$rs=mysqli_query($conn,$str);
							$t=1;//题号
							while($row=mysqli_fetch_assoc($rs))
							{
								$handle=fopen($row['j_fct'],'rb+') or die('error');
								echo "<input type='hidden' name='a[]' value='".$row['id']."'></input>";
								while(!feof($handle)){
									echo '<div class="question-each">';
									//<!-- 标题 -->
										$fget=fgets($handle);
										echo '<div class="question-name">';
										echo $t.".".$fget;$t++; //题干
										echo '</div>';
										//<!-- 选项 -->
										echo '<div class="question-option">';	
											echo "<label><input type='radio' value='1' name='".$row['id']."' required>对</label>";
											echo "<label><input type='radio' value='0' name='".$row['id']."' required>错</label>";	
										echo '</div>';
									echo '</div>';
								}
							}
							?>								
					</div>
					<!-- 单选题 -->
					<div id="single" class="anchor" ></div>
					<div class="question-wrap">
						<div class="question-type">二、单选题<span>（共<?=$arow['snum'];?>题，每题<?=$arow['sscore'];?>分）</span></div>
							<?php
							$str="select * from ts_chioce where id>=(select floor(rand()*(select max(id) from ts_chioce))) order by id limit $arow[snum]";
							$rs=mysqli_query($conn,$str);
							$t=1;//题号
							while($row=mysqli_fetch_assoc($rs))
							{
								$i=0;
								$handle=fopen($row['c_fct'],'r') or die('error');
								echo "<input type='hidden' name='a[]' value='".$row['id']."'></input>";
								while(!feof($handle)){
								
									echo '<div class="question-each">';
									//<!-- 标题 -->
									$fget=fgets($handle);
									echo '<div class="question-name">';
									if($i==0) {echo $t.".".$fget;$t++;}
									echo '</div>';
									//<!-- 选项 -->
									echo '<div class="question-option">';
									switch($i)
									{
									
										case 1:echo	"<label><input type='radio' value='1' name='".$row['id']."' required>A.".$fget."</label>";$i++;break;
										case 2:echo	"<label><input type='radio' value='2' name='".$row['id']."' required>B.".$fget."</label>";$i++;break;
										case 3:echo	"<label><input type='radio' value='3' name='".$row['id']."' required>C.".$fget."</label>";$i++;break;
										case 4:echo	"<label><input type='radio' value='4' name='".$row['id']."' required>D.".$fget."</label>";$i++;break;
										default:++$i;break;
									}
									echo '</div>';
								echo '</div>';
								}
							}
							?>						
					</div>
					<!-- 多选题 -->
					<div id="multiple" class="anchor" ></div>
					<div class="question-wrap jq-multiple">
						<div class="question-type">三、多选题<span>（共<?=$arow['cnum'];?>题，每题<?=$arow['cscore'];?>分）</span></div>
						<?php
							$str="select * from ts_mchioce where id>=(select floor(rand()*(select max(id) from ts_mchioce))) order by id limit $arow[snum]";
							$rs=mysqli_query($conn,$str);
							$t=1;//题号
							while($row=mysqli_fetch_assoc($rs))
							{
								$i=0;
								$handle=fopen($row['mc_fct'],'rb+') or die('error');
								echo "<input type='hidden' name='a[]' value='".$row['id']."'></input>";
								while(!feof($handle)){
								
									echo '<div class="question-each">';
									//<!-- 标题 -->
									$fget=fgets($handle);
									echo '<div class="question-name">';
									if($i==0) {echo $t.".".$fget;$t++;}
									echo '</div>';
									//<!-- 选项 -->
									echo '<div class="question-option">';
									switch($i)
									{
									
										case 1:echo	'<label><input type="checkbox" value="1" name="'.$row['id'].'[]">A.'.$fget.'</label>';$i++;break;
										case 2:echo	"<label><input type='checkbox' value='2' name='".$row['id']."[]'>B.".$fget."</label>";$i++;break;
										case 3:echo	"<label><input type='checkbox' value='4' name='".$row['id']."[]'>C.".$fget."</label>";$i++;break;
										case 4:echo	"<label><input type='checkbox' value='8' name='".$row['id']."[]'>D.".$fget."</label>";$i++;break;
										default:++$i;break;
									}
									echo '</div>';
								echo '</div>';
								}
							}
						?>
					</div>
					<!-- 填空题 -->
					<div id="fill" class="anchor" ></div>
					<div class="question-wrap">
						<div class="question-type">四、主观题<span>（共<?=$arow['pnum'];?>题，每题<?=$arow['pscore'];?>分）</span></div>
						<?php
							$str="select * from ts_push where id>=(select floor(rand()*(select max(id) from ts_push))) order by id limit $arow[pnum]";
							$rs=mysqli_query($conn,$str);
							$t=1;//题号
							while($row=mysqli_fetch_assoc($rs))
							{
								$i=0;
								$handle=fopen($row['p_fct'],'rb+') or die('error');
								echo "<input type='hidden' name='a[]' value='".$row['id']."'></input>";
									echo '<div class="question-each">';
										//<!-- 标题 -->
										$fget=fgets($handle);
										echo '<div class="question-name">';
										echo $t.".".$fget;$t++;
										echo '</div>';
										//daan
										echo '<div class="question-option">';
										echo "<span><textarea id='contenta' class='form-control' placeholder='请输入答案' rows='10' col='10' name='".$row['id']."' required></textarea></span>";
									echo '</div>';
								echo '</div>';
								
							}
							?>
					</div>
					<div class="question-act">
						<?php echo "<input type='hidden' name='id' value='".$_SESSION['userid']."'></input>";?>
                        <input type="submit" value="交卷"/>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>