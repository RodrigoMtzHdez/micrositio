<?php
error_reporting(0);

require_once '../conn.php';

function cifrar($mensaje, $llave)
{
    $inivec = openssl_random_pseudo_bytes(openssl_cipher_iv_length('AES-256-CBC'));
    $men_encriptado = openssl_encrypt($mensaje, "AES-256-CBC", $llave, 0, $inivec);

    return base64_encode($men_encriptado . "::" . $inivec);
}

$nombre = $_POST['nombre'];
$apaterno = $_POST['apellidoP'];
$amaterno = $_POST['apellidoM'];
$direccion = $_POST['direccion'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$identificacion = $_POST['indetificacion'];
$contrasena = $_POST['psw'];
$clave = $_POST['clave'];

$dicCifrado = cifrar($direccion, $clave);
$idenCifrado = cifrar($identificacion, $clave);
$paswCifrado = cifrar($contrasena, $clave);

$conn = new conexiondb();
$conexionDB = $conn->conectarDB();
if ($conexionDB) 
{
    $query = "INSERT INTO tblusuarios(tblusuarios.vchNombre, tblusuarios.vchApaterno, tblusuarios.vchAmaterno, tblusuarios.txtDireccion, tblusuarios.vchCorreo, tblusuarios.vchTelefono, tblusuarios.txtIdentificacion, tblusuarios.txtPassword, tblusuarios.vchClave, tblusuarios.vchTipoCifrado) 
    VALUES('".$nombre."','".$apaterno."','".$amaterno."','".$dicCifrado."','".$correo."','".$telefono."','".$idenCifrado."','".$paswCifrado."','".$clave."','Simetrico');";
    $resultado = mysqli_query($conexionDB, $query);
    if ($resultado) {
        echo '<script>
        location.href = "./simetrico.php";
        </script>';  
    } else {
        //echo '<div class="alert alert-warning"><strong>Error!</strong> Ocurrio un fallo al guardar</div>';
    }
} else 
{
    //echo '<div class="alert alert-danger"><strong>Error!</strong> Ocurrio un fallo al conectar</div>';
}

