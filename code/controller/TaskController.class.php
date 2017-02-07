<?php
	class TaskController extends BaseController {
		public function TaskManageList(){
			$result = Task::TaskManageList();
			view()->assign("result",$result);
			view("task.html");

		}
	}
?>