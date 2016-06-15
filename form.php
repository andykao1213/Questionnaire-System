<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Form | Quest</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
	<!--nav bar-->
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">Quest</a>
	    </div>
	    <ul class="nav navbar-nav navbar-right">
	      <li><a href="http://s103062209.web.2y.idv.tw/Questionnaire-System/design.php">Design</a></li>
	      <li class="active"><a href="#">Form</a></li>
	      <li><a href="#"><?php echo $_SESSION['username']; ?></a></li>
	      <li><a href="http://s103062209.web.2y.idv.tw/Questionnaire-System/logout.php">Logout</a></li>
	    </ul>
	  </div>
	</nav>
	<div class="container">

		<?php
			include("mysql_connect.inc.php");
			$form = $_SESSION['show'];
			$_SESSION['show'] = "";
			$id = $_SESSION['username'];
			if($form != null){
				$sql = "UPDATE member_member_table SET data = '$form' WHERE username = '$id'";
				mysql_query($sql);
			}
			
			
			$sql = "SELECT * FROM member_member_table where username = '$id'";
			$result = mysql_query($sql);
			$row = @mysql_fetch_row($result);
			echo $row[5];
			echo '<br><input type="submit" class="btn btn-default" >';
		?>
		
	</div>
	

</body>

</html>