<?php


include "../model/connect.php";



$id = $_GET['id_usuario'];
$imagem = $_GET['imagem'];
$dir = "../assets/avatar/";


$sql = "DELETE FROM usuario WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    if($imagem != null){
        unlink($dir.$imagem);
        $conn->close();
        header('Location:../view/exibirUsuarios.php');
    }
} else {
    echo "Error deleting record: " . $conn->error;
}





