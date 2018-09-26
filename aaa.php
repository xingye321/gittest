<?php 
	$kcName=$_GET["kcName"];
	$kcTime=$_GET["kcTime"];
	// 如果是录入页面提交，那么$action等于add
	$action=empty($_GET["action"])?"add":$_GET["action"];
	if($action=="add"){
		$sql1="insert into kecheng(课程名,时间) value('$kcName','$kcTime')";
	}else if($action=="uptade"){
		$kid=$_GET["kid"];
		$sql1="update kecheng set 课程名='{$kcName}',时间='{$kcTime}' where 课程编号={$kid}";
	}else{
		die("请选择操作方法");
	}

	// 创建连接
	$conn = mysqli_connect('localhost','root','');

	if($conn){
		echo '连接成功!';
	}else{
		die ('连接失败!'.mysqli_connect_error());
	}
	//选择要操作的数据库
	mysqli_select_db($conn,"student_dbs");
	//设置读取数据库的编码，不然显示汉字为乱码
	mysqli_query($conn,"set names utf8");

	//执行SQL语句
	
	
	$result=mysqli_query($conn,$sql1);

	//输出数据
	// var_dump($result);
	if($result){
		echo "<script>alert('数据更新成功')</script>";
		header("Refresh:1;url=kecheng-input.php");
	}else{
		echo "数据更新失败".mysqli_error($conn);
	}
	// 关闭数据连接
	mysqli_close($conn);
?>
