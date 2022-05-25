<?php

include "../config/config.php";


$conn = new mysqli($hostname, $username, $password, $database);


if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}


if ($flag_exibir) {
    echo "<br> Conexão bem sucedida! <br>";
}
