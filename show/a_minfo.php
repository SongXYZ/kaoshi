<?php
include('./conn.php');

$str="select * from iuser";
$rs=mysqli_query($conn,$str);

?>


<!DOCTYPE html>
<html>
<head>
	<title>面试官</title>
	<meta charset='utf-8'/>
<link rel="stylesheet" type="text/css" href="static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/style.css" />
</head>
<body>
<div class="page-container">
	<div class="mt-20">
		<table  class="table table-border table-bordered table-bg table-hover table-sort ">
			<thead>
			<tr class="text-c">
				<th width="200">ID</th>                  
				<th width="200">姓名</th>
				<th width="200">密码</th>
				<th width="200">删除</th>
			</tr>
			</thead>
			<tbody>
				<?php
				$i=0;
				while($row=mysqli_fetch_assoc($rs))
				{
					//$row['iuser'] ipswd regtime  table-responsive  id="dgFlowList"
					echo '<tr class="text-c">';
					echo '<td>'.++$i.'</td>';
					echo '<td>'.$row['iuser'].'</td>';
					echo '<td>'.$row['ipswd'].'</td>';
					echo '<td><a href="./a_mifodel.php?id='.$row['id'].'">删除</a></td>';
					echo '</tr>';
				}
				echo '<a href="./a_mifoist.php">添加</a>';
				?>
				
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript" src="lib/jquery.contextmenu/jquery.contextmenu.r2.js"></script>
<script type="text/javascript">
        function deleteCurrentRow(obj){
            var tr=obj.parentNode.parentNode;
            var tbody=tr.parentNode;
            tbody.removeChild(tr);
            //只剩行首时删除表格
            if(tbody.rows.length==1) {
                tbody.parentNode.removeChild(tbody);
            }
        }
</script>
</body>
</html>