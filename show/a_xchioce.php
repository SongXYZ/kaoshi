<?php
include('./conn.php');

$id=$_GET['id'];

$str="select * from ts_chioce where id='$id'";
$rs=mysqli_query($conn,$str);

?>


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
                <?php
                while($row=mysqli_fetch_assoc($rs))
                {
                    echo "<table border='1'>";
                    $handle=fopen($row['c_fct'],'r') or die('error');
                    $i=0;
                    while(!feof($handle))
                    {
                        $fget=fgets($handle);
                        echo '<div class="question-name"></div>';
                        if($i==0)
                        {
                            echo '题干：'.$fget;$i++;
                        }else 
                        {
                            echo '<div class="question-option">';
                            switch($i)
                            {
                                case 1:echo "<la class='lable'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A.".$fget."</la>";$i++;break;
                                case 2:echo "<la class='lable'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;B.".$fget."</la>";$i++;break;
                                case 3:echo "<la class='lable'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C.".$fget."</la>";$i++;break;
                                case 4:echo "<la class='lable'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;D.".$fget."</la>";$i++;break;
                                default:++$i;break;
                            }
                            echo '</div>'; 
                        }
                    }
                fclose($handle);
            echo '</div>';
                switch($row['c_as'])
                {
                    case 1:echo "答案：A";break;
                    case 2:echo "答案：B";break;
                    case 3:echo "答案：C";break;
                    case 4:echo "答案：D";break;
                    default:break;
                }
                
            }
                ?>
                <a href='./a_tchioce.php'>返回</a>    
			</div>
		</form>
	</div>
  </div>
</body>
</html>