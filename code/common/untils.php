<?php
	function init()
	{
		session_start();
		// 单入口文件可以进行安全教研，	这里不做了
	//	$_SESSION['user_id']="";
		// 注册__autoload函数
		spl_autoload_register('autoload');
		//设置默认时间
		if(!isset($GLOBALS['_CFG']['timezone']))
		{
			$GLOBALS['_CFG']['timezone']="Asia/Shanghai";
		}
		date_default_timezone_set($GLOBALS['_CFG']['timezone']);
	}
	function autoload($class)
	{
		$path="";
		foreach($GLOBALS['_CFG']['autoload_path'] as $v)
		{
			$path = $v.$class.".class.php";
			 
			if(file_exists($path))
			{
			 
				require_once($path);
				return;
			}
		}

	}
	function view($tpl=null)
	{
		static $_smarty;
		if($_smarty == null || empty($_smarty) || !isset($_smarty))
		{
			$_smarty = new Smarty();
			$_smarty->setCacheDir($GLOBALS['_CFG']['smarty_cache_dir']);
			$_smarty->setCompileDir($GLOBALS['_CFG']['smarty_compile']);
			$_smarty->setTemplateDir($GLOBALS['_CFG']['smarty_template_dir']);
		}
		if($tpl)
			$_smarty->display($tpl);
		return $_smarty;
	}
	function db($db_config= null,$fetch_style=PDO::FETCH_ASSOC)
	{
		$db_config=$GLOBALS['_CFG']['db_config'];
		return new Mysql($db_config,$fetch_style);
	}
	function dataTrim($post)
	{
		$data = array();
		foreach($post as $k =>$v)
		{
			if(trim($k)=="controller" || trim($k)=="act")
				continue;
			else
				$data[$k]=trim($v);
		}
		return $data;
	}

?>
