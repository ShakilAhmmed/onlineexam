<?php
class File{

	protected $file;
	public function file_load()
	{ 

		$this->file=$_REQUEST['page'];
	    if(isset($this->file))
	    {
	    	switch($this->file)
	    	{
	    		case 'home':
	    		include '../Admin_panel/Sub_page/home.php';
	    		break;

	    		case 'setup':
	    		include '../Admin_panel/Sub_page/setup.php';
	    		break;

	    		case 'exam':
	    		include '../Admin_panel/Sub_page/exam.php';
	    		break;

	    		case 'question':
	    		include '../Admin_panel/Sub_page/question.php';
	    		break;

	    		case 'question_edit':
	    		include '../Admin_panel/Sub_page/question_edit.php';
	    		break;
	    		
	    		case 'user':
	    		include '../Admin_panel/Sub_page/user.php';
	    		break;

	    		default:
	    		include '../Admin_panel/Sub_page/error.php';
	    	}
	    }
	    else {
	    	include '../Admin_panel/Sub_page/home.php';
	    }
	}
}