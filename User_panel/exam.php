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
<div class="text-right" id="t"><h3>Time:<span id="time"></span></h3></div>
</div>
<hr>
<div>
<?php
if(isset($_GET['q']))
{   
	$id=(int)$_GET['q'];
	$id=preg_replace('/[^-a-zA-Z0-9_]/', '',$id);
    $value=$data->question_user($id);
}
if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['next']))
{
  $ans=$data->right_ans($_POST);
}
?>
<form action="" method="post">
<h2>Q1. <?=$value['question']?></h2>
<div>
<div class="radio">
  <label>
    <input type="radio" class="question" value="<?=$value['opt1']?>" name="optradio"/>
         <?=$value['opt1']?>
    </label>
</div>
<div class="radio">
  <label>
     <input type="radio" class="question" value="<?=$value['opt2']?>" name="optradio"/>
       <?=$value['opt2']?>
  </label>
</div>
<div class="radio">
  <label>
     <input type="radio" class="question" value="<?=$value['opt3']?>" name="optradio"/>
        <?=$value['opt3']?>
   </label>
</div>
<div class="radio">
  <label>
      <input type="radio" class="question" value="<?=$value['opt4']?>" name="optradio"/>
        <?=$value['opt4']?>
   </label>
</div>
</div>
<div>
<input type="submit" class="btn btn-success" name="next" value="Next Question"/>
<input type="hidden" name="q" value="<?=$id?>"/>
</div>
</form>
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
          var timesRun = 0;
          var interval = setInterval(function(){
             timesRun += 1;
            if(timesRun === 20){
            	$(".question").attr('disabled','disabled');
              $("#msg").html("<font style=\"color:red;\">You Can't Answer The Question.Time Is Up</font>");
              clearInterval(interval);

              }
            $("#time").text(timesRun);
}, 1000); 


    });
</script>
<script type="text/javascript">
   // window.onbeforeunload = function() { return "Are you sure you want to leave?"; }
</script>