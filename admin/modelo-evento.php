<?php

    if (isset($_POST['registro'])) {
        include_once 'functions/funciones.php';
        $nombre = $_POST['nombre_evento'];
        $categoria = $_POST['categoria_evento'];
        $fech = $_POST['fecha_evento'];
        $fecha = date('Y-m-d', strtotime($fech));
        $hora = $_POST['hora_evento'];
        $invitado_id = $_POST['invitado'];

        switch ($_POST['registro']) {
            case 'nuevo':

                try {
                    $stmt = $conn->prepare('INSERT INTO evento (nombre_evento, fecha_evento, hora_evento, id_cat_evento, id_inv) VALUES (?, ?, ?, ?, ?)');
                    $stmt->bind_param("sssii", $nombre, $fecha, $hora, $categoria, $invitado_id);
                    $stmt->execute();
                    
                    $id_insertado = $stmt->insert_id;
                    if ($stmt->affected_rows > 0) {
                        $respuesta = array (
                            'respuesta' => 'exito-evnt',
                            'nombre' => $nombre,
                            'id_insertado' => $id_insertado
                        );
                    } else {
                        $respuesta = array (
                            'respuesta' => 'error'
                        );
                    }

                    $stmt->close();
                    $conn->close();
                } catch (Exception $e) {
                    $respuesta = array (
                        'respuesta' => $e->getMessage()
                    );
                }
                die(json_encode($respuesta));

                break;
            
            case 'actualizar':
                $id_registro = $_POST['id_registro'];

                try {
                    $stmt = $conn->prepare('UPDATE evento SET nombre_evento = ?, fecha_evento = ?, hora_evento = ?, id_cat_evento = ?, id_inv = ? WHERE evento_id = ?');
                    $stmt->bind_param("sssiii", $nombre, $fecha, $hora, $categoria, $invitado_id, $id_registro);
                    $stmt->execute();
                    
                    if ($stmt->affected_rows > 0) {
                        $respuesta = array (
                            'respuesta' => 'correcto-evnt',
                            'id_modif' => $id_registro
                        );
                    } else {
                        $respuesta = array (
                            'respuesta' => 'error'
                        );
                    }

                    $stmt->close();
                    $conn->close();
                } catch (Exception $e) {
                    $respuesta = array (
                        'respuesta' => $e->getMessage()
                    );
                }
                die(json_encode($respuesta));
                break;
            

            case 'eliminar':
                $id_borrar = $_POST['id'];

                try {
                    $stmt = $conn->prepare("DELETE FROM admins WHERE id_admin = ?");
                    $stmt->bind_param("i", $id_borrar);
                    $stmt->execute();

                    if ($stmt->affected_rows > 0) {
                        $respuesta = array (
                            'respuesta' => 'exito',
                            'id_eliminado' => $id_borrar
                        );
                    } else {
                        $respuesta = array (
                            'respuesta' => 'error'
                        );
                    }

                    $stmt->close();
                    $conn->close();
                } catch (Exception $e) {
                    $respuesta = array (
                        'respuesta' => $e->getMessage()
                    );
                }
                die(json_encode($respuesta));
                break;
            
            default:
                # code...
                break;
        }
        
    };
?>