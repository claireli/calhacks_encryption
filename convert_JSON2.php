<script src="CryptoJS v3.1.2/rollups/aes.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<?php
//Connect
$mysqli=mysql_connect("localhost", "root", "claire", "calhacks") or die(mysql_error());

if($mysqli){
	//echo "Connection yay";
}
//echo "Storing into array<p>";


//$enc=$_POST['enkrpt'];

echo '    <div id = "container">
    <div id = "titler">File Information</div>
    
    <div id = "neg1" class="row">

';

//$sql="INSERT INTO calhacks.user_input(encryption_data) VALUES ('$enc')";

//$result = mysql_query($sql);

/*if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $sql;
    die($message);
}

else{
	//echo "Successfully created product.";
}
*/
//echo $enc;

?>

<html>
<head>
    <title>Administration Panel</title>
    <link rel="stylesheet" type="text/css" href="assets/style.css" />
    <link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
	
	
</head>
<body>

    <div id = "first" class="row">
        Your secret is safe with us.<p> <?php //echo $enc; ?>
	<input type="button" value="Save">
    </div>
    
</body>
</html>
