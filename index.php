<?php

require_once("./classes/File.php");
require_once("./classes/User.php");


$file = new File("users.json");
$file->delete_obj_in_file(1540196156);