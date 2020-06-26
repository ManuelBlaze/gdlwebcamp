<?php

    if (isset($_POST['registro'])) {
        include_once 'functions/funciones.php';
        
        
        switch ($_POST['registro']) {
            case 'nuevo':
                $nombre = $_POST['nombre_categoria'];
                $icono = $_POST['icono_categoria'];
                
                try {
                    $stmt = $conn->prepare('INSERT INTO categoria_evento (cat_evento, icono) VALUES (?, ?)');
                    $stmt->bind_param("ss", $nombre, $icono);
                    $stmt->execute();
                    
                    $id_insertado = $stmt->insert_id;
                    if ($stmt->affected_rows > 0) {
                        $respuesta = array (
                            'respuesta' => 'exito-cat',
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
                $nombre = $_POST['nombre_categoria'];
                $icono = $_POST['icono_categoria'];

                $id_registro = $_POST['id_registro'];

                try {
                    $stmt = $conn->prepare('UPDATE categoria_evento SET cat_evento = ?, icono = ?, editado = NOW() WHERE id_categoria = ?');
                    $stmt->bind_param("ssi", $nombre, $icono, $id_registro);
                    $stmt->execute();
                    
                    if ($stmt->affected_rows > 0) {
                        $respuesta = array (
                            'respuesta' => 'correcto-cat',
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
                    $stmt = $conn->prepare("DELETE FROM categoria_evento WHERE id_categoria = ?");
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