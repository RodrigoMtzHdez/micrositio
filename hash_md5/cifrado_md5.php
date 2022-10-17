<?php
error_reporting(0);

require_once '../conn.php';

$nombre = $_POST['nombre'];
$apaterno = $_POST['apellidoP'];
$amaterno = $_POST['apellidoM'];
$direccion = $_POST['direccion'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$identificacion = $_POST['indetificacion'];
$contrasena = $_POST['psw'];

$dicCifrado = hash("md5",$direccion);
$idenCifrado = hash("md5",$identificacion);
$paswCifrado = hash("md5",$contrasena);

$conn = new conexiondb();
$conexionDB = $conn->conectarDB();
if ($conexionDB) 
{
    $query = "INSERT INTO tblusuarios(tblusuarios.vchNombre, tblusuarios.vchApaterno, tblusuarios.vchAmaterno, tblusuarios.txtDireccion, tblusuarios.vchCorreo, tblusuarios.vchTelefono, tblusuarios.txtIdentificacion, tblusuarios.txtPassword, tblusuarios.vchTipoCifrado) 
    VALUES('".$nombre."','".$apaterno."','".$amaterno."','".$dicCifrado."','".$correo."','".$telefono."','".$idenCifrado."','".$paswCifrado."','MD5');";
    $resultado = mysqli_query($conexionDB, $query);
    if ($resultado) {
        echo '<script>
        location.href = "./hash_md5.php";
        </script>';  //<div class="alert alert-success"><strong>Guardado!</strong> Formulario Guardado con Exito</div>
    } else {
        //echo '<div class="alert alert-warning"><strong>Error!</strong> Ocurrio un fallo al guardar</div>';
    }
} else 
{
    //echo '<div class="alert alert-danger"><strong>Error!</strong> Ocurrio un fallo al conectar</div>';
}
