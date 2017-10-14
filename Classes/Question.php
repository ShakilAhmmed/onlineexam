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
			mysqli_real_escape_string($this->db->connection,$value);
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
}