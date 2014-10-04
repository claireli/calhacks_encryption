<script src="CryptoJS v3.1.2/rollups/aes.js"></script>

<?php

echo "Storing into array<p>";

$one=$_POST['token'];
$two=$_POST['encryptfile1'];
$three=$_POST['pass'];
$four=$_POST['key'];
$submission=array($one, $two, $three, $four);

var_dump($submission);

echo "Encrypting file<p>";
$test="helo world";
echo '<script>

function encrypt(){
	var encrypted = CryptoJS.AES.encrypt('.'"'.$three.'"'.', "hello");
	var decrypted = CryptoJS.AES.decrypt(encrypted, "hello");
    var message = "";
    for (var i = 0; i < decrypted.toString().length; i += 2)
        message += String.fromCharCode(parseInt(decrypted.toString().substr(i, 2), 16));
    console.log(message);
	alert(encrypted);
}

function herro(){
	alert("HI THERE");
}
</script>

<input type="button" onclick="encrypt()" value="Encrypt File"><p>





Encrypting passphrase<p>
<input type="button" onclick="encrypt()" value="Encrypt File"><p>

';
?>