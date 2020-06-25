<?php

    if (isset($_POST['agregar-admin'])) {
        $usuario = $_POST['usuario'];
        $nombre = $_POST['nombre'];
        $pass = $_POST['pass'];

        $opciones = array(
            'cost' => 12
        );

        $pass_hashed = password_hash($pass, PASSWORD_BCRYPT, $opciones);
        try {
            include_once 'functions/funciones.php';

            $stmt = $conn->prepare("INSERT INTO admins (usuario, nombre, pass) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $usuario, $nombre, $pass_hashed);
            $stmt->execute();
            $id_registro = $stmt->insert_id;

            if ($stmt->affected_rows > 0) {
                $respuesta = array (
                    'respuesta' => 'exito',
                    'id_admin' => $id_registro,
                    'nombre' => $nombre
                );
                
            } else {
                $respuesta = array (
                    'respuesta' => 'error',
                    'user' => $usuario
                );
            }

            $stmt->close();
            $conn->close();
        } catch (Exception $e) {
            echo "Error: ". $e->getMessage();
        }

        die(json_encode($respuesta));
    };

    if (isset($_POST['login-admin'])) {
        $usuario = $_POST['usuario'];
        $pass = $_POST['pass'];

        try {
            include_once 'functions/funciones.php';

            $stmt = $conn->prepare("SELECT * FROM admins WHERE usuario = ?");
            $stmt->bind_param("s", $usuario);
            $stmt->execute();

            $stmt->bind_result($id_admin, $usuario_admin, $nombre_admin, $pass_admin);
            if ($stmt->affected_rows) {
                $existe = $stmt->fetch();
                if ($existe) {
                    if (password_verify($pass, $pass_admin)) {
                        
                        session_start();
                        $_SESSION['usuario'] = $usuario_admin;
                        $_SESSION['nombre'] = $nombre_admin;

                        $respuesta = array (
                            'respuesta' => 'exitoso',
                            'usuario' => $nombre_admin
                        );
                    } else {
                        $respuesta = array (
                            'respuesta' => 'incorrecto'
                        );
                    }
                } else {
                    $respuesta = array (
                        'respuesta' => 'incorrecto'
                    );
                }
            }

            $stmt->close();
            $conn->close();
        } catch (Exception $e) {
            echo "Error: ". $e->getMessage();
        }

        die(json_encode($respuesta));
    }

?>