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
        $query = "SELECT p.codigoProducto, p.nombreProducto, p.descripcionProducto, SUM(a.enStock) AS enStockTotal, p.precio
                  FROM productos AS p
                  INNER JOIN producto_talla_color AS a ON p.codigoProducto = a.codigoProducto
                  GROUP BY p.codigoProducto";

        $productos = array();

        try {
            self::getConexion();
            $resultado = self::$cnx->query($query);

            while ($articulo = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $producto = new Producto();
                $producto->setCodigoProducto($articulo['codigoProducto']);
                $producto->setNombreProducto($articulo['nombreProducto']);
                $producto->setDescripcionProducto($articulo['descripcionProducto']);
                $producto->setEnStock($articulo['enStockTotal']); // Usamos el stock total sumado de todas las variantes
                $producto->setPrecio($articulo['precio']);
                $productos[] = $producto;
            }

            self::desconectar();
            return $productos;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
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
            $nombreProducto = $this->getNombreProducto(); // Corrección aquí
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
        $queryProducto = "INSERT INTO `productos` (`nombreProducto`, `descripcionProducto`, `imagenURLProducto`, `precio`, `estadoProducto`, `categoriaID`)
                VALUES (:nombreProducto, :descripcionProducto, :imagenURLProducto, :precio, :estadoProducto, :categoriaID)";

        try {
            self::getConexion();
            $nombreProducto = $this->getNombreProducto();
            $descripcionProducto = $this->getDescripcionProducto();
            $imagenURLProducto = $this->getImagenURLProducto();
            $precio = $this->getPrecio();
            $estadoProducto = $this->getEstadoProducto();
            $categoriaID = $this->getCategoriaProducto();

            // Iniciar transacción
            self::$cnx->beginTransaction();

            // Insertar producto
            $resultadoProducto = self::$cnx->prepare($queryProducto);
            $resultadoProducto->bindParam(":nombreProducto", $nombreProducto, PDO::PARAM_STR);
            $resultadoProducto->bindParam(":descripcionProducto", $descripcionProducto, PDO::PARAM_STR);
            $resultadoProducto->bindParam(":imagenURLProducto", $imagenURLProducto, PDO::PARAM_STR);
            $resultadoProducto->bindParam(":precio", $precio, PDO::PARAM_INT);
            $resultadoProducto->bindParam(":estadoProducto", $estadoProducto, PDO::PARAM_STR);
            $resultadoProducto->bindParam(":categoriaID", $categoriaID, PDO::PARAM_INT);
            $resultadoProducto->execute();

            // Obtener el código del producto insertado
            $codigoProducto = self::$cnx->lastInsertId();

            // Confirmar la transacción
            self::$cnx->commit();
            self::desconectar();

            return $codigoProducto; // Devolver el código del producto insertado
        } catch (PDOException $Exception) {
            // Revertir la transacción en caso de error
            self::$cnx->rollback();
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }

    public function insertarAtributos($codigoProducto, $sizeProducto, $color, $enStock)
    {
        $queryAtributos = "INSERT INTO `producto_talla_color` (`codigoProducto`, `sizeProducto`, `color`, `enStock`)
                        VALUES (:codigoProducto, :sizeProducto, :color, :enStock)";

        try {
            self::getConexion();

            // Iniciar transacción
            self::$cnx->beginTransaction();

            // Preparar la consulta para insertar atributos
            $statement = self::$cnx->prepare($queryAtributos);
            $statement->bindParam(":codigoProducto", $codigoProducto, PDO::PARAM_INT);
            $statement->bindParam(":sizeProducto", $sizeProducto, PDO::PARAM_STR);
            $statement->bindParam(":color", $color, PDO::PARAM_STR);
            $statement->bindParam(":enStock", $enStock, PDO::PARAM_INT);

            // Ejecutar la consulta
            $statement->execute();

            // Confirmar la transacción
            self::$cnx->commit();
            self::desconectar();

            return true;
        } catch (PDOException $Exception) {
            // Revertir la transacción en caso de error
            self::$cnx->rollback();
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }

    /*=====  [CRUD] Actualizar Productos de la Clase  ======*/

    public function actualizarProducto()
    {
        $query = "UPDATE productos 
              SET nombreProducto = :nombreProducto, 
                  descripcionProducto = :descripcionProducto, 
                  imagenURLProducto = :imagenURLProducto, 
                  precio = :precio, 
                  estadoProducto = :estadoProducto, 
                  categoriaID = :categoriaID
              WHERE codigoProducto = :codigoProducto";

        try {
            self::getConexion();

            $codigoProducto = $this->getCodigoProducto();
            $nombreProducto = $this->getNombreProducto();
            $descripcionProducto = $this->getDescripcionProducto();
            $imagenURLProducto = $this->getImagenURLProducto();
            $precio = $this->getPrecio();
            $estadoProducto = $this->getEstadoProducto();
            $categoriaID = $this->getCategoriaProducto();

            $resultado = self::$cnx->prepare($query);

            $resultado->bindParam(":nombreProducto", $nombreProducto, PDO::PARAM_STR);
            $resultado->bindParam(":descripcionProducto", $descripcionProducto, PDO::PARAM_STR);
            $resultado->bindParam(":imagenURLProducto", $imagenURLProducto, PDO::PARAM_STR);
            $resultado->bindParam(":precio", $precio, PDO::PARAM_INT);
            $resultado->bindParam(":estadoProducto", $estadoProducto, PDO::PARAM_STR);
            $resultado->bindParam(":categoriaID", $categoriaID, PDO::PARAM_INT);
            $resultado->bindParam(":codigoProducto", $codigoProducto, PDO::PARAM_INT);

            self::$cnx->beginTransaction();

            $resultado->execute();
            self::$cnx->commit();
            self::desconectar();
            return $resultado->rowCount(); // Retorna el número de filas afectadas
        } catch (PDOException $Exception) {
            self::$cnx->rollBack();
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }

    public function actualizarAtributos()
    {
        $query = "UPDATE producto_talla_color 
              SET sizeProducto = :sizeProducto, 
                  color = :color, 
                  enStock = :enStock
              WHERE codigoProducto = :codigoProducto";

        try {
            self::getConexion();

            $codigoProducto = $this->getCodigoProducto();
            $sizeProducto = $this->getSizeProducto();
            $color = $this->getColor();
            $enStock = $this->getEnStock();

            $statement = self::$cnx->prepare($query);
            $statement->bindParam(":sizeProducto", $sizeProducto, PDO::PARAM_STR);
            $statement->bindParam(":color", $color, PDO::PARAM_STR);
            $statement->bindParam(":enStock", $enStock, PDO::PARAM_INT);
            $statement->bindParam(":codigoProducto", $codigoProducto, PDO::PARAM_INT);

            self::$cnx->beginTransaction();

            $statement->execute();
            self::$cnx->commit();
            self::desconectar();

            return $statement->rowCount(); // Retorna el número de filas afectadas
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
        $query = "SELECT p.*, 
                    (SELECT nombreCategoria FROM categorias WHERE categorias.categoriaID = p.categoriaID) AS nombreCategoria,
                    GROUP_CONCAT(DISTINCT a.sizeProducto) AS tallas,
                    GROUP_CONCAT(DISTINCT a.color) AS colores,
                    GROUP_CONCAT(a.sizeProducto, ':', a.color, ':', a.enStock) AS atributos
                FROM productos p
                INNER JOIN producto_talla_color a ON p.codigoProducto = a.codigoProducto
                WHERE p.codigoProducto = :codigoProducto
                GROUP BY p.codigoProducto";
            
        $producto = array();
    
        try {
            self::getConexion();
            $stmt = self::$cnx->prepare($query);
            $stmt->bindParam(':codigoProducto', $codigoProducto, PDO::PARAM_INT);
            $stmt->execute();
    
            // Obtener el producto como un array asociativo
            $producto = $stmt->fetch(PDO::FETCH_ASSOC);
            // Convertir los atributos sizeProducto y color en arrays
            $producto['tallas'] = explode(',', $producto['tallas']);
            $producto['colores'] = explode(',', $producto['colores']);
            self::desconectar();
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return array("error" => $error);
        }
    
        return $producto;
    }


    /*=====  [CRUD] Borrar Productos de la Clase  ======*/

    public function eliminarProducto()
    {
        $query = "DELETE FROM productos WHERE CodigoProducto = :CodigoProducto";

        try {
            self::getConexion();
            $CodigoProducto = $this->getCodigoProducto();

            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":CodigoProducto", $CodigoProducto, PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();

            return $resultado->rowCount(); // Devuelve el número de filas afectadas (debe ser 1 si se eliminó correctamente).
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }



    /*=====  OBTENER ATRIBUTOS Y EL PRODUCTO  ======*/


    public function obtenerProductos()
    {
        $query = "SELECT p.codigoProducto, p.nombreProducto, p.descripcionProducto, p.imagenURLProducto, p.precio, p.estadoProducto, MAX(a.enStock) AS enStock
                  FROM productos AS p
                  INNER JOIN producto_talla_color AS a ON p.codigoProducto = a.codigoProducto
                  WHERE p.estadoProducto = 'disponible'
                  GROUP BY p.codigoProducto";

        $productos = array();

        try {
            self::getConexion();
            $resultado = self::$cnx->query($query);

            while ($producto = $resultado->fetch(PDO::FETCH_ASSOC)) {
                // Obtener las tallas del producto
                $tallas = $this->obtenerTallasProducto($producto['codigoProducto']);
                // Obtener los colores del producto
                $colores = $this->obtenerColoresProducto($producto['codigoProducto']);
                // Agregar las tallas y colores al array del producto
                $producto['tallas'] = $tallas;
                $producto['colores'] = $colores;
                // Agregar el producto al array de productos
                $productos[] = $producto;
            }
            self::desconectar();

            return $productos;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }


    public function obtenerTallasProducto($codigoProducto)
    {
        $query = "SELECT sizeProducto FROM producto_talla_color WHERE codigoProducto = :codigoProducto";

        try {
            self::getConexion();
            $statement = self::$cnx->prepare($query);
            $statement->bindParam(":codigoProducto", $codigoProducto, PDO::PARAM_INT);
            $statement->execute();

            $tallas = array();
            while ($fila = $statement->fetch(PDO::FETCH_ASSOC)) {
                $tallas[] = $fila['sizeProducto'];
            }

            self::desconectar();
            return $tallas;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }


    public function obtenerColoresProducto($codigoProducto)
    {
        $query = "SELECT color FROM producto_talla_color WHERE codigoProducto = :codigoProducto";

        try {
            self::getConexion();
            $statement = self::$cnx->prepare($query);
            $statement->bindParam(":codigoProducto", $codigoProducto, PDO::PARAM_INT);
            $statement->execute();

            $colores = array();
            while ($fila = $statement->fetch(PDO::FETCH_ASSOC)) {
                $colores[] = $fila['color'];
            }

            self::desconectar();
            return $colores;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }


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
