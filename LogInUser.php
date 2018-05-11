<?php
session_start();
$_SESSION["user"] = $_POST["username"];
require_once('./library.php');
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno()) {
  echo("Can't connect to MySQL Server. Error code: " .
       mysqli_connect_error());
  return null;
}
// Form the SQL query (a SELECT query)
$hashPass = md5($_POST[password]);
$sql="SELECT username, password FROM User WHERE username='$_POST[username]' AND password='$hashPass'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
if (empty($row)) {
	echo "incorrect login";
}
else {
	redirect('http://plato.cs.virginia.edu/~cas5tu/database_project/homepage.php');
}
mysqli_close($con);
function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}
?>