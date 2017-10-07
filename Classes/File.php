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

	    		default:
	    		include '../Admin_panel/Sub_page/error.php';
	    	}
	    }
	    else {
	    	include '../Admin_panel/Sub_page/home.php';
	    }
	}
}