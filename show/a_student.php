<?php
include('./conn.php');

$pagesize=10;  //每页显示的条数
$page=isset($_GET['page'])?$_GET['page']:1;  //当前页

//构造sql语句
$str="select * from user";
$rs=mysqli_query($conn,$str);
$rows_count=mysqli_num_rows($rs);
$pagecount=ceil($rows_count/$pagesize); //总页数
if($rows_count==0)
{
	echo "<script>window.location.href='./a_404.php?num=1';</script>";exit;
}else{
if($page>0 && $page<=$pagecount)
{
	$start=($page-1)*$pagesize;
    $str="select * from user limit $start,$pagesize";
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
<link rel="stylesheet" type="text/css" href="../style/view/css/bootstrap.css" />
<style>
	#dd{margin: auto 30%;}
</style>
<title>意见反馈</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 
	<span class="c-gray en">&gt;</span> 
	考生管理 
	<span class="c-gray en">&gt;</span> 
	考生信息 
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" >
		<i class="Hui-iconfont">&#xe68f;</i>
	</a>
</nav>
<div class="page-container">
	<div class="mt-20">
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="100">ID</th>
					<th width="100">姓名</th>
					<th width="100">性别</th>
					<th width="100">专业</th>
					<th width="100">学历</th>
					<th width="100">联系方式</th>
					<th width="100">卷面成绩</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$i=$pagesize*($page-1);
			while($row=mysqli_fetch_assoc($rs))
			{
				//id $row['username'] gender major education regtime
				echo '<tr class="text-c">';
				echo '<td>'.++$i.'</td>';
				echo '<td>'.$row['username'].'</td>';
				echo '<td>'.$row['gender'].'</td>';
				echo '<td>'.$row['major'].'</td>';
				echo '<td>'.$row['education'].'</td>';
				echo '<td>'.$row['tel'].'</td>';
				if((int)($row['sta']) == 1)
				{
					echo '<td>'.$row['score'].'</td>';
				}else {
					echo '<td><font color="red">未阅卷</font></td>';
				}
				
				echo '</tr>';
			}
			?>
			</tbody>
		</table>
	</div>
</div>
<?php
			echo "<nav id='dd' aria-label='Page navigation'>";
			echo "<ul class='pagination'>";
				if($page!=1)
				{
					echo "<li>";
				?><a href='a_student.php?page=<?=$page-1?>' aria-label='Previous'>
					<span aria-hidden="true">&laquo;</span></a></li>
				
				<?php
				}else{echo "<li><span aria-hidden='true'>&laquo;</span></li>";}
		
				for($i=1;$i<=$pagecount;$i++)
				{
					if($page==$i)
					{
						echo "<li class='active'><a href='a_student.php?page=".$i."'>".$i."<span class='sr-only'>(current)</span></a></li>";
					}
					else{echo "<li><a href='a_student.php?page=".$i."'>".$i."</a></li>";} 
				}

				if($page<$pagecount)
				{
				?>
					<li>
					<a href="a_student.php?page=<?=$page+1?>" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					</a>
					</li>
				</ul>
				<?php
				}else{echo '<li><span aria-hidden="true">&raquo;</span></li>';}
				echo "</ul></nav>";
			}else{
				echo "<script>alert('页码错误！');history.back();</script>";
			}
		}
?>
<script type="text/javascript" src="lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="lib/layer/2.4/layer.js"></script>  
<script type="text/javascript" src="static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="lib/laypage/1.2/laypage.js"></script>
</body>
</html>