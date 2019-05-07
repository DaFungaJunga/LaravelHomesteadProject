<?php
require PATH_LIB."lib-shows.php";
$showLib = new Shows();

switch ($_POST['req']){\
  /* [INVALID REQUEST] */
 default:
   die("ERR");
   break;

   /* [SHOW ALL quotes] */
  case "list":
  $quotes = $showLib->getAll(); ?>
  <h1>MANAGE USERS</h1>
  <input type="button" value="Add User" onclick="show.addEdit()"/>

}
 ?>
