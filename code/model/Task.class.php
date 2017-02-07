<?php
	class Task {
		static function TaskManageList(){
			$user_id = $_SESSION['user_id'];
 
			$sql ="select * from task_list where task_status = 0 and receivor = :user_id";
			$db = db();
			$result = $db->prepare_execute_result($sql,array("user_id"=>$user_id));
			return $result;
		}
		static function taskRead($task_id){
			$sql = "update task_list set task_status = 5 where task_id = :task_id ";
			$db = db();
			$db->prepare_execute($sql,array("task_id"=>$task_id));
			return true;

		}
	} 
?>