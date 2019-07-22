<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../style/view/css/style.css">
</head>
<body>
  <div class="main">
  	<div class="main-wrap">
  		<form action="./3.php" method="post" id="testForm">
					<!-- 判断题 -->
					<div class="question-wrap">
							<div class="question-type">判断题</div>
							<div class="question-each">
								<div class="question-name"></div>
								<span>题干：<input type="text"name="tgjudge"></span>
								<div class="question-option">
									<span>答案：<input type="radio" value=1 name="jas">对</span>
									<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" value=0 name="jas">错</span>
								</div>
							</div>	
							<span><input type="submit" value="添加"></span>			
					</div>
				</form>
			</div>
		</div>
		<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script> 
</body>
</html>