<?php
include '../Config/Config.php';
include '../Database/Database.php';
$db=new Database;
if(isset($_POST['exam_name']))
{
	$exam_name=$_POST['exam_name'];
	$data=$db->selectby("Exam","subject","exam_name='$exam_name'")->fetch_assoc();
	echo $data['subject'];
}