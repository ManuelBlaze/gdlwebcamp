<?php

    if (isset($_POST['agregar-admin'])) {
        $usuario = $_POST['usuario'];
        $nombre = $_POST['nombre'];
        $pass = $_POST['pass'];

        $opciones = array(
            'cost' => 12
        );

        $pass_hashed = password_hash($pass, PASSWORD_BCRYPT, $opciones);
    }

    try {
        include_once 'functions/funciones.php';

        $stmt = $conn->prepare("INSERT INTO admins (usuario, nombre, pass) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $usuario, $nombre, $pass);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        echo "Error: ". $e->getMessage();
    }

?>