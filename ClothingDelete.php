<?php
include_once("./library.php"); // To connect to the database
session_start();
$_SESSION["user"] = $_POST["username"];
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $sqlAllUsers = "SELECT user_id FROM User";
  $result = mysqli_query($con,$sqlAllUsers);
// Form the SQL query (an INSERT query)
   $sql="DELETE FROM clothing WHERE clothingId='$_POST[clothingId]' AND brand='$_POST[brand]'";
if (!mysqli_query($con,$sql))
  {
    die('Error: ' . mysqli_error($con));
  } else {
    echo "Clothing ID" . $_POST['clothindId'] . " successfully removed from clothing table";

  }

mysqli_close($con);
function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}
?>