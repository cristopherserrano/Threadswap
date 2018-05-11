<!DOCTYPE html>
<html>
<title>Threadswap</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
</style>
<style>
        ul.clothing li {
          background-color: rgba(240,240,240,1);
          border-radius: 5px 5px 5px 5px;
          margin: 20px 20px 20px 20px;
          padding: 10px 10px 10px 10px;
          width: 250px;
          display: inline-block;
          vertical-align: top;
        }
        ul.clothing li:hover {
          background-color: rgba(146, 195, 209, 0.5);
          transition: 0.3s;
          border-radius: 5px 5px 5px 5px;
          margin: 20px 20px 20px 20px;
          padding: 10px 10px 10px 10px;
          width:250px;
          display: inline-block;
        }
        ul.clothing li.img {
          float:center;
        }
</style>

<body class="w3-content" style="max-width:1200px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide" onclick="function1()"><b>THREADSWAP</b></h3>
  </div>
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
    <a href="ShirtsSelect.php" class="w3-bar-item w3-button">Shirts</a>
    <a href="DressesSelect.php" class="w3-bar-item w3-button">Dresses</a>
    <a href="PantsSelect.php" class="w3-bar-item w3-button">Pants</a>
    <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-bar-item w3-button" id="myBtn">
      Accessories <i class="fa fa-caret-down"></i>
    </a>
    <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
      <a href="AccessoriesSelect.php" class="w3-bar-item w3-button w3-light-grey">All Accessories</a>
      <a href="HatsSelect.php" class="w3-bar-item w3-button w3-light-grey">Hats</a>
      <a href="RingsSelect.php" class="w3-bar-item w3-button w3-light-grey">Rings</a>
      <a href="EarringsSelect.php" class="w3-bar-item w3-button w3-light-grey">Earrings</a>
      <a href="NecklacesSelect.php" class="w3-bar-item w3-button w3-light-grey">Necklaces</a>
      <a href="ScarvesSelect.php" class="w3-bar-item w3-button w3-light-grey">Scarves</a>
    </div>
    <a href="ShoesSelect.php" class="w3-bar-item w3-button">Shoes</a>
    <a href="BlanketsSelect.php" class="w3-bar-item w3-button">Blankets</a>
    <a href="InsertDeleteClothing.php" class="w3-bar-item w3-button">Add Item</a>
    <a href="View.html" class="w3-bar-item w3-button">View Your Add Items</a>
    <a href="download.php" class="w3-bar-item w3-button">Download CSV</a>

</nav>

<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <div class="w3-bar-item w3-padding-24 w3-wide">threadswap</div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
  <!-- Top header -->
  <header class="w3-container w3-xlarge">
    <p class="w3-left">Products</p>
    
    <p class="w3-right" style="color:grey">
    <?php
      session_start();
      if (isset($_SESSION["user"])) {
      echo "Hi, " . $_SESSION["user"];
      echo '<a style="text-decoration: none;" href="logout.php" name="LogOutbtn"> Log Out </a>';
    }
    else {
    header( 'Location: loginPage.php' );
  }
  ?>
</p>
<p onclick="function2()" class="w3-right" style="padding: 0px 15px">Advanced Search</p>
</header>


    
    

  <div class="w3-display-container w3-container">
    <img src="images/hompage.jpg" alt="boutique" style="width:100%">
    <div class="w3-display-topleft w3-text-white" style="padding:40px 50px">
      <h1 class="w3-jumbo w3-hide-small">New Way To Shop</h1>
      <h1 class="w3-hide-small">COLLECTION 2016</h1>
    </div>
  </div>

  



<?php
$clothing = '<ul class="clothing">';
require_once('./library.php');
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno()) {
  echo("Can't connect to MySQL Server. Error code: " .
       mysqli_connect_error());
  return null;
}
// Form the SQL query (a SELECT query)
$sql="SELECT * FROM clothing  ORDER BY clothing.clothingID";
$result = mysqli_query($con,$sql);
// Print the data from the table row by row
$col = 0;
while($row = mysqli_fetch_array($result)) {
  $clothing .= '<li>';
  $clothing .= '<img src="'. $row['imageLink'] .'" style="width:230px;height:230px;"/>';
  $clothing .= '<h4>' . $row['name'] . '</h4>';
  $clothing .= '<p>' . $row['type'];
  $clothing .= " " . $row['description'];
  $clothing .= " " . $row['brand'];
  $clothing .= " " . $row['color'] . '</p>';
  $clothing .= '<p>' . "$" . $row['price'];
  $clothing .= " " . "stock:" . $row['stock'];
  $clothing .= '<p>' . $row['release_date_year'];
  $clothing .= " " . $row['release_date_season'] . '</p>';
  $clothing .= '<a href="buyNow.php" style="color:blue">BUY</a>';
  $clothing .= '</li>';
}
mysqli_close($con);
$clothing .= '</ul>';
echo $clothing;
?> 


</div>

<script>
// Accordion 
function myAccFunc() {
    var x = document.getElementById("demoAcc");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}

// Click on the "Jeans" link on page load to open the accordion for demo purposes
document.getElementById("myBtn").click();

  function function1(){
    window.location.href = "http://plato.cs.virginia.edu/~cas5tu/database_project/homepage.php";
  }
  function function2(){
    window.location.href = "http://plato.cs.virginia.edu/~cas5tu/database_project/test_search.html";
  }

// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>
</html>
