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
				$sql = "select distinct 作者 from banji";
				$result = mysqli_query($conn, $sql);
		?>
		<div class="sui-layout">
		  <div class="sidebar">
			<!-- 左菜单 -->
			<?php include("leftmenu.php"); ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">新闻发布</p>
			<form id="form1" action="xinwen-list.php" method="post" class="sui-form form-horizontal sui-validate">
			  <div class="control-group">
			    <label for="kcName" class="control-label">标题：</label>
			    <div class="controls">
			      <input type="text" id="kcName" name="kcName" class="input-large input-fat" placeholder="输入新闻标题" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="kcTime" class="control-label">肩题：</label>
			    <div class="controls">
			      <input type="text" id="kcTime" name="kcTime" class="input-large input-fat"  placeholder="输入副标题">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="kcTime" class="control-label">作者：</label>
			    <div class="controls">
			       <select name='zuozhe' id='zuozhe'>
			      <?php
					if( mysqli_num_rows($result) > 0 ){
						while ( $row = mysqli_fetch_assoc($result) ) {
							echo "<option value='{$row['作者']}'>{$row['作者']}</option>";
						}
					}else{
						echo "<option value=''>请先添加作者信息</option>";
					}
			       ?>
			      </select>
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="kcTime" class="control-label">时间：</label>
			    <div class="controls">
			      <input type="text" id="kcTime" name="kcTime" class="input-large input-fat" data-toggle="datepicker"  placeholder="输入出版时间">
			    </div>
			  </div>
				<div class="control-group">
			    <label for="kcTime" class="control-label">内容：</label>
			    <div class="controls">
			      <textarea name="" id="" cols="30" rows="10"></textarea>
			    </div>
			  </div>
			  <div class="control-group">
			  	<label class="control-label"></label>
			  	<div class="controls">
			  		<input type="submit" value="提交" name="" class="sui-btn btn-large btn-primary">
			  	</div>
			  </div>
			</form>
		  </div>
		</div>
			<!-- 页脚 -->
	<?php include("foot.php"); ?>