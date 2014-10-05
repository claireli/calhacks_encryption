<script src="CryptoJS v3.1.2/rollups/aes.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<?php
//Connect
$mysqli=mysql_connect("localhost", "root", "claire", "calhacks") or die(mysql_error());

if($mysqli){
	//echo "Connection yay";
}

$filename=$_POST['file_name'];
$one=$_POST['token'];
$three=$_POST['pass'];
$four=$_POST['key'];

echo '<div id = "container">
<div id = "titler">File Information</div>
<div id = "neg1" class="row">';

$sql="INSERT INTO calhacks.user_input(file_name, token_type, action_key) 
VALUES ('$filename', '$one', '$four')";

$result = mysql_query($sql);

if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $sql;
    die($message);
}

else{
	//echo "Successfully created product.";
}

//echo $enc;

$file = file_get_contents('/storage/'.$_FILES["file"]["name"], true);
//echo $file;




?>

<html>
<head>
    <title>Administration Panel</title>
    <link rel="stylesheet" type="text/css" href="assets/style.css" />
    <link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
	
	
</head>
<body>

   <?php
		echo ' <div id = "first" class="row">';
		
		if ($_FILES["file"]["error"] > 0) {
  echo "Error: " . $_FILES["file"]["error"] . "<br>";
} else {
  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  echo "Type: " . $_FILES["file"]["type"] . "<br>";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
  echo "Stored in: " . $_FILES["file"]["tmp_name"];
  move_uploaded_file($_FILES["file"]["tmp_name"],
      "storage/". $_FILES["file"]["name"]);
};

echo '

<script>

function claire(){
	alert("hello");
}

function encrypt(){
	var encrypted = CryptoJS.AES.encrypt('.'"'.$_FILES["file"]["name"].'"'.', "'.$three.'"'.');
	var decrypted = CryptoJS.AES.decrypt(encrypted, '.'"'.$three.'"'.');
    var message = "";
    for (var i = 0; i < decrypted.toString().length; i += 2)
        message += String.fromCharCode(parseInt(decrypted.toString().substr(i, 2), 16));
    alert(encrypted);
	console.log("hello");
	document.getElementById("enc").innerHTML = encrypted;
	//decryption is encrypted var, and the  (.decrypt) , and the passphrase ("hello")
}
</script>

';
   ?>
        <form action="convert_JSON2.php" method="POST">
		<textarea name="enkrpt" id="enkrpt">...</textarea><p>
	<input type="button" value="Encrypt File" onclick="encrypt()"><input type="submit" value="Continue">
	</form>
    </div>
    
</body>
</html>
