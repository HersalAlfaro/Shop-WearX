<?php
require_once '../config/Conexion.php';

class Categoria extends Conexion
{
    /*=============================================
	=            Atributos de la Clase            =
	=============================================*/
    protected static $cnx;
    private $categoriaID;
    private $nombreCategoria;
    private $totalProductos;



    /*=============================================
	=            Contructores de la Clase          =
	=============================================*/
    public function __construct()
    {
    }


    /*=============================================
	=            Encapsuladores de la Clase       =
	=============================================*/
    public function setCategoriaID($categoriaID)
    {
        $this->categoriaID = $categoriaID;
    }

    public function setNombreCategoria($nombreCategoria)
    {
        $this->nombreCategoria = $nombreCategoria;
    }

    public function setTotalProductos($totalProductos)
    {
        $this->totalProductos = $totalProductos;
    }

    public function getNombreCategoria()
    {
        return $this->nombreCategoria;
    }

    public function getTotalProductos()
    {
        return $this->totalProductos;
    }

    public function getCategoriaID()
    {
        return $this->categoriaID;
    }
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


    public function listarCategorias()
    {
        $query = "SELECT c.categoriaID, c.nombreCategoria, COUNT(p.codigoProducto) AS totalProductos 
                  FROM categorias c 
                  LEFT JOIN productos p ON c.categoriaID = p.categoriaID 
                  GROUP BY c.categoriaID, c.nombreCategoria";
        $categorias = array();
    
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
    
            while ($encontrado = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $categoria = new Categoria();
                $categoria->setCategoriaID($encontrado['categoriaID']);
                $categoria->setNombreCategoria($encontrado['nombreCategoria']);
                $categoria->setTotalProductos($encontrado['totalProductos']);
    
                $categorias[] = $categoria;
            }
    
            self::desconectar();
    
            return $categorias;
        } catch (PDOException $Exception) {
            self::desconectar();
            throw new Exception("Error " . $Exception->getCode() . ": " . $Exception->getMessage());
        }
    }
    
    public function insertar()
    {
        $query = "INSERT INTO `categorias` (`nombreCategoria`)
        VALUES (:nombreCategoria)";

        try {
            self::getConexion();
            $nombreCategoria = $this->getNombreCategoria();
           
            $resultado = self::$cnx->prepare($query);

            $resultado->bindParam(":nombreCategoria", $nombreCategoria, PDO::PARAM_STR);

            $resultado->execute(); 
            self::desconectar(); 
    
            if ($resultado->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            echo $error;
            return json_encode($error);
        }
    }

    public function verificarExistenciaCate()
    {
        $query = "SELECT nombreCategoria FROM categorias WHERE nombreCategoria = :nombreCategoria";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $nombreCategoria = $this->getNombreCategoria();


            $resultado->bindParam(":nombreCategoria", $nombreCategoria, PDO::PARAM_STR);

            $resultado->execute();
            self::desconectar();

            $encontrar = false;
            foreach ($resultado->fetchAll() as $encontrado) {
                $encontrar = true;
            }
            return $encontrar;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }


    public function actualizarCategoria()
    {
        $query = "UPDATE categorias 
                    SET nombreCategoria = :nombreCategoria
                    WHERE categoriaID = :categoriaID";

        try {
            self::getConexion();

            $nombre = $this->getNombreCategoria();
            $categoriaID = $this->getCategoriaID();

            $resultado = self::$cnx->prepare($query);

            $resultado->bindParam(":nombreCategoria", $nombre, PDO::PARAM_STR);
            $resultado->bindParam(":categoriaID", $categoriaID, PDO::PARAM_INT);

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


    public function eliminarCategoria()
    {
        $query = "DELETE FROM categorias WHERE categoriaID = :categoriaID";

        try {
            self::getConexion();
            $categoriaID = $this->getCategoriaID();

            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":categoriaID", $categoriaID, PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();

            return $resultado->rowCount(); // Devuelve el número de filas afectadas (debe ser 1 si se eliminó correctamente).
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }
}
