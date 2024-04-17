<?php
require_once '../config/Conexion.php';

class Producto extends Conexion
{
    /*=============================================
	=            Atributos de la Clase            =
	=============================================*/
    protected static $cnx;

    private $codigo_producto = null;
    private $nombre_producto = null;
    private $descripcion_producto = null;
    private $imagen_url_producto = null;
    private $precio = null;
    private $en_stock = null;
    private $estado_producto = null;
    private $categoria_producto = null;

    private $sizeProducto = null;

    private $color = null;



    public function __construct()
    {
    }

    // Métodos Get
    public function getNombreProducto()
    {
        return $this->nombre_producto;
    }

    public function getCodigoProducto()
    {
        return $this->codigo_producto;
    }

    public function getDescripcionProducto()
    {
        return $this->descripcion_producto;
    }

    public function getImagenURLProducto()
    {
        return $this->imagen_url_producto;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getEnStock()
    {
        return $this->en_stock;
    }

    public function getEstadoProducto()
    {
        return $this->estado_producto;
    }

    public function getCategoriaProducto()
    {
        return $this->categoria_producto;
    }

    public function getSizeProducto()
    {
        return $this->sizeProducto;
    }

    public function getColor()
    {
        return $this->color;
    }


    // Métodos Set
    public function setNombreProducto($nombre_producto)
    {
        $this->nombre_producto = $nombre_producto;
    }
    public function setCodigoProducto($codigo_producto)
    {
        $this->codigo_producto = $codigo_producto;
    }

    public function setDescripcionProducto($descripcion_producto)
    {
        $this->descripcion_producto = $descripcion_producto;
    }

    public function setImagenURLProducto($imagen_url_producto)
    {
        $this->imagen_url_producto = $imagen_url_producto;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function setEnStock($en_stock)
    {
        $this->en_stock = $en_stock;
    }

    public function setEstadoProducto($estado_producto)
    {
        $this->estado_producto = $estado_producto;
    }

    public function setCategoriaProducto($categoria_producto)
    {
        $this->categoria_producto = $categoria_producto;
    }

    public function setSizeProducto($sizeProducto)
    {
        $this->sizeProducto = $sizeProducto;
    }

    public function setColor($color)
    {
        $this->color = $color;
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


    public function listarProductos()
    {
        $query = "SELECT * FROM productos";
        $arr = array();

        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();

            foreach ($resultado->fetchAll() as $articulo) {
                $producto = new Producto();
                $producto->setCodigoProducto($articulo['codigoProducto']);
                $producto->setNombreProducto($articulo['nombreProducto']);
                $producto->setDescripcionProducto($articulo['descripcionProducto']);
                $producto->setEnStock($articulo['enStock']);
                $producto->setPrecio($articulo['precio']);
                $arr[] = $producto;
            }
            return $arr;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();;
            return json_encode($error);
        }
    }

    public function productosTienda()
    {
        $query = "SELECT * FROM productos";
        $productos = array();

        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();

            // Obtener los resultados como un array asociativo
            $productos = $resultado->fetchAll(PDO::FETCH_ASSOC);

            self::desconectar();
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = array("error" => "Error " . $Exception->getCode() . ": " . $Exception->getMessage());
            return $error;
        }

        return $productos;
    }


    public function verificarProducto()
    {
        $query = "SELECT * FROM productos WHERE nombreProducto= :nombreProducto";

        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $nombreProducto = $this->getCodigoProducto();
            $resultado->bindParam(":nombreProducto", $nombreProducto, PDO::PARAM_STR);
            $resultado->execute();
            self::desconectar();

            $encontrado = false;
            foreach ($resultado->fetchAll() as $articulo) {
                $encontrado = true;
            }
            return $encontrado;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }

    /*=====  [CRUD] Guardar Productos de la Clase  ======*/

    public function insertar()
    {
        $query = "INSERT INTO `productos` (`nombreProducto`, `descripcionProducto`, `imagenURLProducto`, `precio`, `enStock`, `estadoProducto`, `categoriaID`, `sizeProducto`, `color`)
        VALUES (:nombreProducto, :descripcionProducto, :imagenURLProducto, :precio, :enStock, :estadoProducto, :categoriaID, :sizeProducto, :color)";

        try {
            self::getConexion();
            $nombreProducto = $this->getNombreProducto();
            $descripcionProducto = $this->getDescripcionProducto();
            $imagenURLProducto = $this->getImagenURLProducto();
            $precio = $this->getPrecio();
            $enStock = $this->getEnStock();
            $estadoProducto = $this->getEstadoProducto();
            $categoriaID = $this->getCategoriaProducto();
            $sizeProducto = $this->getSizeProducto();
            $color = $this->getColor();

            $resultado = self::$cnx->prepare($query);

            $resultado->bindParam(":nombreProducto", $nombreProducto, PDO::PARAM_STR);
            $resultado->bindParam(":descripcionProducto", $descripcionProducto, PDO::PARAM_STR);
            $resultado->bindParam(":imagenURLProducto", $imagenURLProducto, PDO::PARAM_STR);
            $resultado->bindParam(":precio", $precio, PDO::PARAM_INT);
            $resultado->bindParam(":enStock", $enStock, PDO::PARAM_INT);
            $resultado->bindParam(":estadoProducto", $estadoProducto, PDO::PARAM_STR);
            $resultado->bindParam(":categoriaID", $categoriaID, PDO::PARAM_INT);
            $resultado->bindParam(":sizeProducto", $sizeProducto, PDO::PARAM_STR);
            $resultado->bindParam(":color", $color, PDO::PARAM_STR);

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

    /*=====  [CRUD] Actualizar Productos de la Clase  ======*/

    public function actualizarProducto()
    {
        $query = "UPDATE productos 
                  SET nombreProducto = :nombreProducto, descripcionProducto = :descripcionProducto, imagenURLProducto = :imagenURLProducto, 
                      precio = :precio, enStock = :enStock, estadoProducto = :estadoProducto, categoriaID = :categoriaID,
                      sizeProducto = :sizeProducto, color = :color
                  WHERE codigoProducto = :codigoProducto";

        try {
            self::getConexion();
            $codigoProducto = $this->getCodigoProducto();
            $nombreProducto = $this->getNombreProducto();
            $descripcionProducto = $this->getDescripcionProducto();
            $imagenURLProducto = $this->getImagenURLProducto();
            $precio = $this->getPrecio();
            $enStock = $this->getEnStock();
            $estadoProducto = $this->getEstadoProducto();
            $categoriaID = $this->getCategoriaProducto();
            $sizeProducto = $this->getSizeProducto();
            $color = $this->getColor();

            $resultado = self::$cnx->prepare($query);

            $resultado->bindParam(":nombreProducto", $nombreProducto, PDO::PARAM_STR);
            $resultado->bindParam(":descripcionProducto", $descripcionProducto, PDO::PARAM_STR);
            $resultado->bindParam(":imagenURLProducto", $imagenURLProducto, PDO::PARAM_STR);
            $resultado->bindParam(":precio", $precio, PDO::PARAM_INT);
            $resultado->bindParam(":enStock", $enStock, PDO::PARAM_INT);
            $resultado->bindParam(":estadoProducto", $estadoProducto, PDO::PARAM_STR);
            $resultado->bindParam(":categoriaID", $categoriaID, PDO::PARAM_STR);
            $resultado->bindParam(":sizeProducto", $sizeProducto, PDO::PARAM_STR);
            $resultado->bindParam(":color", $color, PDO::PARAM_INT);
            $resultado->bindParam(":codigoProducto", $codigoProducto, PDO::PARAM_INT);

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

    /*=====  [CRUD] Leer Productos de la Clase  ======*/

    public function obtenerProductoPorCodigo($codigoProducto)
    {
        $query = "SELECT *, (SELECT nombreCategoria FROM categorias WHERE categorias.categoriaID = productos.categoriaID) AS nombreCategoria FROM productos WHERE codigoProducto = :codigoProducto";
        $producto = array();

        try {
            self::getConexion();
            $stmt = self::$cnx->prepare($query);
            $stmt->bindParam(':codigoProducto', $codigoProducto, PDO::PARAM_INT);
            $stmt->execute();

            // Obtener el producto como un array asociativo
            $producto = $stmt->fetch(PDO::FETCH_ASSOC);

            self::desconectar();
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return array("error" => $error);
        }

        return $producto;
    }






    /*=====  [CRUD] Actualizar Productos de la Clase  ======*/



    /*=====  [CRUD] Borrar Productos de la Clase  ======*/


    public function obtenerCategorias()
    {
        $query = "SELECT categoriaID, nombreCategoria FROM categorias";

        $categorias = array();

        try {
            self::getConexion();
            $resultado = self::$cnx->query($query);

            while ($categoria = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $categorias[] = $categoria;
            }

            self::desconectar();

            return $categorias;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }
}
