<?php
class User{
    private $db;
	private $fm;
	public function __construct()
	{
		$this->db=new Database;
		$this->fm=new Format;
	}
	public function user_list()
	{
		$LIST=$this->db->select("student","*");
		if($LIST)
		{
           return $LIST;
		}
	}
		public function user_delete($delid){
		$delid=mysqli_real_escape_string($this->db->connection,$delid);
		$delete=$this->db->delete("student","id='$delid'");
		if($delete)
		{
			echo $this->fm->success("User Deleted Successfully");
		}else
		{
			echo $this->fm->error("Something Went Wrong");
		}
	}

	public function user_status($stid){
		$stid=mysqli_real_escape_string($this->db->connection,$stid);
		$st_data=$this->db->selectby("student","*","id='$stid'");
		$status=$st_data->fetch_assoc();
		if($status['status']=='Active')
		{
		  $ac=$this->db->update("student","status='Inactive'","id='$stid'");
		  if($ac)
		  {
             echo $this->fm->success("Status  Succesfully Updated Into Inactive");
		  }else
		  {
           echo $this->fm->error("Something Went Wrong");
		  }
		}else
		{
			$ac=$this->db->update("student","status='Active'","id='$stid'");
			if($ac)
			{
              echo $this->fm->success(" Status  Succesfully Updated Into Active");
			}else
			{
             echo $this->fm->error("Something Went Wrong");
			}
		}
	}


	public function log_user_data($email)
	{
		$profile=$this->db->selectby("student","*","email='$email'");
        if($profile)
        {
        	return $profile->fetch_assoc();
        }
	}

}