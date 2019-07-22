<?php
include('./conn.php');

$id=$_GET['id'];

$str="select * from ts_push where id='$id'";
$rs=mysqli_query($conn,$str);

?>
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
<title>xx</title>
</head>
<body>

<div class="page-container">
	<div class="mt-20">
		
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			
			<tbody>
			<?php
            
            $row=mysqli_fetch_assoc($rs);
            //echo "<table border='1'>";
            $handle=fopen($row['p_fct'],'r') or die('error');

                    echo '<tr class="text-c">';
                    echo '<td>题干</td>';
                    echo '<td>'.fgets($handle).'</td>';
                    echo '</tr>';
                    echo '<tr class="text-c">';
                    echo '<td>答案</td>'; //chuange id
                    echo '<td>'.fgets($handle).'</td>'; //chuange id
                    echo '</tr>';
                    echo "<a href='./a_tpush.php'>返回</a>";
                     
      ?>
      
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>  
<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="lib/laypage/1.2/laypage.js"></script>
</body>
</html>