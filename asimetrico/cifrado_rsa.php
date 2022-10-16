<?php
error_reporting(0);

function crearLlaves(){
    $configargs = array(
        "config" => "C:/xampp/php/extras/openssl/openssl.cnf",
        'private_key_bits' => 2048,
        'default_md' => "sha256",
    );
    
    $generar = openssl_pkey_new($configargs);
    openssl_pkey_export($generar, $keypriv, Null, $configargs);
    $keypub = openssl_pkey_get_details($generar);

    $llaves[0] = $keypub['key'];
    $llaves[1] = $keypriv;

    return $llaves;
}

function cifrar($datos, $key_publica){
  openssl_public_encrypt($datos, $datos_cifrados, $key_publica);
  return base64_encode($datos_cifrados);
}

require_once '../conn.php';

$nombre = $_POST['nombre'];
$apaterno = $_POST['apellidoP'];
$amaterno = $_POST['apellidoM'];
$direccion = $_POST['direccion'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$identificacion = $_POST['indetificacion'];
$contrasena = $_POST['psw'];

$llaves = crearLlaves();
$llavePublica = $llaves[0];
$llavePrivada = $llaves[1];

$dicCifrado = cifrar($direccion, $llavePublica);
$idenCifrado = cifrar($identificacion, $llavePublica);
$paswCifrado = cifrar($contrasena, $llavePublica);

$conn = new conexiondb();
$conexionDB = $conn->conectarDB();
if ($conexionDB) 
{
    $query = "INSERT INTO tblusuarios(tblusuarios.vchNombre, tblusuarios.vchApaterno, tblusuarios.vchAmaterno, tblusuarios.txtDireccion, tblusuarios.vchCorreo, tblusuarios.vchTelefono, tblusuarios.txtIdentificacion, tblusuarios.txtPassword,tblusuarios.txtPublica, tblusuarios.txtPrivada, tblusuarios.vchTipoCifrado) 
    VALUES('".$nombre."','".$apaterno."','".$amaterno."','".$dicCifrado."','".$correo."','".$telefono."','".$idenCifrado."','".$paswCifrado."','".$llavePublica."','".$llavePrivada."','Asimetrico');";
    $resultado = mysqli_query($conexionDB, $query);
    if ($resultado) {
        echo '<script>
        location.href = "./asimetrico.php";
        </script>';  
    } else {
        //echo '<div class="alert alert-warning"><strong>Error!</strong> Ocurrio un fallo al guardar</div>';
    }
} else 
{
    //echo '<div class="alert alert-danger"><strong>Error!</strong> Ocurrio un fallo al conectar</div>';
}
