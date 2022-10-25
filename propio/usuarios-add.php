<?php

  require_once '../conn.php';
  $conn = new conexiondb();
  $conexionDB = $conn->conectarDB();

  if(isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $apaterno = $_POST['apaterno'];
    $amaterno = $_POST['amaterno'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $identificacion = $_POST['identificacion'];
    $contrasena = $_POST['contrasena'];
    $clave1 = $_POST['clave1'];
    $clave2 = $_POST['clave2'];

    $query = "INSERT INTO tblusuarios(tblusuarios.vchNombre, tblusuarios.vchApaterno, tblusuarios.vchAmaterno, tblusuarios.txtDireccion, tblusuarios.vchCorreo, tblusuarios.vchTelefono, tblusuarios.txtIdentificacion, tblusuarios.txtPassword, tblusuarios.intClaveUno, tblusuarios.intClaveDos,tblusuarios.vchTipoCifrado) 
    VALUES('".$nombre."','".$apaterno."','".$amaterno."','".$direccion."','".$correo."','".$telefono."','".$identificacion."','".$contrasena."','".$clave1."','".$clave2."','Propio');";
    $result = mysqli_query($conexionDB, $query);

    if (!$result) {
      die('Query Failed.');
    }

    echo "Usuario agregado correctamente";  

}

?>
