<?php

class conexiondb{

    private $conexion;
    private $user='root';
    private $pass='';
    private $db='micrositio';
    private $host='localhost';

    public function conectarDB()
    {
        $this->conexion = mysqli_connect($this->host, $this->user, $this->pass) or die("Error de Conexión. ".mysqli_connect_error());
        if($this->conexion)
        {
            mysqli_select_db($this->conexion, $this->db);
            return $this->conexion;
        }
    }
}