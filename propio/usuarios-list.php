<?php

  require_once '../conn.php';
  $conn = new conexiondb();
  $conexionDB = $conn->conectarDB();

  $query = "SELECT tblusuarios.idUsuario, tblusuarios.vchNombre, tblusuarios.vchApaterno, tblusuarios.vchAmaterno, tblusuarios.txtDireccion, tblusuarios.vchCorreo, tblusuarios.vchTelefono, tblusuarios.txtIdentificacion, tblusuarios.txtPassword 
  FROM tblusuarios WHERE tblusuarios.vchTipoCifrado = 'Propio';";
  $result = mysqli_query($conexionDB, $query);
  if(!$result) {
    die('Query Failed'. mysqli_error($conexionDB));
  }

  $json = array();
  while($row = mysqli_fetch_array($result)) {
    $json[] = array(
      'nombre' => $row['vchNombre'],
      'apaterno' => $row['vchApaterno'],
      'amaterno' => $row['vchAmaterno'],
      'direccion' => $row['txtDireccion'],
      'correo' => $row['vchCorreo'],
      'telefono' => $row['vchTelefono'],
      'identificacion' => $row['txtIdentificacion'],
      'contrasena' => $row['txtPassword'],
      'idusuario' => $row['idUsuario']
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>
