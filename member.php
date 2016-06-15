<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	include("mysql_connect.inc.php");
	echo '<a href="logout.php">登出</a>  <br><br>';

	//判斷有無權限
	if($_SESSION['username'] != null){
		echo '<a href="register.php">新增</a>    ';
        echo '<a href="update.php">修改</a>    ';
        echo '<a href="delete.php">刪除</a>  <br><br>';

		//顯示資料庫裡的所有會員
		$sql = "SELECT * FROM member_member_table";
		$result = mysql_query($sql);
		while ($row = mysql_fetch_row($result)) {
			 echo '- 名字(帳號)：'.$row[0].', 電話：'.$row[2].', 地址：'.$row[3].', 備註：'.$row[4].'<br>';
		}
	} else{
		echo "您無權限觀!";
		echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
	}
?>