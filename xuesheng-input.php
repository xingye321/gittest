		<!-- 页头 -->
		<?php include("head.php");
			$conn = mysqli_connect("localhost","root","" );
			if( $conn ){
				echo "连接成功！";
			}else{
				die("连接失败！".mysqli_connect_error() );
			}
			//选择要操作的数据库
			mysqli_select_db($conn, "student_dbs");
			//设置读取数据库的编码，不然显示汉字为乱码
			mysqli_query($conn, "set names utf8");
			$sql = "select distinct 课程编号 from kecheng";
			$sql1 = "select distinct 学号 from student";
			$result = mysqli_query($conn, $sql);
			$result1 = mysqli_query($conn, $sql1);
		?>
		<div class="sui-layout">
		  <div class="sidebar">
			<!-- 左菜单 -->
			<?php include("leftmenu.php"); ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">学生信息查询</p>
			<form class="sui-form form-horizontal sui-validate" action="xuesheng-save.php" method="post">
			  <div class="control-group">
			    <label for="xmName" class="control-label">姓名：</label>
			    <div class="controls">
			       <div class="controls">
			      <input type="text" id="xmName" name="xmName" class="input-large input-fat"  placeholder="输入姓名" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			  </div>
			  <div class="control-group">
			    <label for="xhName" class="control-label">学号：</label>
			    <div class="controls">
			      <input type="text" id="xhName" name="xhName" class="input-large input-fat"  placeholder="输入学号" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			  <div class="control-group">
			  	<label class="control-label"></label>
			  	<div class="controls">
			  		<input type="submit" value="查询" name="" class="sui-btn btn-large btn-primary">
			  	</div>
			  </div>
			</form>
		  </div>
		</div>
		<!-- 页脚 -->
	<?php include("foot.php"); ?>