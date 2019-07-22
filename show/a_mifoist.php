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
  		<form action="./a_minsert.php" method="post" id="testForm">
					<!-- 判断题 -->
					<div class="question-wrap">
							<div class="question-type">面试官信息</div>
							<div class="question-each">
								<div class="question-name"></div>
								<p><span>用户名：<input type='text' name='username'/></span></p>
                                <p><span>密&nbsp;&nbsp;&nbsp;码：<input type='text' name='password'/></span></p>
							</div>	
							<span><input type="submit" value="添加"></span>			
					</div>
				</form>
			</div>
		</div>
		<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script> 
</body>
</html>