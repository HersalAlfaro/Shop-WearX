<?php
require_once '../config/Conexion.php';

class Empleado extends Conexion

{
/*=============================================
	=            Atributos de la Clase            =
	=============================================*/
    protected static $cnx;
 
    private $cedula;
    private $nombreEmpleado;
    private $apellidoEmpleado;
    private $segundoApEmpleado;
    private $genero;
    private $correo;
    private $contrasena;
    private $telefono;
    private $rol;
    private $provincia;
    private $distrito;
    private $canton;
    private $otros;

    /*=====  End of Atributos de la Clase  ======*/

    /*=============================================
	=            Contructores de la Clase          =
	=============================================*/
    public function __construct()
    {
    }
    /*=====  End of Contructores de la Clase  ======*/

    /*=============================================
	=            Encapsuladores de la Clase       =
	=============================================*/

    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
    }

    public function getCedula()
    {
        return $this->cedula;
    }

    public function setNombreEmpleado($nombreEmpleado)
    {
        $this->nombreEmpleado = $nombreEmpleado;
    }

    public function getNombreEmpleado()
    {
        return $this->nombreEmpleado;
    }

    public function setApellidoEmpleado($apellidoEmpleado)
    {
        $this->apellidoEmpleado = $apellidoEmpleado;
    }

    public function getApellidoEmpleado()
    {
        return $this->apellidoEmpleado;
    }

    public function setSegundoApEmpleado($segundoApEmpleado)
    {
        $this->segundoApEmpleado = $segundoApEmpleado;
    }

    public function getSegundoApEmpleado()
    {
        return $this->segundoApEmpleado;
    }

    public function setGenero($genero)
    {
        $this->genero = $genero;
    }

    public function getGenero()
    {
        return $this->genero;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }

    public function getContrasena()
    {
        return $this->contrasena;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    public function getRol()
    {
        return $this->rol;
    }

    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;
    }

    public function getProvincia()
    {
        return $this->provincia;
    }

    public function setDistrito($distrito)
    {
        $this->distrito = $distrito;
    }

    public function getDistrito()
    {
        return $this->distrito;
    }

    public function setCanton($canton)
    {
        $this->canton = $canton;
    }

    public function getCanton()
    {
        return $this->canton;
    }

    public function setOtros($otros)
    {
        $this->otros = $otros;
    }

    public function getOtros()
    {
        return $this->otros;
    }


    /*=====  End of Encapsuladores de la Clase  ======*/

    /*=============================================
	=            Metodos de la Clase              =
	=============================================*/
    public static function getConexion()
    {
        self::$cnx = Conexion::conectar();
    }

    public static function desconectar()
    {
        self::$cnx = null;
    }


    public function listarEmpleados()
    {
        $query = "SELECT * FROM empleados ";
        $arr = array();

        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();

            foreach ($resultado->fetchAll() as $encontrado) {
                $empleado = new Empleado();
                $empleado->setCedula($encontrado['cedula']);
                $empleado->setNombreEmpleado($encontrado['nombreEmpleado']);
                $empleado->setApellidoEmpleado($encontrado['apellidoEmpleado']);
                $empleado->setSegundoApEmpleado($encontrado['segundoApEmpleado']);
                $empleado->setGenero($encontrado['genero']);
                $empleado->setCorreo($encontrado['correo']);
                $empleado->setContrasena($encontrado['contrasena']);
                $empleado->setTelefono($encontrado['telefono']);
                $empleado->setRol($encontrado['rol']);
                $empleado->setProvincia($encontrado['provincia']);
                $empleado->setDistrito($encontrado['distrito']);
                $empleado->setCanton($encontrado['canton']);
                $empleado->setOtros($encontrado['otros']);
                $arr[] = $empleado;
            }

            return $arr;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return json_encode($error);
        }
    }
    public function verificarExistenciaEmpleado()
    {
        $query = "SELECT 1 FROM empleados WHERE cedula=:cedula OR correo=:correo LIMIT 1";

        try {
            self::getConexion();
            $cedula = $this->getCedula();
            $correo = $this->getCorreo();

            $stmt = self::$cnx->prepare($query);
            $stmt->bindParam(":cedula", $cedula, PDO::PARAM_INT);
            $stmt->bindParam(":correo", $correo, PDO::PARAM_STR);
            $stmt->execute();

            $existeEmpleado = $stmt->fetch(PDO::FETCH_ASSOC);

            self::desconectar();

            return ($existeEmpleado !== false); // Devuelve true si se encontró al menos un empleado
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }

    public function guardarEnDb()
    {
        $query = "INSERT INTO empleados ( `cedula`,`nombreEmpleado`, `apellidoEmpleado`, `segundoApEmpleado`, `genero`, `correo`, `contrasena`, `telefono`, `rol`, `provincia`, `distrito`, `canton`, `otros`)
            VALUES ( :cedula ,:nombreEmpleado, :apellidoEmpleado, :segundoApEmpleado, :genero, :correo, :contrasena, :telefono, :rol, :provincia, :distrito, :canton, :otros)";

        try {
            self::getConexion();

            $cedula = $this->getCedula();
            $nombreEmpleado = $this->getNombreEmpleado();
            $apellidoEmpleado = $this->getApellidoEmpleado();
            $segundoApEmpleado = $this->getSegundoApEmpleado();
            $genero = $this->getGenero();
            $correo = $this->getCorreo();
            $contrasena = $this->getContrasena();
            $telefono = $this->getTelefono();
            $rol = $this->getRol();
            $provincia = $this->getProvincia();
            $distrito = $this->getDistrito();
            $canton = $this->getCanton();
            $otros = $this->getOtros();

            $resultado = self::$cnx->prepare($query);

            $resultado->bindParam(":cedula", $cedula, PDO::PARAM_INT);
            $resultado->bindParam(":nombreEmpleado", $nombreEmpleado, PDO::PARAM_STR);
            $resultado->bindParam(":apellidoEmpleado", $apellidoEmpleado, PDO::PARAM_STR);
            $resultado->bindParam(":segundoApEmpleado", $segundoApEmpleado, PDO::PARAM_STR);
            $resultado->bindParam(":genero", $genero, PDO::PARAM_STR);
            $resultado->bindParam(":correo", $correo, PDO::PARAM_STR);
            $resultado->bindParam(":contrasena", $contrasena, PDO::PARAM_STR);
            $resultado->bindParam(":telefono", $telefono, PDO::PARAM_STR);
            $resultado->bindParam(":rol", $rol, PDO::PARAM_BOOL);
            $resultado->bindParam(":provincia", $provincia, PDO::PARAM_STR);
            $resultado->bindParam(":distrito", $distrito, PDO::PARAM_STR);
            $resultado->bindParam(":canton", $canton, PDO::PARAM_STR);
            $resultado->bindParam(":otros", $otros, PDO::PARAM_STR);

            $resultado->execute();
            self::desconectar();

            if ($resultado->rowCount() > 0) {

                return true;
            } else {

                return false;
            }
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();;
            return json_encode($error);
        }
    }


    public function actualizarEmpleado()
    {
        $query = "UPDATE empleados
                    SET nombreEmpleado = :nombreEmpleado, apellidoEmpleado = :apellidoEmpleado, 
                        segundoApEmpleado = :segundoApEmpleado, genero = :generos, telefono = :telefono, 
                        rol = :rol, provincia = :provincia, 
                        distrito = :distrito, canton = :canton, otros = :otros 
                    WHERE cedula = :cedula";

        try {
            self::getConexion();

            $nombreEmpleado = $this->getNombreEmpleado();
            $apellidoEmpleado = $this->getApellidoEmpleado();
            $segundoApEmpleado = $this->getSegundoApEmpleado();
            $genero = $this->getGenero();
            $telefono = $this->getTelefono();
            $rol = $this->getRol();
            $provincia = $this->getProvincia();
            $distrito = $this->getDistrito();
            $canton = $this->getCanton();
            $otros = $this->getOtros();
            $cedula = $this->getCedula();

            $resultado = self::$cnx->prepare($query);

            $resultado->bindParam(":nombreEmpleado", $nombreEmpleado, PDO::PARAM_STR);
            $resultado->bindParam(":apellidoEmpleado", $apellidoEmpleado, PDO::PARAM_STR);
            $resultado->bindParam(":segundoApEmpleado", $segundoApEmpleado, PDO::PARAM_STR);
            $resultado->bindParam(":genero", $genero, PDO::PARAM_STR);
            $resultado->bindParam(":telefono", $telefono, PDO::PARAM_STR);
            $resultado->bindParam(":rol", $rol, PDO::PARAM_BOOL);
            $resultado->bindParam(":provincia", $provincia, PDO::PARAM_STR);
            $resultado->bindParam(":distrito", $distrito, PDO::PARAM_STR);
            $resultado->bindParam(":canton", $canton, PDO::PARAM_STR);
            $resultado->bindParam(":otros", $otros, PDO::PARAM_STR);
            $resultado->bindParam(":cedula", $cedula, PDO::PARAM_INT);

            self::$cnx->beginTransaction(); // Desactiva el autocommit

            $resultado->execute();
            self::$cnx->commit(); 
            self::desconectar();
            return $resultado->rowCount();
        } catch (PDOException $Exception) {
            self::$cnx->rollBack();
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }


    public static function obtenerEmpleadoPorCedula($cedula)
    {
        $query = "SELECT * FROM empleados WHERE cedula = :cedula";
        try {
            // Conecta a la base de datos
            self::getConexion();

            // Prepara la consulta
            $stmt = self::$cnx->prepare($query);

            // Asigna el valor de la cédula y ejecuta la consulta
            $stmt->bindParam(":cedula", $cedula, PDO::PARAM_INT);
            $stmt->execute();

            // Obtiene los resultados y los devuelve como un arreglo asociativo
            $empleado = $stmt->fetch(PDO::FETCH_ASSOC);

            // Cierra la conexión a la base de datos
            self::desconectar();

            return $empleado;
        } catch (PDOException $e) {
            // Manejo de errores, por ejemplo, loguear el error
            return null;
        }
    }

    public function eliminarempleado()
    {
        $query = "DELETE FROM empleados WHERE cedula = :cedula";

        try {
            self::getConexion();
            $cedula = $this->getCedula();

            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":cedula", $cedula, PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();

            return $resultado->rowCount(); // Devuelve el número de filas afectadas (debe ser 1 si se eliminó correctamente).
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }

    public function obtenerEmpleado()
    {
        $query = "SELECT cedula, nombreEmpleado, apellidoEmpleado, correo FROM empleado";

        $empleados = array();

        try {
            self::getConexion();
            $resultado = self::$cnx->query($query);

            while ($empleado = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $empleados[] = $empleado;
            }

            self::desconectar();

            return $empleados;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }

    public function actualizarContrasenaEmpleado()
    {
        $query = "UPDATE empleado 
                    SET contrasena = :contrasena 
                    WHERE cedula = :cedula";

        try {
            self::getConexion();

            $contrasena = $this->getContrasena();
            $cedula = $this->getCedula();


            $resultado = self::$cnx->prepare($query);

            $resultado->bindParam(":contrasena", $contrasena, PDO::PARAM_STR);
            $resultado->bindParam(":cedula", $cedula, PDO::PARAM_STR);


            self::$cnx->beginTransaction(); // Desactiva el autocommit

            $resultado->execute();
            self::$cnx->commit(); // Realiza el commit y vuelve al modo autocommit
            self::desconectar();

            if ($resultado->rowCount() > 0) {
                return true;
            } else {
                return false;
            }


        } catch (PDOException $Exception) {
            self::$cnx->rollBack();
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }
    public function login()
    {
        $dbEmpleadoData = $this->obtenerEmpleadoPorCedula($this->getCedula());

        // Verifica si se encontró un empleado y la contraseña es válida
        if ($dbEmpleadoData && $this->getContrasena() == $dbEmpleadoData['contrasena']) {
            $_SESSION['cedula'] = $dbEmpleadoData['cedula'];
            $_SESSION['rol'] = $dbEmpleadoData['rol']; // Almacena el rol en la sesión
            return true;
        } else {
            return false;
        }
    }
}
