<?php
	class Mysql
	{
		protected $db_config = array();
		protected $fetch_style = "";
		protected $link_id = 0;
	/*	function __construct($db_config=null,$fetch_style=PDO::FETCH_ASSOC)
		{
				$this->db_config=$db_config;
				$this->fetch_style = $fetch_style;

				try{
					$dsn = $db_config['dbms'].":host=".$db_config['dbhost'].";dbname=".$db_config['dbname'];
					$user = $db_config['dbuser'];
					$pwd = $db_config['dbpwd'];
					$this->link_id = new PDO($dsn,$user,$pwd);
			//		$this->link_id->query("set names ".$db_config['dbcharset']);
				}catch(PDOException $e)
				{
					die($e->getMessage());
				}

		}*/
		function __construct($db_config=null,$fetch_style=PDO::FETCH_ASSOC)
		{

				$this->db_config=$db_config;
				$this->fetch_style = $fetch_style;
				
				try{
					$dsn = $db_config['dbms'].":host=".$db_config['dbhost'].";dbname=".$db_config['dbname'];
					$user = $db_config['dbuser'];
					$pwd = $db_config['dbpwd'];
					$this->link_id = new PDO($dsn,$user,$pwd);
					$this->link_id->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
					$this->link_id->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					//$this->link_id->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);
					$this->link_id->query("set names ".$db_config['dbcharset']);
				}catch(PDOException $e)
				{

					die($e->getMessage());
				}

		}
		 
		function query($string)
		{
			return $this->link_id->query($string);
		}
		function query_result($string)
		{
			$result = $this->link_id->query($string);
			if(!$result)
				return false;
			while($row = $result->fetch($this->fetch_style))
			{
				$arr[] = $row;
			}
			
			return $arr;
		}
		function fetch($dbh)
		{
			$result = $dbh->fetch($this->fetch_style);
			return $result;
		}
		function query_result_single($string)
		{
			 
			$result = $this->link_id->query($string);
		 	if(!$result)
		 		return false;
			 $row = $result->fetch();
			return $row;
			
			//return $result;
		}
		function exec($string)
		{
			$result = $this->link_id->exec($string);
			if($result)
				return false;
			else
				return true;
		}
		function prepare($string)
		{
			return $this->link_id->prepare($string);
		}
		function execute(&$dbh,$array)
		{
			return $dbh->execute($array);
		}
		function prepare_execute($string,$array="")
		{
			try
			{
				$dbh = $this->link_id->prepare($string);
		 
				if($array !="")
					$result=$dbh->execute($array);
				else
					$result=$dbh->execute();
				//$dbh->debugDumpParams();
				return $dbh;
			}catch (PDOException $e) {
		  	 $this->link_id->rollBack();
		   		 die ("Error!: " . $e->getMessage() . "<br/>");
		    }
			 
		}
		function prepare_execute_multiple($string,$array="")
		{
			try
			{
				$dbh = $this->link_id->prepare($string);
				foreach($array as $v)
				{
			//		print_r($v);
					$result = $dbh->execute($v);
			//		$dbh->debugDumpParams();
				}
				return $result;
			}catch (PDOException $e) {
				$this->link_id->rollBack();
		   		 die ("Error!: " . $e->getMessage() . "<br/>");
		    }
		}
		function prepare_execute_result_single($string,$array="")
		{
			try
			{
				$dbh = $this->link_id->prepare($string);
			 
				if(!$dbh)
					return false;
				if($array=="")
				{
					$dbh->execute();
				}
				else{
					$dbh->execute($array);
				}
			//	$dbh->debugDumpParams();
				if(!$dbh)
					return false;

				return $dbh->fetch($this->fetch_style);
			}catch (PDOException $e) {
				 //$this->link_id->rollBack();
		   		 die ("Error!: " . $e->getMessage() . "<br/>");
		    }
		}
		function prepare_execute_result($string,$array="")
		{
			try
			{
			
				$dbh = $this->link_id->prepare($string);
				if(!$dbh)
					return false;
				if($array=="")
				{
					$dbh->execute();
				}
				else{
					$dbh->execute($array);
				}
				if(!$dbh)
					return false;
				//$dbh->debugDumpParams();
				while($row = $dbh->fetch($this->fetch_style))
				{
					$result[] = $row;
				}
				
				return $result;
			}catch (PDOException $e) {
			//	$this->link_id->rollBack();
		   		 die ("Error!: " . $e->getMessage() . "<br/>");
		    }
		}

		function quote($string)
		{
			return $this->link_id->quote($string);
		}
		function errorInfo()
		{
			$result = $this->link_id->errorInfo();
			return $result[2];
		}
		function beginTransaction()
		{
			$this->link_id->beginTransaction();
		}
		function commit()
		{
			$this->link_id->commit();
		}
		function rollBack()
		{
			$this->link_id->rollBack();
		}
		function lastInsertId()
		{
			return $this->link_id->lastInsertId();
		}
		function close()
		{
			$this->link_id=null;
		}
	}
?>