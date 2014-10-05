<?php
session_start();
?>
<head>
<link rel="stylesheet" type="text/css" href="/shop/editproducts.css">

<script>
function sendList(str) {
  if (str=="") {
    document.getElementById("showproducts").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("showproducts").innerHTML=xmlhttp.responseText;
	  document.getElementById("previewproduct").innerHTML="hello";
    }
  }
  xmlhttp.open("GET","submit2.php?q="+str,true);
  xmlhttp.send();
}
</script>

</head>

<div align='center'>

<?php


//Connect
mysql_connect("localhost", "root", "claire", "shop") or die(mysql_error());
	$page=$_SESSION['page'];
	if(mysqli_connect_errno()){
		echo "Error connecting to database. Please contact developer (Claire Li)." . mysqli_connect_error();
	}

$query="SELECT * FROM SHOP.CATEGORIES";

$result = mysql_query($query);

if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}

//print_r($_POST);

foreach($_POST as $name => $content) { //$key => $value
   echo "<h2>Change Product";
   echo "</h2>";
}

echo "<p><form name='".$name."' method='post' action='revise_entry.php'>";

	echo "<table border='0' width='400px'>";
	echo "<tr>";
	echo "<td>";
	echo "Product Position";
	echo "</td>";
	echo "<td><div align='center'>";
	echo "<select name='order_id'><option>".$name."</option></select>";
	echo "</div></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td width='150px'>";
	echo "Select Category";
	echo "</td>";
	echo "<td><div align='center'>";
	echo "<select name='cat' onchange='sendList(this.value)'>";

while ($row = mysql_fetch_assoc($result)) {
	
	
	echo "<option name='cat'>";
	echo $row['category'];
	echo "</option>";
	
}

	echo "</select>";
	echo "</div></td></tr><tr>";
	echo "<td>";
	echo "Select Product";
	echo "</td>";
	echo "<td><div align='center'>";
	echo "<p id='showproducts'>&nbsp;</p></div>";
	echo "</td></tr>";

	echo "</table>";
	echo "<p>";
	echo "<input type='submit' value='Submit Entry'></form>";
	
//AJAX!
//1. select drop down for categories
//2. select drop down set to client for list of products under the category
//3. ajax sends a preview of each photo, name of products, id of products, and price
//4. submit button for update
?>

<p>

<a href="javascript:history.go(-1)">
Go Back
</a>


</div>
