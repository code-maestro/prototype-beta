<?php

  include('config.php');
  include('api.php');

  session_start();

  $complaint = $_SESSION['issue'];
  $date = $_SESSION['dd'];
  $time = substr($_SESSION['tt'],0,8);

  $arr['topic'] = $complaint;
	$arr['start_date']=date($date.$time);
	$arr['duration']=30;
	$arr['password']='MUST';
	$arr['type']='2';

  $result=createMeeting($arr);

  $res = array();

  if(isset($result->id)){
  // if(!empty($complaint)){

    $res[0] = '<p id="title"> '.$result->topic.'</a> </p>';
    $res[1] = '<p id="start-time"> '.$result->start_time.'</p>';
    $res[2] = '<p id="id"> '.$result->meeting_id.' </p>';
    $res[3] = '<p id="password">'.$result->password.'</p>';
    $res[4] = '<p id="link"><a href='.$result->join_url.'> '.$result->join_url.' </a> </p>';
    $res[5] = '<p id="duration">'.$result->duration.'</p>';

    // $res[0] = '<p id="title"> '. $complaint .' ';
    // $res[1] = '<p id="start-time"> '.$date.' ';
    // $res[2] = '<p id="id"> '.$time.' ';

  }else{
    $res[3] = 'code-maestro fvcks up sometimes';
  }

  echo implode(" ",$res);

?>