<?php

  require_once '../conn.php';
  $conn = new conexiondb();
  $conexionDB = $conn->conectarDB();

  $id = $_POST['id'];

  if(!empty($id)) {
    $query = "SELECT tblusuarios.idUsuario, tblusuarios.vchNombre, tblusuarios.vchApaterno, tblusuarios.vchAmaterno, tblusuarios.txtDireccion, tblusuarios.vchCorreo, tblusuarios.vchTelefono, tblusuarios.txtIdentificacion, tblusuarios.txtPassword, tblusuarios.intClaveUno, tblusuarios.intClaveDos 
    FROM tblusuarios WHERE tblusuarios.idUsuario = $id;";
    $result = mysqli_query($conexionDB, $query);
    
    if(!$result) {
      die('Query Error' . mysqli_error($conexionDB));
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
        'idusuario' => $row['idUsuario'],
        'clave1' => $row['intClaveUno'],
        'clave2' => $row['intClaveDos']
      );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
  }

?>
