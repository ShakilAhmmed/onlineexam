<?php
class Question{

	private $db;
	private $fm;
	public function __construct()
	{
		$this->db=new Database;
		$this->fm=new Format;
	}

	public function exam_list()
	{
		$exam=$this->db->select("Exam","*");
		if($exam)
		{
			return $exam;
		}
	}

	public function sub_data($exam_name)
	{
		$data=$this->db->selectby("Exam","*","exam_name='$exam_name'");
		if($data)
		{
			return $data->fetch_assoc();
		}

	}
	public function new_question($data)
	{
		$exam_name=$data['exam_name'];
		$subject  =$data['subject'];
		$question =$data['question'];
		$opt1     =$data['opt1'];
		$opt2     =$data['opt2'];
		$opt3     =$data['opt3'];
		$opt4     =$data['opt4'];
		$corr     =$data['corr'];
		$status   =$data['status'];
		$input    =[
                    'Exam Name'=>$exam_name,
                    'Subject'  =>$subject,
                    'Question' =>$question,
                    'Option 1' =>$opt1,
                    'Option 2' =>$opt2,
                    'Option 3' =>$opt3,
                    'Option 4' =>$opt4,
                    'Correct Answer'=>$corr,
                    'Status'  =>$status
                    ];
       foreach ($input as  $value) {
			$this->fm->validation($value);
			echo mysqli_real_escape_string($this->db->connection,$value);
		}
		if(empty($exam_name)||empty($subject)||empty($question)||empty($opt1)||empty($opt2)||empty($opt3)||empty($opt4)||empty($corr)||empty($status))
		{
			echo $this->fm->required($input);
		}else
		{
			$data=$this->db->insert("Question","exam_name='$exam_name',subject='$subject',question='$question',opt1='$opt1',opt2='$opt2',opt3='$opt3',opt4='$opt4',corr='$corr',status='$status'");
			if($data)
			{
				echo $this->fm->success("Successfully $question Added For $exam_name In $subject");
			}
			else
			{
				echo $this->fm->error("Something Went Wrong");
			}
		}

	}

	public function question_data()
	{
		$data=$this->db->select("Question","*");
		if($data)
		{
			return $data;
		}
	}

	public function question_delete($delid)
	{
		$delid=mysqli_real_escape_string($this->db->connection,$delid);
		$delete=$this->db->delete("Question","id='$delid'");
		if($delete)
		{
			echo $this->fm->success("Question Deleted Successfully");
		}else
		{
			echo $this->fm->error("Something Went Wrong");
		}
	}
	public function question_status($stid)
	{
		$stid=mysqli_real_escape_string($this->db->connection,$stid);
		$st_data=$this->db->selectby("Question","*","id='$stid'");
		$status=$st_data->fetch_assoc();
		if($status['status']=='Active')
		{
		  $ac=$this->db->update("Question","status='Inactive'","id='$stid'");
		  if($ac)
		  {
             echo $this->fm->success("Status  Succesfully Updated Into Inactive");
		  }else
		  {
           echo $this->fm->error("Something Went Wrong");
		  }
		}else
		{
			$ac=$this->db->update("Question","status='Active'","id='$stid'");
			if($ac)
			{
              echo $this->fm->success(" Status  Succesfully Updated Into Active");
			}else
			{
             echo $this->fm->error("Something Went Wrong");
			}
		}

	}

	public function question_edit($editid)
	{
		$editid=mysqli_real_escape_string($this->db->connection,$editid);
		$value=$this->db->selectby("Question","*","id='$editid'");
		if($value)
		{
			return $value->fetch_assoc();
		}
	}
	public function question_update($data,$editid)
	{
		$editid=mysqli_real_escape_string($this->db->connection,$editid);
		$exam_name=$data['exam_name'];
		$subject  =$data['subject'];
		$question =$data['question'];
		$opt1     =$data['opt1'];
		$opt2     =$data['opt2'];
		$opt3     =$data['opt3'];
		$opt4     =$data['opt4'];
		$corr     =$data['corr'];
		$status   =$data['status'];
		$input    =[
                    'Exam Name'=>$exam_name,
                    'Subject'  =>$subject,
                    'Question' =>$question,
                    'Option 1' =>$opt1,
                    'Option 2' =>$opt2,
                    'Option 3' =>$opt3,
                    'Option 4' =>$opt4,
                    'Correct Answer'=>$corr,
                    'Status'  =>$status
                    ];
       foreach ($input as  $value) {
			$this->fm->validation($value);
			 mysqli_real_escape_string($this->db->connection,$value);
		}
		if(empty($exam_name)||empty($subject)||empty($question)||empty($opt1)||empty($opt2)||empty($opt3)||empty($opt4)||empty($corr)||empty($status))
		{
			echo $this->fm->required($input);
		}else
		{
			$data=$this->db->update("Question","exam_name='$exam_name',subject='$subject',question='$question',opt1='$opt1',opt2='$opt2',opt3='$opt3',opt4='$opt4',corr='$corr',status='$status'","id='$editid'");
			if($data)
			{
				echo $this->fm->success("Successfully $question 's Data Updated");
			}
			else
			{
				echo $this->fm->error("Something Went Wrong");
			}
		}

	}
  
    public function right_ans($data)
    {   
    	$number=$data['q'];
    	$number=$this->fm->validation($data['q']);
    	$number=mysqli_real_escape_string($this->db->connection,$data['q']);
    	$choose=$this->fm->validation($data['optradio']);
    	$choose=mysqli_real_escape_string($this->db->connection,$data['optradio']);
    	$next=$number+1;
    	 $total=$this->question_total();
    	 $rans=$this->rightAns($number);
         if(!isset($_SESSION['score']))
         {
         	$_SESSION['score']='0';
         }
         
         if($rans==$choose)
         {
             $_SESSION['score']++;
         }
         if($number==$total)
         {
         	
         	header('Location:final.php');
         	exit();
         }
         else
         {
         	header('Location:exam.php?q='.$next);
         }


    }









	public function question_data_user()
	{
		$data=$this->db->selectby("Question","*","status='Active'");
		if($data)
		{
			return $data;
		}
	}

	public function question_user($id)
	{
      $id=mysqli_real_escape_string($this->db->connection,$id);
      $data=$this->db->selectby("Question","*","id='$id' AND status='Active'");
      if($data)
      {
      	return $data->fetch_assoc();
      }
	}

    public function question_total()
	{
		$data=$this->db->selectby("Question","*","status='Active'");
	    $row=$data->num_rows;
	    return $row;
	}
	public function rightAns($number)
	{
		$ans=$this->db->selectby("Question","*","id='$number'");
		if($ans)
		{
			$value=$ans->fetch_assoc();
			return $value['corr'];
		}
	}
}