<?php 
	$email = $_POST["email"];
	$mz = $_POST["mz"];
	$question = $_POST["question"];
	// 如果是录入页面提交,那么$action等于add
	$action = empty($_POST["action"])?"add":$_POST["action"];
	if ($action == "add") {
		$str1 = "数据添加成功!";
		$str2 = "数据添加失败!";
		$url = "user-list.php";
		$sql = "select email,name,question from user where id={$id}";
		echo $sql;
	} else {
		die("请选择操作方法");
	}
	include("conn.php");
	// 执行SQL语句
	$result = mysqli_query($conn,$sql);
	// 输出数据
	if ($result) {
		echo "<script>alert('{$str1}');</script>";
		// Refresh:暂停时间
		header("Refresh:1;url={$url}");
	}
	// 关闭数据库
	mysqli_close($conn);
?>