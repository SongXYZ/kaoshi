<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="stylesheet" type="text/css" href="static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/style.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<title>设置试卷</title>
</head>
<body>
<div class="page-container">
	<div class="mt-20">
		<table id="table1" class="table table-border table-bordered table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="200">题型</th>
					<th width="200">题目个数</th>
					<th width="200">每个题的分数</th>
					
				</tr>
			</thead>
		<form action="./setzhongzhuan.php" method="post">
			<tbody>
				<tr class="text-c">
					<td>判断题</td>
					<td id="td1"><input type='text' name='jnum'/></td>
					<td id="td2"><input type='text' name='jscore'/></td>
				</tr>
			</tbody>
			<tbody>
				<tr class="text-c">
					<td>单选题</td>
					<td><input type='text' name='snum'/></td>
					<td><input type='text' name='sscore'/></td>
				</tr>
			</tbody>
			<tbody>
				<tr class="text-c">
					<td>多选题</td>
					<td><input type='text' name='cnum'/></td>
					<td><input type='text' name='cscore'/></td>
				</tr>
			</tbody>
			<tbody>
				<tr class="text-c">
					<td>主观题</td>
					<td><input type='text' name='pnum'/></td>
					<td><input type='text' name='pscore'/></td>
				</tr>
			</tbody>
			<tbody>
				<tr class="text-c">
					<td>考试时间</td>
					<td colspan='2'><input type='text' name='time'/></td>
				</tr>
			</tbody>
		</table>
	</div>
	
	<div class="container">
			<input type="submit" value="完成" class="btn-primary btn-lg btn-block"></input>
	</div>
	</form>
</div>
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">

</script>
</body>
</html>