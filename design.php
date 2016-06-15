<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Design | Quest</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

	<?php

		$_SESSION['show'];
		$single_choice = array("sq1", "sq2", "sq3", "sq4", "sq5");
		$multiple_choice = array("mq1", "mq2", "mq3", "mq4", "mq5");
		
		if($_SERVER["REQUEST_METHOD"] == "POST"){

			if(test_input($_POST["single_question"]) != ""){
				
				$_SESSION["show"] .= '<h1 class="page-header">'.test_input($_POST["single_question"]).'</h1>';
			
				for($i=0; $i<5; $i++){
					
					if(test_input($_POST[$single_choice[$i]])){
						$_SESSION["show"] .= '<input type="radio">'.test_input($_POST[$single_choice[$i]]).'<br>';
					}else{
						break;
					}
				}
			} else if(test_input($_POST["multiple_question"]) != ""){

				$_SESSION["show"] .= '<h1 class="page-header">'.test_input($_POST["multiple_question"]).'</h1>';

				for($i=0; $i<5; $i++){
					
					if(test_input($_POST[$multiple_choice[$i]])){
						$_SESSION["show"] .= '<input type="checkbox">'.test_input($_POST[$multiple_choice[$i]]).'<br>';
					}else{
						break;
					}
				}

			} else if(test_input($_POST["short_question"]) != ""){

				$_SESSION['show'] .= '<h1 class="page-header">'.test_input($_POST["short_question"]).'</h1>';

				$_SESSION["show"] .= '<label for="comment">Answer:</label><textarea class="form-control" rows="5" id="comment"></textarea>';
				
			}
		} 

		function test_input($data){
			$data = trim($data);
  			$data = stripslashes($data);
  			$data = htmlspecialchars($data);
  			return $data;
		}
	?>

	<!--nav bar-->
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">Quest</a>
	    </div>
	    <ul class="nav navbar-nav navbar-right">
	      <li class="active"><a href="#">Design</a></li>
	      <li><a href="http://s103062209.web.2y.idv.tw/Questionnaire-System/form.php">Form</a></li>
	      <li><a href="#"><?php echo $_SESSION['username']; ?></a></li>
	      <li><a href="http://s103062209.web.2y.idv.tw/Questionnaire-System/logout.php">Logout</a></li>
	    </ul>
	  </div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 col-md-2 sidebar">
				<ul class="well nav-sidebar" style="list-style-type:none">
					<li><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#singleChoice">單  選</button></li><br>
					<li><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#mutipleChoice">多  選</button></li><br>
					<li><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#shortText">簡  答</button></li><br>
					<form method="post" action="form.php">
						<?php
							include("mysql_connect.inc.php");

							$sql = "SELECT * FROM member_member_table";
							$result = mysql_query($sql);
							echo "<h4>受訪清單</h4><br>";
							while ($row = mysql_fetch_row($result)) {
				 				echo '<input type="checkbox">'.$row[0].'<br>';
							}
						?>
						<br><br>
						<input type="submit" class="btn btn-info btn-lg" value="完  成">
					</form>
					
				</ul>
			</div>
	  	</div>
	  	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="abc">
	  		<span id="fuck">
	  		<?php
	  			if($_SESSION["show"] != ""){
	  				echo $_SESSION["show"];
	  			}
	  		?>
	  		</span>
	  	</div>
	</div>

	<!-- Modal -->
	<!--single choice-->
	 <div class="modal fade" id="singleChoice" role="dialog">
	    <div class="modal-dialog modal-lg">    
		    <!-- Modal content-->
		    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		    <div class="modal-content">
		        <div class="modal-header">
		          	<button type="button" class="close" data-dismiss="modal">&times;</button>
		          	<h4 class="modal-title">單選題</h4>  	
		        </div>
		        <div class="modal-body">
		        	<input type="text" class="form-control" placeholder="輸入問題" name="single_question"><br>
		        	<ul style="list-style-type:none">
		        		<li><input type="text" class="form-control" name="sq1" placeholder="輸入選項"></li><br>
		        		<span id="fieldSpace1"></span> 
		        		<li>
		        			<button type="button" class="btn btn-default" onclick="addField(1)">+</button>
		        			<button type="button" class="btn btn-default" onclick="delField(1)">-</button>
		        		</li>
		        	</ul>
		        </div>
		        <div class="modal-footer">
		          	<input type="submit" class="btn btn-default" >
		        </div>
		    </div> 
		    </form>

	    </div>
	</div>

	<!--multiple choice-->
	 <div class="modal fade" id="mutipleChoice" role="dialog">
	    <div class="modal-dialog modal-lg">    
		    <!-- Modal content-->
		    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		    <div class="modal-content">
		        <div class="modal-header">
		          	<button type="button" class="close" data-dismiss="modal">&times;</button>
		          	<h4 class="modal-title">多選題</h4>     	
		        </div>
		        <div class="modal-body">
		        	<input type="text" class="form-control" name="multiple_question" placeholder="輸入問題"><br>
		          	<ul style="list-style-type:none">
		        		<li><input type="text" class="form-control" name="mq1" placeholder="輸入選項"></li><br>
		        		<span id="fieldSpace2"></span> 
		        		<li>
		        			<button type="button" class="btn btn-default" onclick="addField(2)">+</button>
		        			<button type="button" class="btn btn-default" onclick="delField(2)">-</button>
		        		</li>
		        	</ul>
		        </div>
		        <div class="modal-footer">
		          	<input type="submit" class="btn btn-default" >
		        </div>
		    </div>
		    </form> 
	    </div>
	</div>

	<!--short text-->
	 <div class="modal fade" id="shortText" role="dialog">
	    <div class="modal-dialog modal-lg">    
		    <!-- Modal content-->
		    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		    <div class="modal-content">
		        <div class="modal-header">
		          	<button type="button" class="close" data-dismiss="modal">&times;</button>
		          	<h4 class="modal-title">簡答題</h4>
		          	
		        </div>
		        <div class="modal-body">
		          	<input type="text" class="form-control" name="short_question" placeholder="輸入問題">
		        </div>
		        <div class="modal-footer">
		          	<input type="submit" class="btn btn-default" >
		        </div>
		    </div> 
		    </form>
	    </div>
	</div>


	


	<script> 
		var countMin = 1; 
		var countMax = 5;
		var commonName = "T";
		var count = [countMin, countMin];  //單、多選項數


		
		//設置選項
		function addField(n) { 
			if(count[n-1] == countMax) 
				alert("最多"+countMax+"個欄位"); 
			else if(n == 1){
				document.getElementById("fieldSpace1").innerHTML += '<li><input type="text" class="form-control" placeholder="輸入選項" name="sq'+(count[0]+1)+'"><br></li>';
				count[0]++;
			}else{
				document.getElementById("fieldSpace2").innerHTML += '<li><input type="text" class="form-control" placeholder="輸入選項" name="mq'+(count[1]+1)+'"><br></li>';
				count[1]++;
			} 
					 
		}
		function delField(n) {
			if (count[n-1] > countMin) {
				if(n == 1){
					var fs = document.getElementById("fieldSpace1"); 
					fs.removeChild(fs.lastChild);
					count[0]--;
				}else{
					var fs = document.getElementById("fieldSpace2"); 
					fs.removeChild(fs.lastChild);
					count[1]--;
				}	
			} else {
				alert("無新增欄位可以刪除");
			}	
		} 

	</script>


</body>
</html>