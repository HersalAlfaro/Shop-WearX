<?php
require_once '../config/Conexion.php';

class Orden extends Conexion
{
    /*=============================================
	=            Atributos de la Clase            =
	=============================================*/
    protected static $cnx;

    private $ordenID = null;
    private $CedulaCliente = null;
    private $codigoProducto = null;
    private $cantidad = null;
    private $montoTotal = null;
    private $fechaOrrden = null;
    private $estadoOrden = null;
    private $direccionEnvio = null;

    public function __construct()
    {
    }

    // Métodos Get

    public function getOrdenID()
    {
        return $this->ordenID;
    }

    public function getCedulaCliente()
    {
        return $this->CedulaCliente;
    }

    public function getCodigoProducto()
    {
        return $this->codigoProducto;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function getMontoTotal()
    {
        return $this->montoTotal;
    }

    public function getFechaOrden()
    {
        return $this->fechaOrrden;
    }

    public function getEstadoOrden()
    {
        return $this->estadoOrden;
    }

    public function getDireccionEnvio()
    {
        return $this->direccionEnvio;
    }

    // Métodos Set
    public function setOrdenID($ordenID)
    {
        $this->ordenID = $ordenID;
    }

    public function setCedulaCliente($cedulaCliente)
    {
        $this->CedulaCliente = $cedulaCliente;
    }

    public function setCodigoProducto($codigoProducto)
    {
        $this->codigoProducto = $codigoProducto;
    }

    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    public function setMontoTotal($montoTotal)
    {
        $this->montoTotal = $montoTotal;
    }

    public function setFechaOrden($fechaOrden)
    {
        $this->fechaOrrden = $fechaOrden;
    }

    public function setEstadoOrden($estadoOrden)
    {
        $this->estadoOrden = $estadoOrden;
    }

    public function setDireccionEnvio($direccionEnvio)
    {
        $this->direccionEnvio = $direccionEnvio;
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


    public function listarOrdenes()
    {
        $query = "SELECT 
        o.ordenID,
        CONCAT(c.nombreCliente, ' ', c.apellidoCliente) AS nombreCompletoCliente,
        p.nombreProducto,
        d.cantidad,
        d.montoTotal,
        o.fechaOrden,
        o.estadoOrden,
        o.direccionEnvio
            FROM 
                ordenes o
            JOIN 
                detalle_orden d ON o.ordenID = d.ordenID
            JOIN 
                productos p ON d.codigoProducto = p.codigoProducto
            JOIN 
                clientes c ON o.CedulaCliente = c.Cedula";


        $ordenes = array();

        try {
            self::getConexion();
            $resultado = self::$cnx->query($query);

            while ($orden = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $ordenInstancia = new Orden();
                $ordenInstancia->setOrdenID($orden['ordenID']);
                $ordenInstancia->setCedulaCliente($orden['nombreCompletoCliente']);
                $ordenInstancia->setCodigoProducto($orden['nombreProducto']);
                $ordenInstancia->setCantidad($orden['cantidad']);
                $ordenInstancia->setMontoTotal($orden['montoTotal']);
                $ordenInstancia->setFechaOrden($orden['fechaOrden']);
                $ordenInstancia->setEstadoOrden($orden['estadoOrden']);
                $ordenInstancia->setDireccionEnvio($orden['direccionEnvio']);
                $ordenes[] = $ordenInstancia;
            }

            self::desconectar();

            return $ordenes;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }


    /*=====  [CRUD] Guardar Ordenes de la Clase  ======*/

    public function insertar()
    {
        $query = "INSERT INTO ordenes (CedulaCliente, codigoProducto, cantidad, montoTotal, fechaOrden, estadoOrden, direccionEnvio) 
              VALUES (:CedulaCliente, :codigoProducto, :cantidad, :montoTotal, :fechaOrden, :estadoOrden, :direccionEnvio)";

        try {
            self::getConexion();

            // Obtener los valores de los atributos de la orden
            $CedulaCliente = $this->getCedulaCliente();
            $codigoProducto = $this->getCodigoProducto();
            $cantidad = $this->getCantidad();
            $montoTotal = $this->getMontoTotal();
            $fechaOrden = $this->getFechaOrden();
            $estadoOrden = $this->getEstadoOrden();
            $direccionEnvio = $this->getDireccionEnvio();

            // Preparar la consulta
            $resultado = self::$cnx->prepare($query);

            // Asociar parámetros
            $resultado->bindParam(":CedulaCliente", $CedulaCliente, PDO::PARAM_STR);
            $resultado->bindParam(":codigoProducto", $codigoProducto, PDO::PARAM_INT);
            $resultado->bindParam(":cantidad", $cantidad, PDO::PARAM_INT);
            $resultado->bindParam(":montoTotal", $montoTotal, PDO::PARAM_INT);
            $resultado->bindParam(":fechaOrden", $fechaOrden, PDO::PARAM_STR);
            $resultado->bindParam(":estadoOrden", $estadoOrden, PDO::PARAM_STR);
            $resultado->bindParam(":direccionEnvio", $direccionEnvio, PDO::PARAM_STR);

            // Ejecutar la consulta
            $resultado->execute();

            // Desconectar
            self::desconectar();

            // Verificar si se insertó correctamente
            if ($resultado->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }

    /*=====  [CRUD] Actualizar Ordenes de la Clase  ======*/

    public function actualizarOrden()
    {
        $query = "UPDATE ordenes 
                  SET CedulaCliente = :CedulaCliente, codigoProducto = :codigoProducto, cantidad = :cantidad, 
                      montoTotal = :montoTotal, fechaOrden = :fechaOrden, estadoOrden = :estadoOrden, 
                      direccionEnvio = :direccionEnvio
                  WHERE ordenID = :ordenID";

        try {
            self::getConexion();
            $ordenID = $this->getOrdenID();
            $CedulaCliente = $this->getCedulaCliente();
            $codigoProducto = $this->getCodigoProducto();
            $cantidad = $this->getCantidad();
            $montoTotal = $this->getMontoTotal();
            $fechaOrden = $this->getFechaOrden();
            $estadoOrden = $this->getEstadoOrden();
            $direccionEnvio = $this->getDireccionEnvio();

            $resultado = self::$cnx->prepare($query);

            $resultado->bindParam(":CedulaCliente", $CedulaCliente, PDO::PARAM_STR);
            $resultado->bindParam(":codigoProducto", $codigoProducto, PDO::PARAM_INT);
            $resultado->bindParam(":cantidad", $cantidad, PDO::PARAM_INT);
            $resultado->bindParam(":montoTotal", $montoTotal, PDO::PARAM_INT);
            $resultado->bindParam(":fechaOrden", $fechaOrden, PDO::PARAM_STR);
            $resultado->bindParam(":estadoOrden", $estadoOrden, PDO::PARAM_STR);
            $resultado->bindParam(":direccionEnvio", $direccionEnvio, PDO::PARAM_STR);
            $resultado->bindParam(":ordenID", $ordenID, PDO::PARAM_INT);

            self::$cnx->beginTransaction(); // Desactiva el autocommit

            $resultado->execute();
            self::$cnx->commit(); // Realiza el commit y vuelve al modo autocommit
            self::desconectar();
            return $resultado->rowCount();
        } catch (PDOException $Exception) {
            self::$cnx->rollBack();
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }

    /*=====  [CRUD] Leer Ordenes de la Clase  ======*/







    /*=====  [CRUD] Actualizar Ordenes de la Clase  ======*/



    /*=====  [CRUD] Borrar Ordenes de la Clase  ======*/
    public function eliminarOrden()
    {
        $query = "DELETE FROM ordenes WHERE ordenID = :ordenID";

        try {
            self::getConexion();
            $ordenID = $this->getOrdenID();

            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":ordenID", $ordenID, PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();

            return $resultado->rowCount(); // Devuelve el número de filas afectadas (debe ser 1 si se eliminó correctamente).
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }

    public function obtenerOrdenPorID($ordenID)
    {

        $query = "SELECT o.ordenID, o.CedulaCliente, o.fechaOrden, o.estadoOrden, o.direccionEnvio,
        d.codigoProducto, d.sizeProducto, d.color, d.cantidad, d.montoTotal
            FROM ordenes o
            JOIN detalle_orden d ON o.ordenID = d.ordenID
            JOIN producto_talla pt ON d.codigoProducto = pt.codigoProducto AND d.sizeProducto = pt.sizeProducto
            JOIN producto_color pc ON d.codigoProducto = pc.codigoProducto AND d.color = pc.color
        WHERE o.ordenID = :ordenID";

        $orden = array();

        try {
            self::getConexion();
            $stmt = self::$cnx->prepare($query);
            $stmt->bindParam(':ordenID', $ordenID, PDO::PARAM_INT);
            $stmt->execute();


            $orden = $stmt->fetch(PDO::FETCH_ASSOC);

            self::desconectar();
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return array("error" => $error);
        }

        return $orden;
    }
}
