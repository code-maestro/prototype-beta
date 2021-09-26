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

    $_SESSION['meeting_link'] = $result->join_url;

    $res[0] = '<p id="title"> <strong>TITLE: </strong> '.$result->topic.'</a> </p>';
    $res[1] = '<p id="start-time"><strong>START TIME: </strong> '.$result->start_time.'</p>';
    $res[2] = '<p id="password"> <strong>PASSWORD: </strong>'.$result->password.'</p>';
    $res[3] = '<p id="link"> <strong>LINK: </strong><a href='.$result->join_url.'> '.$result->join_url.' </a> </p>';
    $res[4] = '<p id="duration"> <strong>DURATION: </strong>'.$result->duration.'</p>';

  }else{
    $res[5] = ' <p> code-maestro fvcks up sometimes </p>';
  }

  echo implode(" ",$res);

?>