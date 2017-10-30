<?php
include '../Config/Config.php';
include '../Database/Database.php';
include '../Format/Format.php';
include '../Session/Session.php';
Session::checkSession();
spl_autoload_register(function($class){
    include '../Classes/'.$class.".php";
});
$data=new Question;


?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div id="body">
<span id="msg"></span>
<div>
<h1 class="mg">Welcome To Online Examination</h1>
<div class="well">
   You Are Done 
</div>
<div class="well text-success">
Congratualations ! Your Score Is
<div class="text-success">
<?php 
   if(isset($_SESSION['score']))
   {
    echo $_SESSION['score'];
    unset($_SESSION['score']);
   }

?>
</div>
</div>
<div>
  <a href="index.php">
  <input type="button" class="btn btn-success" value="Start Exam Again">
  </a>
  <a href="view.php">
  <input type="button" class="btn btn-success" value="View Answer">
  </a>
</div>
</div>
<hr>
<div>

 
</div>
<style type="text/css">
	body{
		background-color: gray;
	}
	#body{
		background-color: white;
		text-align: center;
		height: 400px;
		margin: 148px 120px 0px 184px;
	}
	#t{
                margin-right: 80px;
	}
	.mg{
		color: #3498db;
	}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
      $(document).ready(function (){


    });
</script>