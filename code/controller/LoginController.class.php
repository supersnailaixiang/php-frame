<?php
    class LoginController extends BaseController{

	    public function userLogin()
		{
			//$login_no = $_REQUEST['login_no'];
			//$pwd = $_REQUEST['pwd'];

			$user_name =isset($_REQUEST['user_name']) ? $_REQUEST['user_name'] : "";
			$pwd= isset($_REQUEST['pwd']) ?	$_REQUEST['pwd'] : "";
		  	$data['user_name']=$user_name;
		  	$data['pwd']=$pwd;
		 	 
			if(!isset($user_name) || empty($user_name) || $user_name=="")
			{
				view("login.html");
			}
			else
			{   
				 
				$result = Login::userLogin($data);
				// $result = true;
			 
				if($result===true)
				{
					header("Location:index.php?controller=TaskController&act=TaskManageList");
					//view("test.html");
				}
				else
				{
					view("login.html");
				}
			}
		}

		public function init()
		{
			$this->is_checked=false;
		}
		public function defaultAction()
		{
			 
			if(!Login::isLogined())
			{
			 
				//header("Location:index.php?controller=UserController&act=login");
				view("login.html");
				 
			}
			else
			{
				header("Location:index.php?controller=TaskController&act=TaskManageList");
				//view("welcome.html");
			}
		}
    }
?>