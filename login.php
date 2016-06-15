<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login | Quest</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>

	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">Quest</a>
	    </div>
	    <ul class="nav navbar-nav navbar-right">
	      <li><a href="http://s103062209.web.2y.idv.tw/Questionnaire-System/design.php">Design</a></li>
	      <li ><a href="http://s103062209.web.2y.idv.tw/Questionnaire-System/form.php">Form</a></li>
	      <li class="active"><a href="#">Login</a></li>
	    </ul>
	  </div>
	</nav>	

	<div class="container">
		<form name="form" method="post" action="connect.php">
			<input type="text" class="form-control" name="id" placeholder="帳號" /> <br>
			<input type="password" class="form-control" name="pw" placeholder="密碼" /> <br>
			<input type="submit" class="btn btn-primary" name="button" value="登入" />&nbsp;&nbsp;
			<a href="register.php">申請帳號</a>
		</form>
	</div>
		
</body>
</html>
