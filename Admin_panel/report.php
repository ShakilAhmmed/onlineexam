<?php

include '../Config/Config.php';
include '../Database/Database.php';
include '../Format/Format.php';
$db=new Database;
$fm=new Format;
if(isset($_POST['exam_name']))
{
	$exam_name=$_POST['exam_name'];
	$data=$db->selectby("Exam","subject","exam_name='$exam_name'")->fetch_assoc();
	echo $data['subject'];
}

if(isset($_POST['name']))
{
        $name     =mysqli_real_escape_string($db->connection,$_POST['name']);
		$email    =mysqli_real_escape_string($db->connection,$_POST['email']);
		$password =mysqli_real_escape_string($db->connection,$_POST['password']);
		$password_hash=base64_encode($password);
		$confirm_password=mysqli_real_escape_string($db->connection,$_POST['confirm_password']);
		$input=[$name,$email,$password,$confirm_password];
		foreach ($input as  $value) {
			$fm->validation($value);
		}
		if(empty($name)||empty($email)||empty($password)||empty($confirm_password))
		{
			echo $fm->error("Field Must Required");
		}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
		{
           echo $fm->error("Email Is Not Valid");
		}else{
			$data=$db->selectby("student","*","email='$email'");
			if($data->num_rows>0)
			{
				echo $fm->error("Email Already Exist");
			}else
			{
              $insert=$db->insert("student","name='$name',email='$email',password='$password_hash',status='Inactive'");
              if($insert)
              {
                echo $fm->success("Registration Successfull");
              }else
              {
                  echo $fm->error("Something Went Wrong");
              }
			}

		}
}