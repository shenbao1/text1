<?php 
require("dbconnect.php");
$sql="select * from todo;";
$result = mysqli_query($conn, $sql);

$rows = array(); //要回傳的陣列
while($r = mysqli_fetch_assoc($result)) {
	$rows[] = $r; //將此筆資料新增到陣列中
}

//將查詢結果轉成json字串
echo json_encode($rows);

?>
