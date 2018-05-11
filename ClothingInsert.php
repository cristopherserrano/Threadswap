<?php
include_once("./library.php"); // To connect to the database
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
	// Form the SQL query (an INSERT query)
	 $sql="INSERT INTO clothing (clothingID, imageLink, name, price, stock, description, brand, color, release_date_year, release_date_season)
	 VALUES
	 ('$_POST[clothingID]','$_POST[imageLink]','$_POST[name]','$_POST[price]'
	 ,'$_POST[stock]','$_POST[description]','$_POST[brand]','$_POST[color]','$_POST[release_date_year]',
	 '$_POST[release_date_season]')";

	if (!mysqli_query($con,$sql))
	  {
	    die('Error: ' . mysqli_error($con));
	  }
	
	if ($_POST[category] == "Blankets") {
		$sql2="INSERT INTO Blankets (item_id, Size)
			VALUES
			('$_POST[clothingID]','$_POST[size]')";
	if (!mysqli_query($con,$sql2))
	  {
	    die('Error: ' . mysqli_error($con));
	  }
	}
	if ($_POST[category]=="Shirts") {
		$sql2="INSERT INTO Shirts (item_id, Size)
			VALUES
			('$_POST[clothingID]','$_POST[size]')";
	if (!mysqli_query($con,$sql2))
	  {
	    die('Error: ' . mysqli_error($con));
	  }
	} else if ($_POST[category]=="Pants") {
		$sql="INSERT INTO Pants (item_id, Size)
			VALUES
			('$_POST[clothingID]','$_POST[size]')";
	if (!mysqli_query($con,$sql))
	  {
	    die('Error: ' . mysqli_error($con));
	  }
	} else if ($_POST[category]=="Dresses") {
		$sql="INSERT INTO Dresses (item_id, Size)
			VALUES
			('$_POST[clothingID]','$_POST[size]')";
	if (!mysqli_query($con,$sql))
	  {
	    die('Error: ' . mysqli_error($con));
	  }
	} else if ($_POST[category]=="Shoes") {
		$sql="INSERT INTO Shoes (item_id, Size)
			VALUES
			('$_POST[clothingID]','$_POST[size]')";
	if (!mysqli_query($con,$sql))
	  {
	    die('Error: ' . mysqli_error($con));
	  }
	} else if ($_POST[category]=="Necklace") {
		$sql="INSERT INTO Accessories (item_id, type)
			VALUES
			('$_POST[clothingID]','$_POST[size]')";
	if (!mysqli_query($con,$sql))
	  {
	    die('Error: ' . mysqli_error($con));
	  }
	} else if ($_POST[category]=="Scarf") {
		$sql="INSERT INTO Accessories (item_id, type)
			VALUES
			('$_POST[clothingID]','$_POST[size]')";
	if (!mysqli_query($con,$sql))
	  {
	    die('Error: ' . mysqli_error($con));
	  }
	} else if ($_POST[category]=="Earrings") {
		$sql="INSERT INTO Accessories (item_id, type)
			VALUES
			('$_POST[clothingID]','$_POST[size]')";
	if (!mysqli_query($con,$sql))
	  {
	    die('Error: ' . mysqli_error($con));
	  }
	} else if ($_POST[category]=="Hat") {
		$sql="INSERT INTO Accessories (item_id, type)
			VALUES
			('$_POST[clothingID]','$_POST[size]')";
	if (!mysqli_query($con,$sql))
	  {
	    die('Error: ' . mysqli_error($con));
	  }
	} else if ($_POST[category]=="Ring") {
		$sql="INSERT INTO Accessories (item_id, type)
			VALUES
			('$_POST[clothingID]','$_POST[size]')";
	if (!mysqli_query($con,$sql))
	  {
	    die('Error: ' . mysqli_error($con));
	  }
	} else if ($_POST[category]=="Watch") {
		$sql="INSERT INTO Accessories (item_id, type)
			VALUES
			('$_POST[clothingID]','$_POST[size]')";
	if (!mysqli_query($con,$sql))
	  {
	    die('Error: ' . mysqli_error($con));
	  }
	}

session_start();

$sql3="INSERT INTO Posts (postId, username, clothingID)
	VALUES
	(NULL, '$_SESSION[user]', '$_POST[clothingID]')";

	if (!mysqli_query($con,$sql3))
	  {
	    die('Error: ' . mysqli_error($con));
	  }

echo "1 record added to $_POST[category]"; // Output to user
echo "<a href='homepage.php'>RETURN TO THREADSWAP</a>";
mysqli_close($con);
?> 


