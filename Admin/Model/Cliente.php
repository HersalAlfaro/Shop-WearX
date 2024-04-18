<?php
require_once(__DIR__ . '/../config/conexion.php');


class Cliente extends Conexion
{
    /*=============================================
	=            Atributos de la Clase            =
	=============================================*/
    protected static $cnx;
    private $Cedula;
    private $nombreCliente;
    private $apellidoCliente;
    private $segundoApCliente;
    private $genero;
    private $correo;
    private $contrasena;
    private $telefono;
    private $tipoCliente;
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

    public function setCedula($Cedula)
    {
        $this->Cedula = $Cedula;
    }

    public function getCedula()
    {
        return $this->Cedula;
    }

    public function setNombreCliente($nombreCliente)
    {
        $this->nombreCliente = $nombreCliente;
    }

    public function getNombreCliente()
    {
        return $this->nombreCliente;
    }

    public function setApellidoCliente($apellidoCliente)
    {
        $this->apellidoCliente = $apellidoCliente;
    }

    public function getApellidoCliente()
    {
        return $this->apellidoCliente;
    }

    public function setSegundoApCliente($segundoApCliente)
    {
        $this->segundoApCliente = $segundoApCliente;
    }

    public function getSegundoApCliente()
    {
        return $this->segundoApCliente;
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

    public function setTipoCliente($tipoCliente)
    {
        $this->tipoCliente = $tipoCliente;
    }

    public function getTipoCliente()
    {
        return $this->tipoCliente;
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


    public function listarClientes()
    {
        $query = "SELECT * FROM clientes ";
        $arr = array();

        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();

            foreach ($resultado->fetchAll() as $encontrado) {
                $cliente = new Cliente();
                $cliente->setCedula($encontrado['Cedula']);
                $cliente->setnombreCliente($encontrado['nombreCliente']);
                $cliente->setapellidoCliente($encontrado['apellidoCliente']);
                $cliente->setSegundoApCliente($encontrado['segundoApCliente']);
                $cliente->setGenero($encontrado['genero']);
                $cliente->setCorreo($encontrado['correo']);
                $cliente->setContrasena($encontrado['contrasena']);
                $cliente->setTelefono($encontrado['telefono']);
                $cliente->setTipoCliente($encontrado['tipoCliente']);
                $cliente->setProvincia($encontrado['provincia']);
                $cliente->setDistrito($encontrado['distrito']);
                $cliente->setCanton($encontrado['canton']);
                $cliente->setOtros($encontrado['otros']);
                $arr[] = $cliente;
            }

            return $arr;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return json_encode($error);
        }
    }
    public function verificarExistenciaCliente()
    {
        $query = "SELECT 1 FROM clientes WHERE Cedula=:Cedula OR correo=:correo LIMIT 1";

        try {
            self::getConexion();
            $Cedula = $this->getCedula();
            $correo = $this->getCorreo();

            $stmt = self::$cnx->prepare($query);
            $stmt->bindParam(":Cedula", $Cedula, PDO::PARAM_INT);
            $stmt->bindParam(":correo", $correo, PDO::PARAM_STR);
            $stmt->execute();

            $existeCliente = $stmt->fetch(PDO::FETCH_ASSOC);

            self::desconectar();

            return ($existeCliente !== false); // Devuelve true si se encontró al menos un cliente
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }

    public function guardarEnDb()
    {
        $query = "INSERT INTO clientes ( `Cedula`,`nombreCliente`, `apellidoCliente`, `segundoApCliente`, `genero`, `correo`, `contrasena`, `telefono`, `tipoCliente`, `provincia`, `distrito`, `canton`, `otros`)
            VALUES ( :Cedula ,:nombreCliente, :apellidoCliente, :segundoApCliente, :genero, :correo, :contrasena, :telefono, :tipoCliente, :provincia, :distrito, :canton, :otros)";

        try {
            self::getConexion();

            $cedula = $this->getCedula();
            $nombreCliente = $this->getnombreCliente();
            $apellidoCliente = $this->getapellidoCliente();
            $segundoApCliente = $this->getSegundoApCliente();
            $genero = $this->getGenero();
            $correo = $this->getCorreo();
            $contrasena = $this->getContrasena();
            $telefono = $this->getTelefono();
            $tipoCliente = $this->getTipoCliente();
            $provincia = $this->getProvincia();
            $distrito = $this->getDistrito();
            $canton = $this->getCanton();
            $otros = $this->getOtros();

            $resultado = self::$cnx->prepare($query);

            $resultado->bindParam(":Cedula", $cedula, PDO::PARAM_INT);
            $resultado->bindParam(":nombreCliente", $nombreCliente, PDO::PARAM_STR);
            $resultado->bindParam(":apellidoCliente", $apellidoCliente, PDO::PARAM_STR);
            $resultado->bindParam(":segundoApCliente", $segundoApCliente, PDO::PARAM_STR);
            $resultado->bindParam(":genero", $genero, PDO::PARAM_STR);
            $resultado->bindParam(":correo", $correo, PDO::PARAM_STR);
            $resultado->bindParam(":contrasena", $contrasena, PDO::PARAM_STR);
            $resultado->bindParam(":telefono", $telefono, PDO::PARAM_STR);
            $resultado->bindParam(":tipoCliente", $tipoCliente, PDO::PARAM_BOOL);
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


    public function actualizarCliente()
    {
        $query = "UPDATE clientes
                    SET nombreCliente = :nombreCliente, apellidoCliente = :apellidoCliente, 
                        segundoApCliente = :segundoApCliente, genero = :generos, telefono = :telefono, 
                        tipoCliente = :tipoCliente, provincia = :provincia, 
                        distrito = :distrito, canton = :canton, otros = :otros 
                    WHERE Cedula = :Cedula";

        try {
            self::getConexion();

            $nombreCliente = $this->getnombreCliente();
            $apellidoCliente = $this->getapellidoCliente();
            $segundoApCliente = $this->getSegundoApCliente();
            $genero = $this->getGenero();
            $telefono = $this->getTelefono();
            $tipoCliente = $this->getTipoCliente();
            $provincia = $this->getProvincia();
            $distrito = $this->getDistrito();
            $canton = $this->getCanton();
            $otros = $this->getOtros();
            $Cedula = $this->getCedula();

            $resultado = self::$cnx->prepare($query);

            $resultado->bindParam(":nombreCliente", $nombreCliente, PDO::PARAM_STR);
            $resultado->bindParam(":apellidoCliente", $apellidoCliente, PDO::PARAM_STR);
            $resultado->bindParam(":segundoApCliente", $segundoApCliente, PDO::PARAM_STR);
            $resultado->bindParam(":genero", $genero, PDO::PARAM_STR);
            $resultado->bindParam(":telefono", $telefono, PDO::PARAM_STR);
            $resultado->bindParam(":tipoCliente", $tipoCliente, PDO::PARAM_BOOL);
            $resultado->bindParam(":provincia", $provincia, PDO::PARAM_STR);
            $resultado->bindParam(":distrito", $distrito, PDO::PARAM_STR);
            $resultado->bindParam(":canton", $canton, PDO::PARAM_STR);
            $resultado->bindParam(":otros", $otros, PDO::PARAM_STR);
            $resultado->bindParam(":Cedula", $Cedula, PDO::PARAM_INT);

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


    public static function obtenerClientePorCedula($Cedula)
    {
        $query = "SELECT * FROM clientes WHERE Cedula = :Cedula";
        try {
            // Conecta a la base de datos
            self::getConexion();

            // Prepara la consulta
            $stmt = self::$cnx->prepare($query);

            // Asigna el valor de la cédula y ejecuta la consulta
            $stmt->bindParam(":Cedula", $Cedula, PDO::PARAM_INT);
            $stmt->execute();

            // Obtiene los resultados y los devuelve como un arreglo asociativo
            $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

            // Cierra la conexión a la base de datos
            self::desconectar();

            return $cliente;
        } catch (PDOException $e) {
            // Manejo de errores, por ejemplo, loguear el error
            return null;
        }
    }

    public function eliminarcliente()
    {
        $query = "DELETE FROM clientes WHERE Cedula = :Cedula";

        try {
            self::getConexion();
            $Cedula = $this->getCedula();

            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":Cedula", $Cedula, PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();

            return $resultado->rowCount(); // Devuelve el número de filas afectadas (debe ser 1 si se eliminó correctamente).
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }

    public function obtenerCliente()
    {
        $query = "SELECT Cedula, nombreCliente, apellidoCliente, correo FROM cliente";

        $clientes = array();

        try {
            self::getConexion();
            $resultado = self::$cnx->query($query);

            while ($cliente = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $clientes[] = $cliente;
            }

            self::desconectar();

            return $clientes;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }

    public function actualizarContrasenaCliente()
    {
        $query = "UPDATE cliente 
                    SET contrasena = :contrasena 
                    WHERE Cedula = :Cedula";

        try {
            self::getConexion();

            $contrasena = $this->getContrasena();
            $Cedula = $this->getCedula();


            $resultado = self::$cnx->prepare($query);

            $resultado->bindParam(":contrasena", $contrasena, PDO::PARAM_STR);
            $resultado->bindParam(":Cedula", $Cedula, PDO::PARAM_STR);


            self::$cnx->beginTransaction(); // Desactiva el autocommit

            $resultado->execute();
            self::$cnx->commit(); // Realiza el commit y vuelve al modo autocommit



            if ($resultado->rowCount() > 0) {
                return true;
            } else {
                return false;
            }



            self::desconectar();
        } catch (PDOException $Exception) {
            self::$cnx->rollBack();
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }
}
