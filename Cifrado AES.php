<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Document</title>
</head>
<body>
    
    <nav class="nav">
        <li class="nav-item">
            <a class="nav-link active" href="Cifrados.html"><img src="images.png"></a>
        </li>
    </nav>
    <form action="insertarAES.php" method="post"  class="form">
        <table border='1' >
            <tr>
                <td>Ingresar Datos:</td>
            </tr>
            <tr>
                <td>idAES:</td>
                <td><input type="text" name="idAES" id="idAES"  class="input"  required></td>
            </tr>
            <tr>
                <td>Nombre:</td>
                <td><input type="text" name="Nombre" id="Nombre" class="input"  required></td>
            </tr>
            <tr>
                <td>Apellidos</td>
                <td><input type="text" name="Apellidos" id="Apellidos"  class="input" required></td>
            </tr>
            <tr>
                <td>Contraseña</td>
                <td><input type="text" name="Contraseña" id="Contraseña"class="input"  required></td>
            </tr>
            <tr>
                <td>Seguridad</td>
                <td><input type="text" name="Seguridad" id="Seguridad"class="input"  required></td>
            </tr>
            <tr>
                <td><input type="submit" value="Encriptar" class="input" ></td>
            </tr>
        </table>
    </form>
    <br>
    <div class="tabla" >
        <table border='1' class="form"> 
            <tr>
                <td>idAES</td>
                <td>Nombre</td>
                <td>Apellidos</td>
                <td>Contraseña</td>
            </tr>
            <?php
                //Conexion a la BD
                $conn = mysqli_connect("localhost", "root", "", "metodos_encriptacion");
                //Mostrar los datos ingresaod
                $query="SELECT * FROM aes_q";
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
    <form action="descifrar.php" method="get" class="form" >
        <table border='1'>
            <tr>
                <td>idAES:</td>
                <td><input type="text" name="idAES" id="idAES" class="input"  required></td>
            </tr>
            <tr>
                <td>Seguridad</td>
                <td><input type="text" name="Seguridad" id="Seguridad"class="input"  required></td>
            </tr>
            <tr>
                <td><input type="submit" value="Desencriptar"></td>
            </tr>
        </table>
    </form>
</body>
</html>