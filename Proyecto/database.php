<?php
class conectaBD
{
    private $conn = null;
    private static $instancia;
    private function __construct($database = 'tfg')
    {
        $dsn = "mysql:host=localhost;dbname=$database";
        try {
            $this->conn = new PDO($dsn, 'root', '');
        } catch (PDOException $e) {
            die("¡Error!: " . $e->getMessage() . "<br/>");
        }
    }
    public static function singleton()
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    public function __clone()
    {
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }

    public function __destruct()
    {

        $this->conn = null;
    }

    public function consultaPreparada2($login, $ape, $clave, $fech)
    {
        $sentencia = $this->conn->prepare("SELECT * from usuarios where nombre = ?");
        $sentencia->bindParam(1, $login, PDO::PARAM_STR, 12);
        $sentencia->execute();
        $filas = $sentencia->rowCount();
        if ($filas == 0) {
            $sentencia = $this->conn->prepare("insert into usuarios (nombre, contrasena) VALUES (?, ?)");
            $sentencia->bindParam(1, $login, PDO::PARAM_STR, 12);
            $sentencia->bindParam(2, $clave, PDO::PARAM_STR, 12);
            $sentencia->execute();
            return true;
        } else {
            return false;
        }
    }
}
