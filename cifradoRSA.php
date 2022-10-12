<?php
$conn = mysqli_connect("localhost", "root", "", "metodos_encriptacion");

if($conn === false){
    die("ERROR: Could not connect. " 
        . mysqli_connect_error());
}

// Declarar los datos
$idrsa =  $_REQUEST['id'];
$Nombre = $_REQUEST['Nombre'];
$Apellidos =  $_REQUEST['Apellidos'];
$llave = $_REQUEST['llave'];
$sms = $_REQUEST['sms'];

function encrypt($data,$llave){
    $iv=openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted=openssl_encrypt($data,"aes-256-cbc",$llave,0,$iv);
    return base64_encode($encrypted."::".$iv);
}
function decrypt($data,$llave){
    list($encrypted_data, $iv)= explode('::', base64_decode($data),2);
    return openssl_decrypt($encrypted_data,'aes-256-cbc',$llave,0,$iv);
}

$llave=$_REQUEST['llave'];
echo"Valor de mi variable: ".$llave."<br/>";

$sms=$_REQUEST['sma'];
echo"La variable a encriptar es: ".$sms."<br/>";

$encryptado=encrypt($String,$llave);
echo"Valor de mi variable encriptada: ".$encryptado."<br/>";

echo"Valor despues de usar la desencriptacion: ".decrypt($encryptado,$llave)."";

// Agregar los datos a la BD con el formulario
$sql = "INSERT INTO rsa  VALUES ('$idrsa', '$Nombre','$Apellidos','$llave','$sms','$encryptado')";
  
if(mysqli_query($conn, $sql)){
    echo "<h3>Los datos han sido guardados exitosamente." ;
    
    echo '<center><a href="cifrar_rsa.php">Regresar</a><center><br>';
} else{
    echo "ERROR: Hush! Sorry $sql. " 
        . mysqli_error($conn);
}

?>