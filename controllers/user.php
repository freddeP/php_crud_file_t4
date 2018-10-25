<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
require_once("../classes/User.php");
require_once("../classes/File.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
 
  if( isset($_POST['delId']) )
  {
    // Denna kod nås från ajax-request
    $file = new File("users.json");
    if( $file->delete_obj_in_file($_POST['delId']))
    {
        echo '{"mes" : "deleted"}';
    } 
  }
  else if(isset($_POST['update'])){

    $id = $_POST['id'];  // Skicka med id för sig
    $user = json_encode($_POST); // skicka med hela posten
    $file = new File('users.json');

    $file -> update_obj_in_file($id,$user);
    header("Location: ../views/list_users.php");
  }
  else
  {
    // Anropas från ett vanligt formulär
    $user = new User($_POST['email'], $_POST['password']);
    $file = new File("users.json");
    $file->write($user);
    header("Location: ../views/list_users.php");
  }


}

else if($_SERVER['REQUEST_METHOD'] == "GET")
{
  $file = new File("users.json");
  $userArr = $file->read();
  echo json_encode($userArr , JSON_PRETTY_PRINT);
}
