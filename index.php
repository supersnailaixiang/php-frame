<?php
	// 配置文件应该放哪
	//require_once("/crm/conf/confg.php");
	// 在入口文件中定义目录
 
	//define("CRM_DOCUMENT_DIR",DIRECTORY_SEPARATOR."/exam".DIRECTORY_SEPARATOR);
    define("CRM_DOCUMENT_DIR","/Users/chenaixiang1/web/exam/code/");
	require_once CRM_DOCUMENT_DIR."conf/config.php";
	require_once CRM_DOCUMENT_DIR."common/untils.php";
	init();
	$controller = isset($_REQUEST['controller'])? $_GET['controller']:"LoginController";

	if(class_exists($controller))
	{
		 
		$parent_class = get_parent_class($controller);
		 
		if($parent_class =="BaseController")
		{
			try{

				 
				new $controller();

			}
			catch(Exception $e)
			{
				 
					header('Content-Type: text/html charset=utf-8');
					$msg = $e->getMessage();
					die($msg);
				
			}
		}
		else
		{
			die("请联系管理员");
		}
	}
	else
	{
		
		die("请联系管理员");
	}
	//view("index.html");
//	view("welcome.html");
//view("container.html");
//view("login.html");	 
?>
