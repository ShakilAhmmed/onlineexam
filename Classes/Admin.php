<?php
class Admin{

	private $db;
	private $fm;
	protected $admin_name;
	protected $admin_email;
	protected $password;
	protected $status;
	public function __construct()
	{
		$this->db=new Database;
		$this->fm=new Format;
	}

	public function new_admin($data)
  {
 
     $this->admin_name =$data['admin_name'];
     $this->admin_email=$data['admin_email'];
     $this->password   =base64_encode($data['password']);
     $this->status     =$data['status'];
     $input      =[$admin_name,$admin_email,$password,$status];
    foreach ($input as  $value) {
    	$this->fm->validation($value);
    	mysqli_real_escape_string($this->db->connection,$value);
    }
   if(empty($this->admin_name)||empty($this->admin_email)||empty($this->password)||empty($this->status))
   {
    echo $this->fm->error("Input Field Must Required");
   }else
   {
   	 $new_admin_insert=$this->db->insert("Admin","name='$this->admin_name',email='$this->admin_email',password='$this->password',status='$this->status'");
   	  if($new_admin_insert)
   	  {
           echo $this->fm->success("$this->admin_name Added As Admin");
   	  }
   	  else
   	  {
         echo $this->fm->error("Something Went Wrong");
   	  }
   }
  }
  public function all_admin_info()
  {
  	$data=$this->db->select("Admin","*");
    if($data)
    {
    	return $data;
    }
  }
   public function admin_status($stid)
	{
		$stid=mysqli_real_escape_string($this->db->connection,$stid);
		$st_data=$this->db->selectby("Admin","*","id='$stid'");
		$status=$st_data->fetch_assoc();
		if($status['status']=='Active')
		{
		  $ac=$this->db->update("Admin","status='Inactive'","id='$stid'");
		  if($ac)
		  {
             echo $this->fm->success("Status  Succesfully Updated Into Inactive");
		  }else
		  {
           echo $this->fm->error("Something Went Wrong");
		  }
		}else
		{
			$ac=$this->db->update("Admin","status='Active'","id='$stid'");
			if($ac)
			{
              echo $this->fm->success("Status  Succesfully Updated Into Active");
			}else
			{
             echo $this->fm->error("Something Went Wrong");
			}
		}
     }
     public function admin_delete($delid)
     {
       $delid=mysqli_real_escape_string($this->db->connection,$delid);
       $delete=$this->db->delete("Admin","id='$delid'");
       if($delete)
       {
        echo $this->fm->success("Admin Deleted Sucesfully");
       }
       else
       {
         echo $this->fm->error("Something Went Wrong");
       }

     }

}