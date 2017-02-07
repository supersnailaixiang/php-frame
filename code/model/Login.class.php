<?php
    class Login {
        static function userLogin($data)
		{
		 
			$db =db();
		 
			$data = dataTrim($data);
	 	 
            $sql ="select * from cfg_login_account_list where user_name = :user_name and pwd =md5(:pwd)";
 		 
			$result = $db->prepare_execute_result_single($sql,$data);
		 
	
		 
			if(!empty($result))
			{
				$_SESSION['user_id']=$result['user_id'];
				$_SESSION['dept_id']=$result['dept_id'];
				$_SESSION['is_admin']=$result['is_admin'];
				$user_id = $result['user_id'];

		 	 
				return true;;
			}

			return false;
		}
		static function isLogined()
		{
			
			return isset($_SESSION['user_id']) and $_SESSION['user_id'] !="";
			//return 1;

		}
    }
?>