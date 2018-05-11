<DOCTYPE HTML>
    <html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>  <!-- required to handle IE -->
        <meta name="viewport" content="width=device-width, initial-scale=1"/>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title> ThreadSwap Shirts </title>
        <style>
        ul.Shirts li {
          background-color: rgba(146, 195, 209, 0.3);
          border-radius: 5px 5px 5px 5px;
          margin: 20px 20px 20px 20px;
          padding: 10px 10px 10px 10px;
          width: 250px;
          display: inline-block;
          vertical-align: top;
        }
        ul.Shirts li:hover {
          background-color: rgba(146, 195, 209, 0.5);
          transition: 0.3s;
          border-radius: 5px 5px 5px 5px;
          margin: 20px 20px 20px 20px;
          padding: 10px 10px 10px 10px;
          width:250px;
          display: inline-block;
        }
        ul.Shirts li.img {
          float:center;
        }
      </style>
        </head>
        <body>
          <div class="contents">

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
    <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-left-align" id="myBtn">
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
    <a href="http://plato.cs.virginia.edu/~cas5tu/database_project/InsertDeleteClothing.php" class="w3-bar-item w3-button">Add Item</a>
    <a href="http://plato.cs.virginia.edu/~cas5tu/database_project/View.html" class="w3-bar-item w3-button">View Your Add Items</a>
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
    <p class="w3-left">Shirts</p>
    <p class="w3-right">
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
   </p>
  </header>

<!-- end sidebar -->

<?php
$Shirts = '<ul class="Shirts">';
require_once('./library.php');
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno()) {
  echo("Can't connect to MySQL Server. Error code: " .
       mysqli_connect_error());
  return null;
}
// Form the SQL query (a SELECT query)
$sql="SELECT * FROM ShirtsView";
$result = mysqli_query($con,$sql);

// Print the data from the table row by row
$col = 0;
while($row = mysqli_fetch_array($result)) {
  $Shirts .= '<li>';
  $Shirts .= '<img src="'. $row['imageLink'] .'" style="width:230px;height:230px;"/>';
  $Shirts .= '<h4>' . $row['name'] . '</h4>';
  $Shirts .= '<p>' . $row['Size'];
  $Shirts .= " " . $row['description'];
  $Shirts .= " " . $row['brand'];
  $Shirts .= " " . $row['color'] . '</p>';
  $Shirts .= '<p>' . "$" . $row['price'];
  $Shirts .= " " . "stock:" . $row['stock'] . '</p>';
  

  $Shirts .= '<p>' . $row['release_date_year'];
  $Shirts .= " " . $row['release_date_season'] . '</p>';
  $Shirts .= '<a href="buyNow.php?item_id='.$row['item_id'].'" style="color:blue">BUY</a>';
  $Shirts .= '</li>';
}
mysqli_close($con);
$Shirts .= '</ul>';
echo $Shirts;
?> 
</div>

<script>
  function myAccFunc() {
    var x = document.getElementById("demoAcc");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
  function function1(){
    window.location.href = "http://plato.cs.virginia.edu/~cas5tu/database_project/homepage.php";
  }
  function function2(){
    window.location.href = "http://plato.cs.virginia.edu/~cas5tu/database_project/test_search.html";
  }
  </script>
</body>
</html>