<?php
require_once '../Model/Categoria.php';
switch ($_GET["op"]) {


    case 'listaCategoria':
        $categoria = new Categoria();
        $categorias = $categoria->listarCategorias();
        $data = array();
        foreach ($categorias as $cat) {
            $data[] = array(
                "0" => $cat->getCategoriaID(),
                "1" => $cat->getNombreCategoria(),
                "2" => $cat->getTotalProductos(),
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
        $nombreCategoria = isset($_POST["nombreCategoria"]) ? trim($_POST["nombreCategoria"]) : "";
        $categoria = new Categoria();
        $categoria->setNombreCategoria($nombreCategoria);

        $encontrado = $categoria->verificarExistenciaCate();

        if ($encontrado == false) {
            $categoria->insertar();
            if ($categoria->verificarExistenciaCate()) {
                echo 1; // Éxito
            } else {
                echo 2;
            }
        } else {
            echo 3;
        }
        break;

    case 'editar':
        $nombre_categoria = isset($_POST["nombre_categoria"]) ? trim($_POST["nombre_categoria"]) : "";
        $encontrado = $categoria->verificarExistenciaCate();

        if ($encontrado == false) {
            $categoria->setNombreCategoria($nombre_categoria);
            if ($categoria->actualizarCategoria()) {
                echo 1; //exito en la actualizacion
            } else {
                echo 2;  //Error al guardar en la base de datos
            }
        } else {
            echo 3;
        }
        break;


    case 'eliminar':
        if (isset($_POST['id'])) {
            $IdCliente = intval($_POST['id']);
            $cliente = new cliente();
            $cliente->setIdCliente($IdCliente);

            $resultado = $cliente->eliminarcliente();

            if ($resultado === 1) {
                echo json_encode(["success" => "cliente eliminado"]);
            } else {
                echo json_encode(["error" => "No se pudo eliminar el cliente"]);
            }
        } else {
            echo json_encode(["error" => "Id del cliente no proporcionado"]);
        }
        break;
}
