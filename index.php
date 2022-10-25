<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Seguridad Informatica</title>
    <meta charset="utf-8" />
    <link rel="icon" href="./proteger.png">
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <br><br><br>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
        <a class="navbar-brand">Seguridad Informatica</a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./simetrico/simetrico.php">Encriptación Simétrico AES</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="./asimetrico/asimetrico.php">Encriptación Asimétrico RSA</a>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">HASH</a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="./hash_md5/hash_md5.php">MD5</a>
                      <a class="dropdown-item" href="./hash_sha1/hash_sha1.php">SHA1</a>
                      <a class="dropdown-item" href="./hash_sha256/hash_sha256.php">SHA256</a>
                        <a class="dropdown-item" href="./hash_sha384/hash_sha384.php">SHA384</a>
                        <a class="dropdown-item" href="./hash_sha512/hash_sha512.php">SHA512</a>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="./propio/propio.html">Cifrado Propio</a>                  
                </li>
            </ul>
        </div>
    </nav>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <center><img src="./logo.png" class="float-center"></center><br>
            <center>
              <h3 class="card-title">INGENIERIA EN DESARROLLO Y GESTION DE SOFTWARE</h3>
              <p class="card-text"><b>Asignatura:</b> Seguridad Informatica</p>
              <p class="card-text"><b>Actividad:</b> 2 Micrositio</p>
              <p class="card-text"><b>Alumno:</b> Rodrigo Martínez Hernández</p>
              <p class="card-text"><b>Matricula:</b> 20200753</p>
              <p class="card-text"><b>Grupo:</b> A</p>
              <p class="card-text"><b>Docente:</b> Ing. Ana María Felipe Redondo</p>
            </center>
        </div>
    </div>
    

    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
