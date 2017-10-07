<?php
class Setup{
	
	private $db;
	private $fm;
	public function __construct()
	{
		$this->db=new Database;
		$this->fm=new Format;
	}

	public function setup_data()
	{
	  	$data=$this->db->selectby("Setup","*","id=1");
	  	if($data)
	  	{
	  		return $data->fetch_assoc();
	  	}
	}

	public function set_up($data,$file)
	{
        $school_name         =$data['school_name'];
        $school_email        =$data['school_email'];
        $school_address      =$data['school_address'];
        $school_logo_name    =$file['school_logo']['name'];
        $school_logo_tmp     =$file['school_logo']['tmp_name'];
        $div                 =explode(".",$school_logo_name);
        $ext                 =strtolower(end($div));
        $school_logo_path    ="images/Setup/".time().".".$ext;
        $required            =[$school_name,$school_email,$school_address,$school_logo_name];
        $this->fm->required($required);
        foreach ($required as  $value) {
        	$this->fm->validation($value);
        	mysqli_real_escape_string($this->db->connection,$value);
        }
        if(!filter_var($school_email,FILTER_VALIDATE_EMAIL))
        {
        	echo $this->fm->error("Email Is Not Valid");
        }elseif(!empty($school_logo_name))
        { 
        	move_uploaded_file($school_logo_tmp,$school_logo_path);
        	$update=$this->db->update("Setup","school_name='$school_name',school_email='$school_email',school_address='$school_address',school_logo='$school_logo_path'","id=1");
        	if($update)
        	{
        		echo $this->fm->success("$school_name Data Updated Successfully");
        	}
        	else
        	{
        		echo $this->fm->error("Something Went Wrong.");
        	}
        }else
        {
        	$updated=$this->db->update("Setup","school_name='$school_name',school_email='$school_email',school_address='$school_address'","id=1");
        	if($updated)
        	{
        		echo $this->fm->success("$school_name Data Updated Successfully");
        	}
        	else
        	{
        		echo $this->fm->error("Something Went Wrong.");
        	}

        }

	}


}