<?php
require_once('./library.php');
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno()) {
  echo("Can't connect to MySQL Server. Error code: " .
       mysqli_connect_error());
  return null;
}

$csv_export ='';
$sql = 'SELECT * FROM clothing';
$query =mysqli_query($con,$sql);
$field = mysqli_num_fields($query);
for($i = 0; $i < $field; $i++) {
  $csv_export.= mysqli_fetch_field_direct($query, $i)->name.';';
}
$csv_export .= '
';

while($row = mysqli_fetch_array($query)) {
  // create line with field values
  for($i = 0; $i < $field; $i++) {
    $csv_export.= '"'.$row[mysqli_fetch_field_direct($query, $i)->name].'";';
  }	
  $csv_export.= '
';	
}

header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename='threadswap_data.csv'");
echo($csv_export);
?>