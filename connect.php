<? php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	include("mysql_connect.inc.php");
	$id = $_POST['id'];
	$pw = $_POST['pw'];

	//搜索資料庫資料
	$sql = "SELECT * FROM member_table where username = '$id'";
	$result = mysql_query($sql);
	$row = @mysql_fetch_row($result);

	//判斷帳密是否空白以及此會員是否存在
	if($id!=null && $pw!=null && $row[1] == $id && row[2] == $pw){
		$_SESSION['username'] = $id;
		echo '登入成功';
		echo '<meta http-equiv=REFRESH CONTENT=1;url=member.php>';
	} else{
		echo "登入失敗";
		echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
	}
?>