<?php

include 'ics.php';
$password = "TestTestTest";
$baseurl = "http://" . $_SERVER['HTTP_HOST'];


if($_POST['password']==$password){
  if(!file_exists("../ics/")){
    mkdir("../ics", 0755);
  }

  $ics = new ICS(array(
    'location' => $_POST['location'],
    'description' => $_POST['description'],
    'dtstart' => $_POST['date_start'],
    'dtend' => $_POST['date_end'],
    'summary' => $_POST['summary'],
    'url' => $_POST['url']
  ));

  $filename = preg_replace('/\s+/', '_',trim(strtolower($_POST['summary'] .'_'. $_POST['date_start']))) . '.ics';

  file_put_contents("../ics/$filename", $ics->to_string());

  echo "$baseurl/ics/$filename";
}

?>