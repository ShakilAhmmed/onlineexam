<?php
include '../Session/Session.php';
Session::checkAdminLogin();
class Adminlogin{
   
   	private $db;
	private $fm;
	// protected $admin_email;
	// protected $admin_password;
	public function __construct()
	{
		$this->db=new Database;
		$this->fm=new Format;
	}

    public function admin_login($data)
    {


      $admin_email   =mysqli_real_escape_string($this->db->connection,$data['email']);
      $admin_password=mysqli_real_escape_string($this->db->connection,base64_encode($data['password']));
     $admin_data=$this->db->selectby("Admin","*","email='$admin_email' AND password='$admin_password' AND status='Active'");
     if($admin_data->num_rows>0)
     {
          $data=$admin_data->fetch_assoc();
          Session::set("login",true);
          Session::set("name",$data['name']);
          header("Location:../Admin_panel/index.php");
     }
     else
     {
       echo $this->fm->error("Email And Password Not Match");
     }

   
    }
}