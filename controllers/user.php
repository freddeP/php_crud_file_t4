<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
require_once("../classes/User.php");
require_once("../classes/File.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
 
  if( isset($_POST['delId']) )
  {
    //echo json_encode($_POST);
    echo '{"mes" : "I will delete you sooon"}';
  
  }
  else
  {
    $user = new User($_POST['email'], $_POST['password']);
    $file = new File("users.json");
    $file->write($user);

  }


}

else if($_SERVER['REQUEST_METHOD'] == "GET")
{
  $file = new File("users.json");
  $userArr = $file->read();
  echo json_encode($userArr , JSON_PRETTY_PRINT);
}
