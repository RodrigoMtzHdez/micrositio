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

$dicCifrado = hash("sha384",$direccion);
$idenCifrado = hash("sha384",$identificacion);
$paswCifrado = hash("sha384",$contrasena);

$conn = new conexiondb();
$conexionDB = $conn->conectarDB();
if ($conexionDB) 
{
    $query = "INSERT INTO tblusuarios(tblusuarios.vchNombre, tblusuarios.vchApaterno, tblusuarios.vchAmaterno, tblusuarios.txtDireccion, tblusuarios.vchCorreo, tblusuarios.vchTelefono, tblusuarios.txtIdentificacion, tblusuarios.txtPassword, tblusuarios.vchTipoCifrado) 
    VALUES('".$nombre."','".$apaterno."','".$amaterno."','".$dicCifrado."','".$correo."','".$telefono."','".$idenCifrado."','".$paswCifrado."','SHA384');";
    $resultado = mysqli_query($conexionDB, $query);
    if ($resultado) {
        echo '<script>
        location.href = "./hash_sha384.php";
        </script>';  //<div class="alert alert-success"><strong>Guardado!</strong> Formulario Guardado con Exito</div>
    } else {
        //echo '<div class="alert alert-warning"><strong>Error!</strong> Ocurrio un fallo al guardar</div>';
    }
} else 
{
    //echo '<div class="alert alert-danger"><strong>Error!</strong> Ocurrio un fallo al conectar</div>';
}
