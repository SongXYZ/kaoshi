﻿<!DOCTYPE HTML>
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
<title>404页面</title>
</head>
<body>
<section class="container-fluid page-404 minWP text-c">
	<p class="error-title"><i class="Hui-iconfont va-m" style="font-size:80px">&#xe688;</i>
		<span class="va-m"> 404</span>
	</p>
	<p class="error-description">题库还没有数据~~~</p>
	<p class="error-info">您可以
		<?php
		$n=$_GET['num'];
		switch($n)
		{
			case 1:echo '<a href="./a_ajudge.php">添加数据</a>';break;
			case 2:echo '<a href="./a_achioce.php">添加数据</a>';break;
			case 3:echo '<a href="./a_amchioce.php">添加数据</a>';break;
			case 4:echo '<a href="./a_apush.php">添加数据</a>';break;
			default:break;
		}
		?>
	</p>
</section>
</body>
</html>