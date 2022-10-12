<?php
        //Los datos que se registraran para hacer la desencriptacion
        $idAES =  $_REQUEST['idAES'];
        $Seguridad = $_REQUEST['Seguridad'];

        $conn = mysqli_connect("localhost", "root", "", "metodos_encriptacion");
        //Sentencia, se muestran los datos solo si coincide el id que se ingresa en el formulario y la contraseña
        $query="SELECT idAES,Nombre,cast( aes_decrypt(Contraseña,'$Seguridad') as char(255)) from aes_q where idAES=$idAES;";
        $sql = mysqli_query($conn,$query);
        while($row = mysqli_fetch_array($sql)){
        //Acomoda los datos
        echo " Los datos y contraseña desencriptados son: 
        <table border = 1 cellspacing = 1 cellpadding = 1>
		    <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Contraseña recuperada</th>
            </tr>

            <tr>
            <td>".$row[0]."</td>
            <td>".$row[1]."</td>
            <td>".$row[2]."</td>

        </tr>";

    }
    echo '<br><a href="http://localhost/METODOS%20DE%20ENCRIPTACION/Cifrado%20AES.php">Regresar</a><br>';

?>