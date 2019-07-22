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
  		<form action="./1.php" method="post" id="testForm">
			<div class="question-wrap">
			<div class="question-type">单选题</div>
				<div class="question-each">
					<div class="question-name"></div>
					题干：<input type="text" name="tgradio">
						<div class="question-option">
						<la class='lable'>答案：<input type='text' name='answer1'/><input type="radio" value=1 name="answer">A</la>
						<la class='lable'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='answer2'/><input type="radio" value=2 name="answer">B</la>
						<la class='lable'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='answer3'/><input type="radio" value=3 name="answer">C</la>
						<la class='lable'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='answer4'/><input type="radio" value=4 name="answer">D</la>
							</div>
						</div>
						<input type="submit" value="提交">
					</div>
				</form>
			</div>
		</div>
</body>
</html>