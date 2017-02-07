<?php
	class BaseController{
		protected $is_checked=true;
		 
		public function __construct()
		{ 
			 
			$this->init();
			$this->check();

			if(isset($_GET['act']))
			{
				$act=$_GET['act'];
			}
			else
			{
				$act = "defaultAction";
			}
			
			if(method_exists($this, $act))
			{
				$this->$act();
			}
		}
		public function init()
		{
			$this->is_checked = true;
		}
		public function check()
		{
			if($this->is_checked)
			{
				if(!Login::isLogined())
				{
					 $this->is_checked=false;
					 
					header("Location:index.php?controller=LoginController&act=userLogin");
					 
				}
			}
			 
		}
		public function defaultAction()
		{
			
		}
	}
?>