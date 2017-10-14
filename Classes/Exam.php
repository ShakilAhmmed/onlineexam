<?php
class Exam{

	private $db;
	private $fm;
	public function __construct()
	{
		$this->db=new Database;
		$this->fm=new Format;
	}

	public function exam_data($data)
	{
		$exam_name =$data['exam_name'];
		$subject   =$data['subject'];
		$status    =$data['status'];
		$input     =[
		          'Exam Name'=>$exam_name,
		          'Subject'=>$subject,
		          'Status'=>$status
		          ];
		
		foreach ($input as  $value) {
			$this->fm->validation($value);
			mysqli_real_escape_string($this->db->connection,$value);
		}
        if(empty($exam_name)||empty($subject)||empty($status))
        {
        	echo $this->fm->required($input);
        }else
        {
        $exam=$this->db->insert("Exam","exam_name='$exam_name',subject='$subject',status='$status'");
	        if($exam)
	        {
	        	echo $this->fm->success("$exam_name Added Succesfully");
	        }else
	        {
	        	echo $this->fm->error("Something Went Wrong");
	        }
        }
	}
	public function exam_list()
	{
		$data=$this->db->select("Exam","*");
		if($data)
		{
			return $data;
		}
	}

	public function exam_value($editid)
	{
		$editid=mysqli_real_escape_string($this->db->connection,$editid);
		$value=$this->db->selectby("Exam","*","id='$editid'")->fetch_assoc();
		if($value)
		{
			$table="<div id=\"model\"";
			$table.="<div class=\"modal-dialog\">";
			$table.="<div class=\"modal-content\">";
			$table.=" <div class=\"modal-header\">";
			$table.=" <h4>".$value['exam_name']."'s Exam Edit</h4>";
			$table.="</div>";
			$table.="<div class=\"modal-body\">";
			$table.="<div class=\"widget-content nopadding\">";
			$table.="<form class=\"form-horizontal\" method=\"post\" action=\"\" name=\"basic_validate\" id=\"basic_validate\" novalidate=\"novalidate\" enctype=\"multipart/form-data\">";
			$table.="<div class=\"control-group\">";
			$table.="<label class=\"control-label\">Exam Name</label>";
			$table.="<div class=\"controls\">";
			$table.="<input type=\"text\" name=\"exam_name\" value=\"$value[exam_name]\" id=\"required\">";
			$table.="</div>";
			$table.="</div>";
			$table.=" <div class=\"control-group\">";
			$table.="<label class=\"control-label\">Subject</label>";
            $table.="<div class=\"controls\">";
            $table.="<input type=\"text\" name=\"subject\" value=\"$value[subject]\" id=\"email\">";
            $table.="</div>";
            $table.="</div>";
            $table.=" <div class=\"control-group\">";
            $table.=" <label class=\"control-label\">Status</label>";
            $table.="<div class=\"controls\">";
            $table.="<select name=\"status\">";
            $table.="<option>Active</option>";
            $table.="<option>Inactive</option>";
            $table.="</select>";
            $table.="</div>";
            $table.="</div>";
            $table.="</div>";
            $table.="<div class=\"modal-footer\">";
            $table.="<input type=\"submit\" value=\"Submit\" style=\"float:left;\"name=\"edit\" class=\"btn btn-success\">";
            $table.="<input type=\"button\" value=\"Close\" id=\"close\" name=\"submit\" class=\"btn btn-default\">";
            $table.="</form>";
            $table.="</div>";
            $table.="</div>";
            $table.="</div>";
            $table.="</div>";
            $table.="</div>";
            $table.="</div>";
            return $table;
		}
	}
	public function exam_data_edit($data,$edit){
       $exam_name =$data['exam_name'];
		$subject   =$data['subject'];
		$status    =$data['status'];
		$edit=mysqli_real_escape_string($this->db->connection,$edit);
		$input     =[
		          'Exam Name'=>$exam_name,
		          'Subject'=>$subject,
		          'Status'=>$status
		          ];
		
		foreach ($input as  $value) {
			$this->fm->validation($value);
			mysqli_real_escape_string($this->db->connection,$value);
		}
        if(empty($exam_name)||empty($subject)||empty($status))
        {
        	echo $this->fm->required($input);
        }else
        {
        $exam_edit=$this->db->update("Exam","exam_name='$exam_name',subject='$subject',status='$status'","id='$edit'");
	        if($exam_edit)
	        {
	        	echo $this->fm->success("$exam_name Updated Succesfully");
	        }else
	        {
	        	echo $this->fm->error("Something Went Wrong");
	        }
        }
	}

	public function delid($delid)
	{
		$delid=mysqli_real_escape_string($this->db->connection,$delid);
		$delete=$this->db->delete("Exam","id='$delid'");
		if($delte)
		{
            echo $this->fm->success("Exam Deleted Succesfully");
		}else
		{
            echo $this->fm->error("Something Went Wrong");
		}
	}
	public function exam_status($stid)
	{
		$stid=mysqli_real_escape_string($this->db->connection,$stid);
		$st_data=$this->db->selectby("Exam","*","id='$stid'");
		$status=$st_data->fetch_assoc();
		if($status['status']=='Active')
		{
		  $ac=$this->db->update("Exam","status='Inactive'","id='$stid'");
		  if($ac)
		  {
             echo $this->fm->success("Status  Succesfully Updated Into Inactive");
		  }else
		  {
           echo $this->fm->error("Something Went Wrong");
		  }
		}else
		{
			$ac=$this->db->update("Exam","status='Active'","id='$stid'");
			if($ac)
			{
              echo $this->fm->success(" Status  Succesfully Updated Into Active");
			}else
			{
             echo $this->fm->error("Something Went Wrong");
			}
		}

	}
}