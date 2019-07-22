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
  		<form action="./4.php" method="post" id="testForm">
					<div class="question-wrap">
							<div class="question-type">主观题</div>
							<div class="question-each">
								<div class="question-name"></div>
								题干：<span><textarea name='tgpush' id='contenta' class='form-control' placeholder='请输入题干' rows='2' cols='140'></textarea></span>
								<div class="question-option">
                                答案：<span><textarea name='pas' id='contenta' class='form-control' placeholder='请输入答案' rows='20' cols='140'></textarea></span>
								</div>
                            </div>		
                            <label><input type="submit" value="添加"></label>		
                    </div>
                    
				</form>
			</div>
		</div>
		<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script> 
</body>
</html>