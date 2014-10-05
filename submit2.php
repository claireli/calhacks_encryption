<?php
$q = $_GET['q'];

$con = mysqli_connect('localhost','root','claire','shop');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");

$sql="SELECT * FROM all_products WHERE category = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<select name='product' onchange='preview(this.value)'>";
while($row = mysqli_fetch_array($result)) {
  echo "<option>";
  echo $row['name'];
  echo "</option>";
}
echo "</select>";

	
//echo $q;

mysqli_close($con);
?>