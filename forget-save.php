<?php
include("conn.php");
// 邮箱
$mali = empty($_POST['mali']) ? "null":$_POST['mali'];
// 密码提示
$question = empty($_POST['question']) ? "null":$_POST['question'];
// 答案
$answer = empty($_POST['answer']) ? "null":$_POST['answer'];
// 选择有没有邮件名称一样的
$scc="select email,name,password,question,answer from user where email = '{$mali}' and 	question='{$question}' and answer='{$answer}'";
$rcc = mysqli_query($conn,$scc);
if (mysqli_num_rows($rcc) >= 1) {
    echo "<p class='pp'>验证通过</p>";
    $row = mysqli_fetch_assoc($rcc);
    header("Refresh:2;url=index.php?update='{$row['email']}'");
}else{
    echo "<p class='pp'>验证失败</p>";
    header("Refresh:2;url=logon.php");
}
mysqli_close($conn);
include ("p.style.php");
?>