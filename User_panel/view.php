<?php
include '../Config/Config.php';
include '../Database/Database.php';
include '../Format/Format.php';
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
<div class="well text-success">
Answer:
</div>
<div class="">
<?php
   $value=$data->question_data_user();
   if($value)
   {
    while ($Answer=$value->fetch_assoc()) {
?>
  <h3>Q.<?=$Answer['question']?></h3>
  <div class="inline">
  <p><span class="text-danger"><?=$Answer['opt1']?></span></p>
  <p><span class="text-danger"><?=$Answer['opt2']?></span></p>
  <p><span class="text-danger"><?=$Answer['opt3']?></span></p>
  <p><span class="text-danger"><?=$Answer['opt4']?></span></p>
  </div>
  <p>Correct.<span class="text-success"><?=$Answer['corr']?></span></p>
  <?php
 }
}
?>
</div>
<div>
  <a href="index.php">
  <input type="button" class="btn btn-success" value="Start Exam Again">
  </a>
</div>
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