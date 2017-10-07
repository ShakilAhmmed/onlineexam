<?php
class Format{

	public function validation($data)
	{
		$data=trim($data);
		$data=htmlspecialchars($data);
		$data=stripcslashes($data);
		return $data;
	}

	public function required(array $data)
	{
         foreach ($$data as $key=>$value) {
         	if(empty($value))
         	{
              return $this->error("$key Is Required");
         	}
         }
	}

	public function success($msg)
	{
		$message="<div class='alert alert-success alert-dismissable'>";
		$message.="<a href='' class='close' data-dismiss='alert' aria-label='close'>×</a>";
		$message.=$msg;
		$message.="</div>";
		return $message;
  
	}
	public function error($msg)
	{
		$message="<div class='alert alert-danger alert-dismissable'>";
		$message.="<a href='' class='close' data-dismiss='alert' aria-label='close'>×</a>";
		$message.=$msg;
		$message.="</div>";
		return $message;
  
	}

}