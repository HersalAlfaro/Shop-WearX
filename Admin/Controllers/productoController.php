<?php
require_once '../Model/Producto.php';

switch ($_GET["op"]) {

    case 'listaProducto':
        $producto = new Producto();
        $productos = $producto->listarProductos();
        $data = array();
        foreach ($productos as $articulo) {
            $data[] = array(
                "0" => $articulo->getCodigoProducto(),
                "1" => $articulo->getNombreProducto(),
                "2" => $articulo->getDescripcionProducto(),
                "3" => $articulo->getEnStock(),
                "4" => $articulo->getPrecio(),
            );
        }

        $resultados = array(
            "sEcho" => 1, ##informacion para datatables
            "iTotalRecords" => count($data), ## total de registros al datatable
            "iTotalDisplayRecords" => count($data), ## enviamos el total de registros a visualizar
            "aaData" => $data
        );
        echo json_encode($resultados);
        break;


    case 'insertar':
        // Verificar si se ha enviado una imagen
        if (!empty($_FILES['imagen']['name'])) {
            // Ruta de la carpeta donde se guardará la imagen
            $carpetaDestino = '../Views/dist/images/';

            // Nombre de la imagen
            $imagen = $_FILES['imagen']['name'];

            // Ruta completa donde se guardará la imagen
            $rutaImagen = $carpetaDestino . $imagen;

            // Mover la imagen al directorio de destino
            if (!move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaImagen)) {
                // Error al mover la imagen
                echo 'Error al subir la imagen.';
                exit;
            }
        } else {
            // No se ha enviado ninguna imagen
            echo 'Debe seleccionar una imagen.';
            exit;
        }

        // Obtener los demás datos del formulario
        $nombreProducto = isset($_POST["nombreProducto"]) ? trim($_POST["nombreProducto"]) : "";
        $descripcionProducto = isset($_POST["descripcionProducto"]) ? trim($_POST["descripcionProducto"]) : "";
        $precio = isset($_POST["precio"]) ? number_format(trim($_POST["precio"]), 2, '.', '') : '0.00';
        $enStock = isset($_POST["enStock"]) ? (int)trim($_POST["enStock"]) : 0;
        $estadoProducto = isset($_POST["estadoProducto"]) ? trim($_POST["estadoProducto"]) : "";
        $categoriaID = isset($_POST["categoriaID"]) ? intval($_POST["categoriaID"]) : 0;
        $sizeProducto = isset($_POST["sizeProducto"]) ? trim($_POST["sizeProducto"]) : "";
        $color = isset($_POST["color"]) ? trim($_POST["color"]) : "";

        // Crear un nuevo objeto Producto
        $producto = new Producto();
        $producto->setNombreProducto($nombreProducto);
        // Verificar si el producto ya existe
        $encontrado = $producto->verificarProducto();

        if ($encontrado == false) {
            // Establecer los valores del producto
            $producto->setDescripcionProducto($descripcionProducto);
            $producto->setImagenURLProducto($imagen);
            $producto->setPrecio($precio);
            $producto->setEnStock($enStock);
            $producto->setEstadoProducto($estadoProducto);
            $producto->setCategoriaProducto($categoriaID);
            $producto->setSizeProducto($sizeProducto);
            $producto->setColor($color);
            $producto->insertar();
            if ($producto->verificarProducto()) {
                echo 1; // Éxito
            } else {
                echo 2;
            }
        } else {
            echo 3;
        }
        break;

    case 'editar':

        $nombreProducto = isset($_POST["nombreProducto"]) ? trim($_POST["nombreProducto"]) : "";
        $descripcionProducto = isset($_POST["descripcionProducto"]) ? trim($_POST["descripcionProducto"]) : "";
        $precio = isset($_POST["precio"]) ? number_format(trim($_POST["precio"]), 2, '.', '') : '0.00';
        $enStock = isset($_POST["enStock"]) ? (int)trim($_POST["enStock"]) : 0;
        $estadoProducto = isset($_POST["estadoProducto"]) ? trim($_POST["estadoProducto"]) : "";
        $categoriaID = isset($_POST["categoriaID"]) ? intval($_POST["categoriaID"]) : 0;
        $sizeProducto = isset($_POST["sizeProducto"]) ? trim($_POST["sizeProducto"]) : "";
        $color = isset($_POST["color"]) ? trim($_POST["color"]) : "";


        $producto = new Producto();
        $producto->setNombreProducto($nombreProducto);
        $encontrado = $producto->verificarProducto();

        if ($encontrado == false) {
            $producto->setDescripcionProducto($descripcionProducto);
            $producto->setImagenURLProducto($imagen);
            $producto->setPrecio($precio);
            $producto->setEnStock($enStock);
            $producto->setEstadoProducto($estadoProducto);
            $producto->setCategoriaProducto($categoriaID);
            $producto->setSizeProducto($sizeProducto);
            $producto->setColor($color);
            if ($producto->actualizarProducto()) {
                echo 1;
            } else {
                echo 2;
            }
        } else {
            echo 3;
        }
        break;

    case 'obtenerCategorias':
        $producto = new Producto();
        $categorias = $producto->obtenerCategorias();
        echo json_encode($categorias);
        break;
        

    case 'obtenerProductoCliente':
        try {
            // Crear una instancia del modelo Producto
            $producto = new Producto();

            // Obtener la lista de productos utilizando el método listarProductos del modelo
            $productos = $producto->productosTienda();

            // Enviar los datos de los productos como respuesta JSON
            echo json_encode($productos);
        } catch (PDOException $ex) {
            // En caso de error, devolver un mensaje de error JSON
            echo json_encode(array("error" => "Error de base de datos: " . $ex->getMessage()));
        }
        break;

    case 'obtenerProductoTienda':
        try {
            // Crear una instancia del modelo Producto
            $producto = new Producto();

            // Obtener la lista de productos utilizando el método listarProductos del modelo
            $productos = $producto->productosTienda();

            // Enviar los datos de los productos como respuesta JSON
            echo json_encode($productos);
        } catch (PDOException $ex) {
            // En caso de error, devolver un mensaje de error JSON
            echo json_encode(array("error" => "Error de base de datos: " . $ex->getMessage()));
        }
        break;


    case 'obtenerProductoPorCodigo':
        if (isset($_POST['codigoProducto'])) {
            $codigoProducto = intval($_POST['codigoProducto']);
            $producto = new Producto(); // Crear una instancia de la clase Producto
            $productoEncontrado = $producto->obtenerProductoPorCodigo($codigoProducto); // Obtener el producto por su código

            if ($productoEncontrado) {
                // Devuelve los datos del producto encontrado en formato JSON
                echo json_encode($productoEncontrado);
            } else {
                echo json_encode(["error" => "No se encontró el producto"]);
            }
        } else {
            echo json_encode(["error" => "Código del producto no proporcionado"]);
        }
        break;
}
