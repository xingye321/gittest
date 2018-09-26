<?php
	$xsBhao = $_POST["xsBhao"];
	$xsXingming = $_POST["xsXingming"];
	$xsXingbie = $_POST["xsXingbie"];;
	$xsTime = $_POST["xsTime"];
	$xsDianhua = $_POST["xsDianhua"];
	//如果是录入页面提交,那么$action等于add;
	$action = empty($_POST["action"])?"add":$_POST["action"];
	if ((($_FILES["file"]["type"] == "image/gif")
		|| ($_FILES["file"]["type"] == "image/jpeg")
		|| ($_FILES["file"]["type"] == "image/pjpeg"))
		|| ($_FILES["file"]["type"] == "video/mp4")
		&& ($_FILES["file"]["size"] < 10241000)){
		if ($_FILES["file"]["error"] > 0){
  		echo "错误: " . $_FILES["file"]["error"] . "<br />";
  	}else{
  		// 重新给上传的文件命名，增加一个年月日时分秒，并且加上保存路径
		$filename = "upload/".date('YmdHis').$_FILES["file"]["name"];
		//move_uploaded_file()移动临时文件到上传的文件存放的位置,参数1.临时文件的路径, 参数2.存放的路径
		move_uploaded_file($_FILES["file"]["tmp_name"],$filename);  
	}
}else{
	echo "您上传的文件不符合要求!";
}

	if ($action == "add") {
		$xsXhao = $_POST["xsXhao"];
		$str = "添加";
		$url = "xuesheng-input.php";
		$sql1 = "insert into xue_sheng(学号,班号,姓名,照片,性别,出生日期,电话) value('$xsXhao','$xsBhao','$xsXingming','$filename','$xsXingbie','$xsTime','$xsDianhua')";
	}else if($action=="update"){
		$str = "更新";
		$url = "xuesheng-list.php";
		$kid = $_POST["kid"];
	 	$sql1 = "update xue_sheng set 班号='{$xsBhao}',姓名 = '{$xsXingming}',照片 = '{$filename}',性别='{$xsXingbie}',出生日期='{$xsTime}',电话='{$xsDianhua}' where id='{$kid}'";
	 	echo $sql1;
	}else{
		die("请选择操作方法");
	}
	include("conn.php");

	//执行SQL语句
	$result = mysqli_query($conn,$sql1);

	//输出数据
	// var_dump($result);
	if ($result) {
		echo "<script>alert('数据{$str}成功')</script>";
	 	header("Refresh:1;url={$url}");
	}else{
		echo "数据{$str}失败".mysqli_error($conn);
	}
//关闭数据库
mysqli_close($conn);
?>