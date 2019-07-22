<?php
include('./conn.php');

session_start();
$id=$_SESSION['userid'];

$str="select * from user where id='$id'";
$rs=mysqli_query($conn,$str);
$row=mysqli_fetch_assoc($rs);
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link href="lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />
<link href="static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="static/h-ui.admin/css/H-ui.admin.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>xxx</title>
</head>
<body>
<section class="container-fluid page-404 minWP text-c">
	<p class="error-title"><i class="Hui-iconfont va-m" style="font-size:80px">&#xe688;</i>
		<?php
		if((int)($row['sta']) == 1)
		{
			echo '<span class="va-m">您的成绩是'.$row['score'].'分</span>';
		}else {
			echo '<span class="va-m">您的试卷还未改</span>';
		}
		?>
	</p>
	<p class="error-description"></p>
	<p class="error-info">点击<a href="../index.html">返回</a>

	</p>
</section>
</body>
</html>