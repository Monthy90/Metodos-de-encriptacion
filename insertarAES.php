<?php
        //Conexion
        $conn = mysqli_connect("localhost", "root", "", "metodos_encriptacion");
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
          
        // Declarar los datos
        $idAES =  $_REQUEST['idAES'];
        $Nombre = $_REQUEST['Nombre'];
        $Apellidos =  $_REQUEST['Apellidos'];
        $Contraseña = $_REQUEST['Contraseña'];
        $Seguridad = $_REQUEST['Seguridad'];
          
        // Agregar los datos a la BD con el formulario
        $sql = "INSERT INTO aes_q  VALUES ('$idAES', '$Nombre','$Apellidos',AES_ENCRYPT('$Contraseña','$Seguridad'))";
          
        if(mysqli_query($conn, $sql)){
            echo "<h3>Los datos han sido guardados exitosamente." ;
            //echo"<center>{idAES:".$idAES.", Nombre:".$Nombre.",Apellidos:".$Apellidos.",Contraseña:".$Contraseña."}<center><br>";
            //Mostrar la tabla con los datos cuando se insertan
            echo " <center>
	            <table border = 1 cellspacing = 1 cellpadding = 1>
		            <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Contraseña</th>
            

                    </tr>";
                    //Seleccionar todos los datos de la tabla
                    $query="SELECT * FROM aes_q";
                    $sql = mysqli_query($conn,$query);
                    while($row = mysqli_fetch_array($sql)){
                        echo "
                            <tr>
                                <td>".$row[0]."</td>
                                <td>".$row[1]."</td>
                                <td>".$row[2]."</td>
                                <td>".$row[3]."</td>

                            </tr>";
        }
        echo "</center></table>";
            echo '<center><a href="http://localhost/METODOS%20DE%20ENCRIPTACION/Cifrado%20AES.php">Regresar</a><center><br>';
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
          
        // Close connection
        mysqli_close($conn);
        ?>