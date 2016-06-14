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

	<!--nav bar-->
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">Quest</a>
	    </div>
	    <ul class="nav navbar-nav navbar-right">
	      <li class="active"><a href="#">Design</a></li>
	      <li><a href="http://s103062209.web.2y.idv.tw/Questionnaire-System/form.php">Form</a></li>
	      <li><a href="http://s103062209.web.2y.idv.tw/Questionnaire-System/login.php">Login</a></li>
	    </ul>
	  </div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 col-md-2 sidebar">
				<ul class="well nav-sidebar">
					<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#singleChoice">單  選</button>
					<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#mutipleChoice">多  選</button>
					<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#shortText">簡  答</button>
				</ul>
			</div>
	  	</div>
	  	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="abc">
	  		<span id="fuck">
	  		<h1 class="page-header">Question 1</h1>
	  		<h1 class="page-header">Question 2</h1>
	  		<h1 class="page-header">Question 3</h1>
	  		</span>
	  	</div>
	</div>

	<!-- Modal -->
	<!--single choice-->
	 <div class="modal fade" id="singleChoice" role="dialog">
	    <div class="modal-dialog modal-lg">    
		    <!-- Modal content-->
		    <div class="modal-content">
		        <div class="modal-header">
		          	<button type="button" class="close" data-dismiss="modal">&times;</button>
		          	<h4 class="modal-title">單選題</h4>  	
		        </div>
		        <div class="modal-body">
		        	<input type="text" class="form-control" placeholder="輸入問題"><br>
		        	<ul style="list-style-type:none">
		        		<li><input type="text" class="form-control" placeholder="輸入選項"></li><br>
		        		<span id="fieldSpace1"></span> 
		        		<li>
		        			<button type="button" class="btn btn-default" onclick="addField(1)">+</button>
		        			<button type="button" class="btn btn-default" onclick="delField(1)">-</button>
		        		</li>
		        	</ul>
		        </div>
		        <div class="modal-footer">
		          	<button type="button" class="btn btn-default" data-dismiss="modal" onclick="submitSingle()">Submit</button>
		        </div>
		    </div> 
	    </div>
	</div>

	<!--multiple choice-->
	 <div class="modal fade" id="mutipleChoice" role="dialog">
	    <div class="modal-dialog modal-lg">    
		    <!-- Modal content-->
		    <div class="modal-content">
		        <div class="modal-header">
		          	<button type="button" class="close" data-dismiss="modal">&times;</button>
		          	<h4 class="modal-title">多選題</h4>     	
		        </div>
		        <div class="modal-body">
		        	<input type="text" class="form-control" placeholder="輸入問題"><br>
		          	<ul style="list-style-type:none">
		        		<li><input type="text" class="form-control" placeholder="輸入選項"></li><br>
		        		<span id="fieldSpace2"></span> 
		        		<li>
		        			<button type="button" class="btn btn-default" onclick="addField(2)">+</button>
		        			<button type="button" class="btn btn-default" onclick="delField(2)">-</button>
		        		</li>
		        	</ul>
		        </div>
		        <div class="modal-footer">
		          	<button type="button" class="btn btn-default" data-dismiss="modal">Submit</button>
		        </div>
		    </div> 
	    </div>
	</div>

	<!--short text-->
	 <div class="modal fade" id="shortText" role="dialog">
	    <div class="modal-dialog modal-lg">    
		    <!-- Modal content-->
		    <div class="modal-content">
		        <div class="modal-header">
		          	<button type="button" class="close" data-dismiss="modal">&times;</button>
		          	<h4 class="modal-title">簡答題</h4>
		          	
		        </div>
		        <div class="modal-body">
		          	<input type="text" class="form-control" placeholder="輸入問題">
		        </div>
		        <div class="modal-footer">
		          	<button type="button" class="btn btn-default" data-dismiss="modal">Submit</button>
		        </div>
		    </div> 
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
				document.getElementById("fieldSpace1").innerHTML += '<li><input type="text" class="form-control" placeholder="輸入選項" id="text'+count[0]+'"></li><br>';
				count[0]++;
			}else{
				document.getElementById("fieldSpace2").innerHTML += '<li><input type="text" class="form-control" placeholder="輸入選項" id="text'+count[1]+'"></li><br>';
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