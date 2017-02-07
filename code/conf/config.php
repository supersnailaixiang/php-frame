<?php

	define("IS_DEBUG",true);
	$GLOBALS['_CFG']['smarty_template_dir'] = CRM_DOCUMENT_DIR."template";
	$GLOBALS['_CFG']['smarty_cache_dir'] = CRM_DOCUMENT_DIR."cache";
	$GLOBALS['_CFG']['smarty_compile'] = CRM_DOCUMENT_DIR."compile_c";


	$GLOBALS['_CFG']['timezone']="Asia/Shanghai";
	$GLOBALS['_CFG']['customer_info_key']="123456";
	$GLOBALS['_CFG']['upload_file']="./uploads";

	$GLOBALS['_CFG']['autoload_path'] = array(CRM_DOCUMENT_DIR."controller".DIRECTORY_SEPARATOR,
		CRM_DOCUMENT_DIR."model".DIRECTORY_SEPARATOR,
		CRM_DOCUMENT_DIR."lib".DIRECTORY_SEPARATOR."smarty-3.1.29".DIRECTORY_SEPARATOR."libs".DIRECTORY_SEPARATOR,
		CRM_DOCUMENT_DIR."common".DIRECTORY_SEPARATOR);
	if(IS_DEBUG)
	{
		$GLOBALS['_CFG']['db_config'] = array(
			"dbms"=>"mysql",
			"dbhost"=>"localhost",
			"dbuser"=>"root",
			"dbport"=>"3306",
			"dbpwd"=>"aszx0316",
			"dbname"=>"wdt_crm_v2",
			'dbcharset'=>"utf8"
		);
	}
	else
	{
		$GLOBALS['_CFG']['db_config'] = array(
			"dbms"=>"mysql",
			"dbhost"=>"localhost",
			"dbuser"=>"root",
			"dbport"=>"3306",
			"dbpwd"=>"aszx0316",
			"dbname"=>"exam",
			'dbcharset'=>"utf8"
		);
	}


?>
