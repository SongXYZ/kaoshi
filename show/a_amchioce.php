<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../style/view/css/style.css">
	<style>
	.lable{padding:5px 0;display:block;cursor:pointer;}
	</style>
</head>
<body>
  <div class="main">
  	<div class="main-wrap">
  		<form action="./2.php" method="post" id="testForm">
				<div class="question-wrap">
					<div class="question-type">多选题</div>
					<div class="question-each">
						<div class="question-name"></div>
						题干：<input type="text" name="tgcheck">
						<div class="question-option">
						<la class='lable'>答案：<input type='text' name='answer1'/><input type="checkbox" value='1' name="manswer[]">A</la>
						<la class='lable'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='answer2'/><input type="checkbox" value='2' name="manswer[]">B</la>
						<la class='lable'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='answer3'/><input type="checkbox" value='3' name="manswer[]">C</la>
						<la class='lable'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='answer4'/><input type="checkbox" value='4' name="manswer[]">D</la>
						</div>
					</div>
						<input type="submit" value="添加">
				</div>
				</form>
			</div>
		</div>
</body>
</html>