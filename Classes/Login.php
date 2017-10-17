<?php
include '../Session/Session.php';
Session::checkLogin();
class Login{
    private $db;
	private $fm;
	public function __construct()
	{
		$this->db=new Database;
		$this->fm=new Format;
	}
	public function user_login($data)
	{
		$email=mysqli_real_escape_string($this->db->connection,$data['email']);
		$password=mysqli_real_escape_string($this->db->connection,$data['Password']);
		$input=[$email,$password];
		foreach ($input as  $value) {
			$this->fm->validation($value);
		}
		if(empty($email)||empty($password))
		{
			echo $this->fm->error("Field Must Required");
		}elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
	      echo $this->fm->error("Email Is Not Valid");
		}else{
             $password_hash=base64_encode($password);
             $user_data=$this->db->selectby("student","*","email='$email'AND password='$password_hash' AND status='Active'");
             if($this->db->connection->affected_rows>0)
             {
             	 $value=$user_data->fetch_assoc();
             	 Session::set("login",true);
             	 Session::set("name",$value['name']);
             	 Session::set("email",$value['email']);
                 header('Location:../User_panel/index.php');
             }else
             {
             	echo $this->fm->error("Something Went Wrong");
             }
		}

	}
}