<?php
    if (isset($_POST['login-admin'])) {
        $usuario = $_POST['usuario'];
        $pass = $_POST['pass'];

        try {
            include_once 'functions/funciones.php';

            $stmt = $conn->prepare("SELECT * FROM admins WHERE usuario = ?");
            $stmt->bind_param("s", $usuario);
            $stmt->execute();

            $stmt->bind_result($id_admin, $usuario_admin, $nombre_admin, $pass_admin, $editado);
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