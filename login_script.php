<?php
include_once('./library.php');
session_start();
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
if ( ! empty( $_POST ) ) {
    if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {
        // Getting submitted user data from database
        //$con = new mysqli($db_host, $db_user, $db_pass, $db_name);
        $stmt = $con->prepare("SELECT * FROM User WHERE username = ?");
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $stmt->bind_result($user_id, $username, $password, $location, $rating);
        $stmt->store_result();
        $stmt->fetch();
        // Verify user password and set $_SESSION
        if ( md5($_POST['password']) == $password )  {
            $_SESSION['user'] = $username;
            //echo $_SESSION['username'];
            redirect('homepage.php');
        }
        else {
        	$message = "error: incorrect username or password";
            echo "<script type='text/javascript'>alert('$message');</script>";
            redirect('loginPage.php');
        }
    }
    else {
    	redirect('loginPage.php');
    }
}
else {
    redirect('loginPage.php');
}
//redirect('homepage.php');
mysqli_close($con);

function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}

?>
 
  