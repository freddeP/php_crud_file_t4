<?php
require_once("../classes/User.php");
require_once("../classes/File.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
 
  $user = new User($_POST['email'], $_POST['password']);
  $file = new File("users.json");
  $file->write($user);

}

else if($_SERVER['REQUEST_METHOD'] == "GET")
{


}