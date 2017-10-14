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
         foreach ($data as $key=>$value) {
         	if(empty($value))
         	{
              echo $this->error("$key Is Required");
         	}
         }
	}

	public function success($msg)
	{
		$message="<div class='text-center alert alert-success alert-dismissable'>";
		$message.="<a href='' class='close' data-dismiss='alert' aria-label='close'>×</a>";
		$message.=$msg;
		$message.="</div>";
		return $message;
  
	}
	public function error($msg)
	{
		$message="<div class='text-center alert alert-danger alert-dismissable'>";
		$message.="<a href='' class='close' data-dismiss='alert' aria-label='close'>×</a>";
		$message.="<i class='fa fa-hand-o-right' aria-hidden='true'></i>";
		$message.=$msg;
		$message.="</div>";
		return $message;
  
	}

}