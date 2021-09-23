<?php

	include('config.php');
	include('api.php');

		// $arr['topic']='Test by code-maestro';
		// $arr['start_date']=date('2021-09-12 00:02:30');
		// $arr['duration']=30;
		// $arr['password']='MUST';
		// $arr['type']='2';

		// $ip = $_POST['time'];
		// $iparr = str_split($ip, 8); 
		// //print "$iparr[0]";

		// $arr['topic'] = $_POST['title'];
		// $arr['start_date']=date($_POST['date'].$iparr[0]);
		// $arr['duration']=30;
		// $arr['password']='MUST';
		// $arr['type']='2';

		// $complaint = $_POST['title'];
    // $date = $_POST['date'];
    // $time = $_POST['time'];
		
		// echo $complaint."\n".$date."\n".$time;
	// 	$result=createMeeting($arr);

		// print_r($arr);

		// $result= " SIR ELTON JONES ";

		// $res = array();

		// // if(isset($result->id)){
		// if($result){
		if($complaint){
			
			// $res[0] = '<p id="title"> title '.$result->topic.'</a> </p>';
			// $res[1] = '<p id="start-time"> Start Time '.$result->start_time.'</p>';
			// $res[2] = '<p id="id"> '.$result->meeting_id.' </p>';
			// $res[3] = '<p id="password">'.$result->password.'</p>';
			// $res[4] = '<p id="link"><a href='.$result->join_url.'> was '.$result->join_url.' </a> </p>';
			// $res[5] = '<p id="duration">'.$result->duration.'</p>';
		
			$res[0] = $complaint;
			$res[1] = '<p id="start-time"> '.$_POST['date'].'Start Time result->start_time </p> ';
			$res[2] = '<p id="id"> '.$_POST['time'].' result->meeting_id </p> ';
			// $res[3] = '<p id="password">result->password </p> ';
			// $res[3] = '<p id="link"> result->join_url  </p> ';
			// $res[4] = '<p id="duration"> result->duration </p> ';

			// echo "Topic: ".$result->topic."<br/>";
			// echo "Password: ".$result->password."<br/>";
			// echo "Start Time: ".$result->start_time."<br/>";
			// echo "Duration: ".$result->duration."<br/>";
		}else{
			$res[3] = 'code-maestro fvcks up sometimes';
		}

		echo implode(", ",$res);
	
?>
