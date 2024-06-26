<?php
require_once '../Model/Cliente.php';
switch ($_GET["op"]) {

    case 'listaTabla':
        $cliente = new Cliente();
        $clientes = $cliente->listarClientes();
        // Prepara los datos para DataTables
        $data = array();
        foreach ($clientes as $reg) {
            $data[] = array(
                "0" => $reg->getCedula(),
                "1" =>  $reg->getNombreCliente(),
                "2" =>  $reg->getApellidoCliente(),
                "3" =>  $reg->getCorreo()
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

        $Cedula = isset($_POST["Cedula"]) ? trim($_POST["Cedula"]) : 0;
        $nombreCliente = isset($_POST["nombreCliente"]) ? trim($_POST["nombreCliente"]) : "";
        $apellidoCliente = isset($_POST["apellidoCliente"]) ? trim($_POST["apellidoCliente"]) : "";
        $segundoApCliente = isset($_POST["segundoApCliente"]) ? trim($_POST["segundoApCliente"]) : "";
        $genero = isset($_POST["genero"]) ? trim($_POST["genero"]) : "";
        $correo = isset($_POST["correo"]) ? trim($_POST["correo"]) : "";

        $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : "";
        if (strlen($contrasena) < 8) {
            echo 'La contraseña debe tener al menos 8 caracteres.';
            exit;
        }
        $contrasena = hash('SHA256', $contrasena);

        $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) :  "";
        if (strlen($telefono) != 8) {
            echo 'El teléfono debe tener exactamente 8 dígitos.';
            exit;
        }
        $tipoCliente = isset($_POST["tipoCliente"]) ? trim($_POST["tipoCliente"]) : "";
        $provincia = isset($_POST["provincia"]) ? trim($_POST["provincia"]) : "";
        $distrito = isset($_POST["distrito"]) ? trim($_POST["distrito"]) : "";
        $canton = isset($_POST["canton"]) ? trim($_POST["canton"]) : "";
        $otros = isset($_POST["otros"]) ? trim($_POST["otros"]) : "";


        $cliente = new Cliente();

        // Configura los atributos del objeto Cliente
        $cliente->setCedula($Cedula);
        $cliente->setCorreo($correo);
        $encontrado = $cliente->verificarExistenciaCliente();
        if ($encontrado == false) {
            $cliente->setNombreCliente($nombreCliente);
            $cliente->setApellidoCliente($apellidoCliente);
            $cliente->setSegundoApCliente($segundoApCliente);
            $cliente->setGenero($genero);
            $cliente->setTelefono($telefono);
            $cliente->setContrasena($contrasena);
            $cliente->setTipoCliente($tipoCliente);
            $cliente->setProvincia($provincia);
            $cliente->setDistrito($distrito);
            $cliente->setCanton($canton);
            $cliente->setOtros($otros);
            $cliente->guardarEnDb();

            if ($cliente->verificarExistenciaCliente()) {
                echo 1;
            } else {
                echo 2;
            }
        } else {
            echo 3;
        }
        break;

    case 'verificar_existencia_cliente':
        $Cedula = isset($_POST["Cedula"]) ? trim($_POST["Cedula"]) : "";
        $correo = isset($_POST["correo"]) ? trim($_POST["correo"]) : "";
        $cliente->setCorreo($correo);
        $cliente->setCedula($Cedula);
        $encontrado = $cliente->verificarExistenciaCliente();
        echo $encontrado ? 1 : 0;
        break;

    case 'editar':
        $nombreCliente = isset($_POST["EnombreCliente"]) ? trim($_POST["EnombreCliente"]) : "";
        $apellidoCliente = isset($_POST["EapellidoCliente"]) ? trim($_POST["EapellidoCliente"]) : "";
        $segundoApCliente = isset($_POST["EsegundoApCliente"]) ? trim($_POST["EsegundoApCliente"]) : "";
        $genero = isset($_POST["Egenero"]) ? trim($_POST["Egenero"]) : "";
        $correo = isset($_POST["Ecorreo"]) ? trim($_POST["Ecorreo"]) : "";



        $telefono = isset($_POST["Etelefono"]) ? trim($_POST["Etelefono"]) :  "";
        if (strlen($telefono) != 8) {
            echo 'El teléfono debe tener exactamente 8 dígitos.';
            exit;
        }
        $tipoCliente = isset($_POST["EtipoCliente"]) ? trim($_POST["EtipoCliente"]) : "";
        $provincia = isset($_POST["Eprovincia"]) ? trim($_POST["Eprovincia"]) : "";
        $distrito = isset($_POST["Edistrito"]) ? trim($_POST["Edistrito"]) : "";
        $canton = isset($_POST["Ecanton"]) ? trim($_POST["Ecanton"]) : "";
        $otros = isset($_POST["Eotros"]) ? trim($_POST["Eotros"]) : "";

        $cliente = new Cliente();
        $cliente->setCorreo($correo);
        $encontrado = $cliente->verificarExistenciaCliente();
        if ($encontrado == false) {
            $cliente->setNombreCliente($nombreCliente);
            $cliente->setApellidoCliente($apellidoCliente);
            $cliente->setSegundoApCliente($segundoApCliente);
            $cliente->setGenero($genero);
            $cliente->setTelefono($telefono);
            $cliente->setContrasena($contrasena);
            $cliente->setTipoCliente($tipoCliente);
            $cliente->setProvincia($provincia);
            $cliente->setDistrito($distrito);
            $cliente->setCanton($canton);
            $cliente->setOtros($otros);
            
            if ($cliente->actualizarCliente()) {
                echo 1; //exito en la actualizacion
            } else {
                echo 2;  //Error al guardar en la base de datos
            }
        } else {
            echo 3;
        }
        break;

    case 'cargarCliente':
        $clienteModel = new Cliente();
        $clientes = $clienteModel->obtenerCliente();
        echo json_encode($clientes);
        break;

    case 'obtenerClientePorCedula':
        if (isset($_POST['Cedula'])) {
            $Cedula = intval($_POST['Cedula']);
            $cliente = new Cliente(); // Crear una instancia de la clase Producto
            $clienteEncontrado = $cliente->obtenerClientePorCedula($Cedula); // Obtener el cliente por su cedula

            if ($clienteEncontrado) {
                echo json_encode($clienteEncontrado);
            } else {
                echo json_encode(["error" => "No se encontró el cliente"]);
            }
        } else {
            echo json_encode(["error" => "Cedula del cliente no proporcionado"]);
        }
        break;

    case 'eliminar':
        if (isset($_POST['ced'])) {
            $Cedula = intval($_POST['ced']);
            $cliente = new cliente();
            $cliente->setCedula($Cedula);

            $resultado = $cliente->eliminarcliente();

            if ($resultado === 1) {
                echo json_encode(["success" => "cliente eliminado"]);
            } else {
                echo json_encode(["error" => "No se pudo eliminar el cliente"]);
            }
        } else {
            echo json_encode(["error" => "Cedula del cliente no proporcionado"]);
        }
        break;
}
