<?php include("head.php") ?>
<?php
	include("conn.php");
	// 执行SQL语句
	$sql = "select * from news";
	$result = mysqli_query($conn,$sql);
	// 关闭数据库
	mysqli_close($conn);
?>
		<div class="sui-layout">
			<div class="sidebar">
				<!-- 左菜单 -->
				<?php include("leftmenu.php"); ?>
			</div>
			<div class="content">
				<p class="sui-text-xxlarge">新闻管理模块</p>
				<table class="sui-table table-primary">
					<tr>
						<th>id</th>
						<th>新闻标题</th>
						<th>内容</th>
						<th>操作</th>
					</tr>
					<?php
						// 输出数据
						if (mysqli_num_rows($result) > 0) {
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr>
									<td>{$row['标题']}</td>
									<td>{$row['肩题']}</td>
									<td>{$row['内容']}</td>
									<td>
//										
									</td>
								</tr>";
							}
						} else {
							echo "没有记录";
						}
					?>
				</table>
			</div>
		</div>
<?php include("foot.php"); ?>