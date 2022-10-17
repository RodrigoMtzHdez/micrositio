<?php
error_reporting(0);

require_once '../conn.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Seguridad Informatica</title>
    <link rel="icon" href="../proteger.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/fontawesome/css/all.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <a class="navbar-brand" href="../index.php">Seguridad Informatica</a>
            <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="my-nav" class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../simetrico/simetrico.php">Encriptación Simétrico AES</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="../asimetrico/asimetrico.php">Encriptación Asimétrico RSA</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">HASH</a>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="./hash_md5.php">MD5</a>
                        <a class="dropdown-item" href="../hash_sha1/hash_sha1.php">SHA1</a>
                        <a class="dropdown-item" href="../hash_sha256/hash_sha256.php">SHA256</a>
                        <a class="dropdown-item" href="../hash_sha384/hash_sha384.php">SHA384</a>
                        <a class="dropdown-item" href="../hash_sha512/hash_sha512.php">SHA512</a>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Cifrado Propio</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <div class="row">
                    <br>                   
                    <div class="col-lg-12">
                        <center><h3 class="card-title">Cifrado con HASH - MD5</h3></center>
                        <br>
                        <div class="card">
                            <div class="card-header bg-primary">Formulario de Usuarios</div>
                            <div class="card-body">
                                <p class="card-text">
                                    <form method="post" action="./cifrado_md5.php">
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label for="nombre">Nombre: </label>
                                                <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre" required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="apellidoP">Apellido Paterno:</label>
                                                <input id="apellidoP" class="form-control" type="text" name="apellidoP" placeholder="Ingrese su apellido Paterno" required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="apellidoM">Apellido Materno:</label>
                                                <input id="apellidoM" class="form-control" type="text" name="apellidoM" placeholder="Ingrese su apellido Materno" required>
                                            </div>                                         
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label for="direccion">Dirección:</label>
                                                <input id="direccion" class="form-control" type="text" name="direccion" placeholder="Ingrese su dirección" required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="correo">Correo Electronico:</label>
                                                <input id="correo" class="form-control" type="email" name="correo" placeholder="Ingrese su Correo Electronico"  required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="telefono">Telefono:</label>
                                                <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Ingrese su telefono" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label for="indetificacion">Identificación: </label>
                                                <input id="indetificacion" class="form-control" type="text" name="indetificacion" placeholder="Ingrese su identificación" required>                                           
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="pasw">Contraseña</label>
                                                <input id="pasw" class="form-control" type="password" name="psw" placeholder="Ingrese la Contraseña" required>                                           
                                            </div>
                                        </div>
                                        <button name="guardar" id="guardar" class="btn btn-info" type="submit">
                                            <span class="fa-regular fa-floppy-disk"></span> Guardar
                                        </button>                                   
                                    </form>
                                </p>
                            </div>
                        </div>
                    </div>                   
                </div>
                
                <br>
                <div class="card">
                        <div class="card-header bg-success">Informacion de la tabla</div>
                        <div class="card-body">
                            <h5 class="card-title">Tabla de usuarios</h5>
                            <p class="card-text">
                                <table class="table table-responsive">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Apellido Paterno</th>
                                            <th>Apellido Materno</th>
                                            <th>Dirección</th>
                                            <th>Correo Electronico</th>
                                            <th>Telefono</th>
                                            <th>Identificacion</th>
                                            <th>Contraseña</th>
                                        </tr>
                                    </thead>

                                    <?php                                       
                                        $conn = new conexiondb();
                                        $conexionDB = $conn->conectarDB();
                                        if ($conexionDB) {
                                            $sql = "SELECT tblusuarios.idUsuario, tblusuarios.vchNombre, tblusuarios.vchApaterno, tblusuarios.vchAmaterno, tblusuarios.txtDireccion, tblusuarios.vchCorreo, tblusuarios.vchTelefono, tblusuarios.txtIdentificacion, tblusuarios.txtPassword 
                                            FROM tblusuarios WHERE tblusuarios.vchTipoCifrado = 'MD5';";
                                            $result = mysqli_query($conexionDB, $sql);

                                            while ($mostrar = mysqli_fetch_array($result)) {
                                    ?>

                                    <tbody>
                                        <tr>
                                            <td><?php echo $mostrar['idUsuario'] ?></td>
                                            <td><?php echo $mostrar['vchNombre'] ?></td>
                                            <td><?php echo $mostrar['vchApaterno'] ?></td>
                                            <td><?php echo $mostrar['vchAmaterno'] ?></td>
                                            <td><?php echo $mostrar['txtDireccion'] ?></td>
                                            <td><?php echo $mostrar['vchCorreo'] ?></td>
                                            <td><?php echo $mostrar['vchTelefono'] ?></td>
                                            <td><?php echo $mostrar['txtIdentificacion'] ?></td>
                                            <td><?php echo $mostrar['txtPassword'] ?></td>
                                        </tr>
                                    </tbody>

                                    <?php }}?>

                                </table>
                            </p>
                        </div>
                    </div>
            </div>
        </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>