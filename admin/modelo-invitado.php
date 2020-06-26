<?php

    if (isset($_POST['registro'])) {
        include_once 'functions/funciones.php';
        
        
        switch ($_POST['registro']) {
            
            
            case 'nuevo':
                // $respuesta = array (
                //     'post' => $_POST,
                //     'file' => $_FILES
                // );
                $nombre = $_POST['nombre_inv'];
                $apellido = $_POST['apellido_inv'];
                $bio = $_POST['bio_inv'];

                $directorio = "../img/invitados/";

                if (!is_dir($directorio)) {
                    mkdir($directorio, 0755, true);
                }

                if (move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])) {
                    $imagen_url = $_FILES['archivo_imagen']['name'];
                    $img_result = "Se subió correctamente";
                } else {
                    $respuesta = array (
                        'respuesta' => error_get_last()
                    );
                }
                
                try {
                    $stmt = $conn->prepare('INSERT INTO invitados (nombre_invitado, apellido_invitado, descripcion, url_imagen) VALUES (?, ?, ?, ?)');
                    $stmt->bind_param("ssss", $nombre, $apellido, $bio, $imagen_url);
                    $stmt->execute();
                    
                    $id_insertado = $stmt->insert_id;
                    if ($stmt->affected_rows > 0) {
                        $respuesta = array (
                            'respuesta' => 'exito',
                            'nombre' => $nombre,
                            'id_insertado' => $id_insertado,
                            'resultado_imagen' => $img_result
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
                $nombre = $_POST['nombre_inv'];
                $apellido = $_POST['apellido_inv'];
                $bio = $_POST['bio_inv'];

                $directorio = "../img/invitados/";

                if (!is_dir($directorio)) {
                    mkdir($directorio, 0755, true);
                }

                if (move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])) {
                    $imagen_url = $_FILES['archivo_imagen']['name'];
                    $img_result = "Se subió correctamente";
                } else {
                    $respuesta = array (
                        'respuesta' => error_get_last()
                    );
                }

                $id_registro = $_POST['id_registro'];

                try {
                    if ($_FILES['archivo_imagen']['size'] > 0) {
                        //Si actualiza imagen
                        $stmt = $conn->prepare('UPDATE invitados SET nombre_invitado = ?, apellido_invitado = ?, descripcion = ?, url_imagen = ? WHERE invitado_id = ?');
                        $stmt->bind_param("ssssi", $nombre, $apellido, $bio, $imagen_url, $id_registro);
                    } else {
                        //Si la imagen no cambia
                        $stmt = $conn->prepare('UPDATE invitados SET nombre_invitado = ?, apellido_invitado = ?, descripcion = ? WHERE invitado_id = ?');
                        $stmt->bind_param("sssi", $nombre, $apellido, $bio, $id_registro);
                    }

                    $stmt->execute();

                    $registros = $stmt->affected_rows;
                    
                    if ($registros > 0) {
                        $respuesta = array (
                            'respuesta' => 'correcto',
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
                    $stmt = $conn->prepare("DELETE FROM invitados WHERE invitado_id = ?");
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