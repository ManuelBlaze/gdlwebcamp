<?php
    $conn = new mysqli('localhost', 'root', 'root', 'glowebcamp');

    if ($conn->connect_error) {
        echo $error -> $conn->connect_error;
    }
?>