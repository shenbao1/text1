<?php 
require("dbconnect.php");
$id=(int)$_GET['id'];
$sql="select * from todo where id=?;";
$stmt = mysqli_prepare($conn, $sql); //prepare sql statement
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);  //執行SQL
$result = mysqli_stmt_get_result($stmt); //取得查詢結果
if(	$rs = mysqli_fetch_assoc($result)) {
	//將查詢結果轉成json字串
	echo json_encode($rs);
} else {
	//查無資料
	echo "{}";
}

?>
