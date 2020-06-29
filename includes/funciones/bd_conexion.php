<?php
    $conn = new mysqli('us-cdbr-east-02.cleardb.com', 'bb14ee3795d3c4', '5f945347', 'heroku_6a7a2dea546ab70');

    if ($conn->connect_error) {
        echo $error -> $conn->connect_error;
    }

    $conn->set_charset('utf8');
?>







