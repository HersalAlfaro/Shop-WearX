<?php
require_once '../Model/Orden.php';

switch ($_GET["op"]) {

    case 'listaTabla':
        $orden = new Orden();
        $ordenes = $orden->listarOrdenes();
        $data = array();
        foreach ($ordenes as $orden) {
            $data[] = array(
                "0" => $orden->getOrdenID(),
                "1" => $orden->getCedulaCliente(),
                "2" => $orden->getCodigoProducto(),
                "3" => $orden->getCantidad(),
                "4" => $orden->getMontoTotal(),
                "5" => $orden->getFechaOrden(),
                "6" => $orden->getEstadoOrden(),
                "7" => $orden->getDireccionEnvio()
            );
        }

        $resultados = array(
            "sEcho" => 1, // información para datatables
            "iTotalRecords" => count($data), // total de registros al datatable
            "iTotalDisplayRecords" => count($data), // enviamos el total de registros a visualizar
            "aaData" => $data
        );
        echo json_encode($resultados);
        break;


    case 'insertar':
        // Obtener los datos del formulario
        $CedulaCliente = isset($_POST["cliente"]) ? trim($_POST["cliente"]) : "";
        $codigoProducto = isset($_POST["producto"]) ? trim($_POST["producto"]) : "";
        $cantidad = isset($_POST["cantidad"]) ? (int)trim($_POST["cantidad"]) : 0;
        $montoTotal = isset($_POST["montoTotal"]) ? floatval(trim($_POST["montoTotal"])) : 0.00;
        $fechaOrden = date("Y-m-d H:i:s");
        $estadoOrden = isset($_POST["estadoOrden"]) ? trim($_POST["estadoOrden"]) : "";
        $provincia = isset($_POST["provincia"]) ? trim($_POST["provincia"]) : "";
        $distrito = isset($_POST["distrito"]) ? trim($_POST["distrito"]) : "";
        $canton = isset($_POST["canton"]) ? trim($_POST["canton"]) : "";
        $otros = isset($_POST["otros"]) ? trim($_POST["otros"]) : "";

        // Concatenar los valores para formar la dirección de envío
        $direccionEnvio = $provincia . ", " . $distrito . ", " . $canton . ", " . $otros;

        // Crear un nuevo objeto Orden
        $orden = new Orden();
        $orden->setCedulaCliente($CedulaCliente);
        $orden->setCodigoProducto($codigoProducto);
        $orden->setCantidad($cantidad);
        $orden->setMontoTotal($montoTotal);
        $orden->setFechaOrden($fechaOrden);
        $orden->setEstadoOrden($estadoOrden);
        $orden->setDireccionEnvio($direccionEnvio);

        // Insertar la orden en la base de datos
        $resultado = $orden->insertar();

        // Verificar si la inserción fue exitosa
        if ($resultado) {
            echo json_encode(array("success" => true, "message" => "Orden insertada correctamente."));
        } else {
            echo json_encode(array("success" => false, "message" => "Error al insertar la orden."));
        }
        break;


    case 'eliminar':
        if (isset($_POST['id'])) {
            $idOrden = intval($_POST['id']);
            $orden = new Orden();
            $orden->setOrdenID($idOrden);

            $resultado = $orden->eliminarOrden();

            if ($resultado === 1) {
                echo json_encode(["success" => "orden eliminado"]);
            } else {
                echo json_encode(["error" => "No se pudo eliminar el orden"]);
            }
        } else {
            echo json_encode(["error" => "idOrden del orden no proporcionado"]);
        }
        break;

        case 'obtenerOrdenPorID':
            if (isset($_POST['ordenID']) && !empty($_POST['ordenID'])) {
                // Obtener y limpiar el ordenID
                $ordenID = intval($_POST['ordenID']);
                
                // Verificar si el ordenID es un número válido
                if ($ordenID > 0) {
                    $orden = new Orden(); // Crear una instancia de la clase Orden
                    $ordenEncontrada = $orden->obtenerOrdenPorID($ordenID); // Obtener la orden por su ID
        
                    if ($ordenEncontrada) {
                        echo json_encode($ordenEncontrada);
                    } else {
                        echo json_encode(["error" => "No se encontró la orden con el ID proporcionado"]);
                    }
                } else {
                    echo json_encode(["error" => "OrdenID no válido"]);
                }
            } else {
                echo json_encode(["error" => "OrdenID no proporcionado"]);
            }
            break;
        
}
