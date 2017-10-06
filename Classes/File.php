<?php
class File{

	protected $file;
	public function file_load()
	{ 

		$path=$this->file=$_REQUEST['page'];
	    if(isset($path))
	    {
	    	switch($path)
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