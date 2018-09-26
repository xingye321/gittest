<?php include("head.php") ?>
		<div class="sui-layout">
			<div class="sidebar">
				<!-- 左菜单 -->
				<?php include("leftmenu.php"); ?>
			</div>
			<div class="content">
				<p class="sui-text-xxlarge">课程修改信息</p>
				<table class="sui-table table-primary">
					<tr>
						<th>课程编号</th>
						<th>课程名</th>
						<th>时间</th>
						<th>操作</th>
					</tr>
					<?php
						// 输出数据
						// if (mysqli_num_rows($result) > 0) {
						// 	while ($row = mysqli_fetch_assoc($result)) {
						// 		echo "<tr>
						// 			<td>{$row['课程编号']}</td>
						// 			<td>{$row['课程名']}</td>
						// 			<td>{$row['时间']}</td>
						// 			<td>
						// 				<a href='kecheng-update.php?kid={$row['课程编号']}' class='sui-btn btn-small btn-info'>修改</a>&nbsp;&nbsp;
						// 				<a href='kecheng-del.php?kid={$row['课程编号']}' class='sui-btn btn-small btn-danger'>删除</a>
						// 			</td>
						// 		</tr>";
						// 	}
						// } else {
						// 	echo "没有记录";
						// }
					?>
				</table>
			</div>
		</div>
<?php include("foot.php"); ?>
<script>
$(function(){
	$.ajax({
		url : "api.php",
		type : "POST",
		dataType : "JSON",

		data:{
			"action":"kecheng"
		},
		beforeSend : function(XMLHttpRequest){
				$("#studentlist").html("<tr><td>正在查询,请稍后...</td></tr>")
			},
			success: function(data,textStatus){
				console.log(data.data);
				var str = "";
				if(data.code == 200){
					for(var i=0;i<data.data.length;i++){
						console.log(data.data[i]);
						str += "<tr><td>"+data.data[i].课程编号+"</td><td>"+ data.data[i].课程名 +"</td><td>"+ data.data[i].时间 +"</td></tr>"
					}
					$("#studentlist").html(str);
				}
			},
			error : function(XMLHttpRequest,textStatus,errorThrown){
				console.log( "失败原因：" + errorThrown );
			}
	})
})
</script>