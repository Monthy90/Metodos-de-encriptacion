<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav class="nav">
        <li class="nav-item">
            <a class="nav-link active" href="Cifrados.html">Inicio</a>
        </li>
    </nav>
    <form action="cifradoRSA.php" method="post">
        <table border='1'>
            <tr>
                <td>Ingresar Datos:</td>
            </tr>
            <tr>
                <td>idRSA:</td>
                <td><input type="text" name="idrsa" id="idrsa" required></td>
            </tr>
            <tr>
                <td>Nombre:</td>
                <td><input type="text" name="Nombre" id="Nombre" required></td>
            </tr>
            <tr>
                <td>Apellidos</td>
                <td><input type="text" name="Apellidos" id="Apellidos" required></td>
            </tr>
            <tr>
                <td>Contraseña</td>
                <td><input type="text" name="llave" id="llave" required></td>
            </tr>
            <tr>
                <td>Seguridad</td>
                <td><input type="text" name="sms" id="sms" required></td>
            </tr>
            <tr>
                <td><input type="submit" value="Encriptar"></td>
            </tr>
        </table>
    </form>
    <br>
    <div class="tabla" >
        <table border='1' class="tbl"> 
            <tr>
                <td>ID_RSA</td>
                <td>Nombre</td>
                <td>Apellidos</td>
                <td>Mensaje encryptado</td>
            </tr>
            <?php
                //Conexion a la BD
                $conn = mysqli_connect("localhost", "root", "", "metodos_encriptacion");
                //Mostrar los datos ingresaod
                $query="SELECT idrsa,Nombre,Apellidos,encryptado FROM rsa";
                $sql = mysqli_query($conn,$query);
                while($row = mysqli_fetch_array($sql)){
                //Ordena los datos
                echo "
                    <tr>
                        <td>".$row[0]."</td>
                        <td>".$row[1]."</td>
                        <td>".$row[2]."</td>
                        <td>".$row[3]."</td>
                    </tr>";
                }
                ?>
        </table>
    </div>
    <br>
    <form action="descrifrarRSA.php" method="get">
        <table border='1'>
            <tr>
                <td>ID_RSA:</td>
                <td><input type="text" name="idrsa" id="idrsa" required></td>
            </tr>
            <tr>
                <td>Contraseña de seguridad</td>
                <td><input type="text" name="llave" id="llave" required></td>
            </tr>
            <tr>
                <td>Mensaje encriptado</td>
                <td><input type="text" name="encryptado" id="encryptado" required></td>
            </tr>
            <tr>
                <td><input type="submit" value="Desencriptar"></td>
            </tr>
        </table>
    </form>
</body>
</html>