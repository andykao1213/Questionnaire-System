<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
	include("mysql_connect.inc.php");

	$id = $_POST['id'];
	$pw = $_POST['pw'];
	$pw2 = $_POST['telephone'];
	$telephone = $_POST['address'];
	$address = $_POST['address'];
	$other = $_POST['other'];

	//判斷帳密是否有效
	if($id != null && $pw != null && $pw2 != null && $pw == $pw2){
		$sql = "insert int member_talbe (username, password, telephone, address, other) values('$id', '$pw', '$telephone', '$address', '$other')";
		 if(mysql_query($sql))
        {
                echo '新增成功!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        }
        else
        {
                echo '新增失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        }
	}else{
		echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
	}
?>