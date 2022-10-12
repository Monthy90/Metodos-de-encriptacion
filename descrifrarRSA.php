<?php
$conn = mysqli_connect("localhost", "root", "", "metodos_encriptacion");

// Declarar los datos
$idrsa = $_REQUEST['idrsa'];
$llave = $_REQUEST['llave'];
$encryptado = $_REQUEST['encryptado'];

if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

//Mostrar los datos ingresaod
$query = "SELECT idrsa,Nombre,Apellidos,sms FROM rsa where idrsa='$idrsa' and llave='$llave' and encryptado='$encryptado'";
$sql = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($sql)) {
    //Ordena los datos
    if ($query=true) {
        echo "
            <tr>
                <td>" . $row[0] . "</td>
                <td>" . $row[1] . "</td>
                <td>" . $row[2] . "</td>
                <td>" . $row[3] . "</td>
            </tr>";
    }else if($query=false){
        echo'El mensaje no pudo ser desencriptado';
    }
    
}


?>