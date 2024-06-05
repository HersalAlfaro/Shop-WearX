<?php
require_once '../Model/Empleado.php';
switch ($_GET["op"]) {

    case 'listaTabla':
        $empleado = new Empleado();
        $empleados = $empleado->listarEmpleados();
        // Prepara los datos para DataTables
        $data = array();
        foreach ($empleados as $reg) {
            $data[] = array(
                "0" => $reg->getcedula(),
                "1" =>  $reg->getNombreEmpleado(),
                "2" =>  $reg->getApellidoEmpleado(),
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

        $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : 0;
        $nombreEmpleado = isset($_POST["nombreEmpleado"]) ? trim($_POST["nombreEmpleado"]) : "";
        $apellidoEmpleado = isset($_POST["apellidoEmpleado"]) ? trim($_POST["apellidoEmpleado"]) : "";
        $segundoApEmpleado = isset($_POST["segundoApEmpleado"]) ? trim($_POST["segundoApEmpleado"]) : "";
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
        $rol = isset($_POST["rol"]) ? trim($_POST["rol"]) : "";
        $provincia = isset($_POST["provincia"]) ? trim($_POST["provincia"]) : "";
        $distrito = isset($_POST["distrito"]) ? trim($_POST["distrito"]) : "";
        $canton = isset($_POST["canton"]) ? trim($_POST["canton"]) : "";
        $otros = isset($_POST["otros"]) ? trim($_POST["otros"]) : "";


        $empleado = new Empleado();

        // Configura los atributos del objeto Empleado
        $empleado->setcedula($cedula);
        $empleado->setCorreo($correo);
        $encontrado = $empleado->verificarExistenciaEmpleado();
        if ($encontrado == false) {
            $empleado->setNombreEmpleado($nombreEmpleado);
            $empleado->setApellidoEmpleado($apellidoEmpleado);
            $empleado->setSegundoApEmpleado($segundoApEmpleado);
            $empleado->setGenero($genero);
            $empleado->setTelefono($telefono);
            $empleado->setContrasena($contrasena);
            $empleado->setRol($rol);
            $empleado->setProvincia($provincia);
            $empleado->setDistrito($distrito);
            $empleado->setCanton($canton);
            $empleado->setOtros($otros);
            $empleado->guardarEnDb();
            
            if ($empleado->verificarExistenciaEmpleado()) {
                echo 1;
            } else {
                echo 2;
            }
        } else {
            echo 3;
        }
        break;

    case 'verificar_existencia_empleado':
        $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : "";
        $correo = isset($_POST["correo"]) ? trim($_POST["correo"]) : "";
        $empleado->setCorreo($correo);
        $empleado->setcedula($cedula);
        $encontrado = $empleado->verificarExistenciaEmpleado();
        echo $encontrado ? 1 : 0;
        break;



    case 'editar':
        $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : "";
        $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : "";
        $apellido = isset($_POST["apellido"]) ? trim($_POST["apellido"]) : "";
        $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : "";
        if (strlen($telefono) != 8) {
            echo 'El teléfono debe tener exactamente 8 dígitos.';
            exit;
        }
        $rol = isset($_POST["rol"]) ? trim($_POST["rol"]) : "";
        $provincia = isset($_POST["provincia"]) ? trim($_POST["provincia"]) : "";
        $distrito = isset($_POST["distrito"]) ? trim($_POST["distrito"]) : "";
        $canton = isset($_POST["canton"]) ? trim($_POST["canton"]) : "";
        $otros = isset($_POST["otros"]) ? trim($_POST["otros"]) : "";

        $empleado = new Empleado();
        $empleado->setcedula($cedula);
        $empleado->setTelefono($telefono);
        $empleado->setCorreo($correo);
        $encontrado = $empleado->verificarExistenciaEmpleado();
        if ($encontrado == false) {
            $empleado->setNombreEmpleado($nombreEmpleado);
            $empleado->setApellidoEmpleado($apellidoEmpleado);
            $empleado->setSegundoApEmpleado($segundoApEmpleado);
            $empleado->setGenero($genero);
            $empleado->setContrasena($contrasena);
            $empleado->setRol($rol);
            $empleado->setProvincia($provincia);
            $empleado->setDistrito($distrito);
            $empleado->setCanton($canton);
            $empleado->setOtros($otros);

            if ($empleado->actualizarEmpleado()) {
                echo 1; //exito en la actualizacion
            } else {
                echo 2;  //Error al guardar en la base de datos
            }
        } else {
            echo 3; 
        }
        break;

    case 'obtener':
        if (isset($_GET['cedula'])) {
            $cedula = isset($_GET['cedula']) ? intval($_GET['cedula']) : null;
            $empleado = Empleado::obtenerEmpleadoPorcedula($cedula);

            if ($empleado) {
                echo json_encode($empleado);
            } else {
                echo json_encode(["error" => "No se encontró el empleado"]);
            }
        } else {
            echo json_encode(["error" => "cedula del empleado no proporcionada"]);
        }
        break;

    case 'eliminar':
        if (isset($_POST['ced'])) {
            $cedula = intval($_POST['ced']);
            $empleado = new empleado();
            $empleado->setcedula($cedula);

            $resultado = $empleado->eliminarempleado();

            if ($resultado === 1) {
                echo json_encode(["success" => "empleado eliminado"]);
            } else {
                echo json_encode(["error" => "No se pudo eliminar el empleado"]);
            }
        } else {
            echo json_encode(["error" => "cedula del empleado no proporcionado"]);
        }
        break;

    case 'cargarEmpleado':
        $empleadoModel = new Empleado();
        $empleados = $empleadoModel->obtenerEmpleado();
        echo json_encode($empleados);
        break;

}
