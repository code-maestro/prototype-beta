<?php

	// include('config.php');
	// include('api.php');

	// 	$arr['topic']='Test by code-maestro';
	// 	$arr['start_date']=date('2021-09-12 00:02:30');
	// 	$arr['duration']=30;
	// 	$arr['password']='MUST';
	// 	$arr['type']='2';
		
	// 	$result=createMeeting($arr);

		$result= " SIR ELTON JONES ";

		$res = array();

		// if(isset($result->id)){
		if($result){
			// $res .= '<p id="meeting-time"><a href='.$result->join_url.'> '.$result->join_url.'</a> </p>';
			$res[0] = "<a href='XC90'> dfsdf </a> ";
			$res[1] = " <p> BMW </p>";
			$res[2] = "<input name='meeting-password' value='2323' placeholder='Meeting Password'>";
			// echo "Topic: ".$result->topic."<br/>";
			// echo "Password: ".$result->password."<br/>";
			// echo "Start Time: ".$result->start_time."<br/>";
			// echo "Duration: ".$result->duration."<br/>";
		}else{
			$res .= ' code-maestro fvcks up sometimes ';
		}

		echo json_encode($res);

		// echo '<p> code-maestro fvcks up sometimes jhsfjghsfjghskfghlsfghslghsdflghsdflkgjhsdklfghskldfghsklfjghdfkl </p>';
		//echo '<input name="meeting-title" value="" placeholder="Meeting Title ">';
	// <input name="meeting-id" value="" placeholder="Meeting ID ">
	// <input name="meeting-password" value="" placeholder="Meeting Password ">
	// <input name="meeting-link" value="" placeholder="Meeting Link ">
	// <input name="meeting-time" value="" placeholder="Meeting Time ">
	
?>
