<?php
require_once('./library.php');
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno()) {
  echo("Can't connect to MySQL Server. Error code: " .
       mysqli_connect_error());
  return null;
}
// Form the SQL query (a SELECT query)
// $sqlView="CREATE VIEW postView AS SELECT * FROM Posts NATURAL JOIN clothing WHERE username='$_POST[username]'";
// $resultsqlView = mysqli_query($con,$sqlView);
$sql="SELECT * FROM Posts NATURAL JOIN clothing WHERE username='$_POST[username]'";
$result = MYSQLI_QUERY($con,$sql);
// Print the data from the table row by row
while($row = mysqli_fetch_array($result)) {
 $View .= '<li>';
  $View .= '<img src="'. $row['imageLink'] .'" style="width:230px;height:230px;"/>';
  $View .= '<h4>' . $row['name'] . '</h4>';
  $View .= '<p>' . $row['Size'];
  $View .= " " . $row['description'];
  $View .= " " . $row['brand'];
  $View .= " " . $row['color'] . '</p>';
  $View .= '<div class=details>';
  $View .= '<p>' . "$" . $row['price'];
  $View .= " " . "stock:" . $row['stock'];
  
  $View .= " " . "rating:" . $row['rating'];
  $View .= " " . $row['condition'] . '</p>';
  
  $View .= '<p>' . $row['release_date_year'];
  $View .= " " . $row['release_date_season'] . '</p>';
  $View .= '</div>';
  $View .= '</li>';
}
$View .= '</ul>';
echo $View;
mysqli_close($con);

// file_put_contents('myView.json', json_encode($View));

?>