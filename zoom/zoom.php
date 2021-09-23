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

  if(!empty($complaint)){

    $res[0] = '<p id="title"> '. $complaint .' ';
    $res[1] = '<p id="start-time"> '.$date.' </p> ';
    $res[2] = '<p id="id"> '.$time.' </p> ';

  }

  echo implode(" ",$res);

?>