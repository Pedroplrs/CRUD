<?php
include "connect.php";

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$telefone = $_POST['telefone'];
$nascimento = $_POST['dtnasc'];
$sexo = $_POST['sexo'];
$tipo = $_POST['tipo'];
$imagem = $_POST['avatar'];



if ($_FILES['avatar']['name']) {
  if ($imagem !== "Sem uma imagem") {
    $dir = "../assets/avatar/"; // dir onde será salva a imagem
    unlink($dir . $imagem); //verifico se foi selecionado um arquivo
    $arr_ext = $_FILES['avatar']['name']; // retorna array de strings
    $separa = explode(".", $arr_ext);
    $ext = array_reverse($separa); // obtem a ext no indice 0 do array
    $avatar = strtolower($email . "." . $ext[0]);
    // mover o arquivo para o diretório
    $from = $_FILES['avatar']['tmp_name']; // arquivo em memória
    $to = $dir . $avatar; // caminho completo do arquivo
    if (move_uploaded_file($from, $to)) {   
      //echo "ok";
    } else {
      echo "error";
    }
  }
} else {
  //$avatar = null;
}



$result_nome = "UPDATE usuario SET nome = '$nome' WHERE id='$id'";
$result_email = "UPDATE usuario SET email = '$email' WHERE id='$id'";
$result_senha = "UPDATE usuario SET senha = '$senha' WHERE id='$id'";
$result_telefone = "UPDATE usuario SET telefone = '$telefone' WHERE id='$id'";
$result_nascimento = "UPDATE usuario SET dtnasc = '$nascimento' WHERE id='$id'";
$result_sexo = "UPDATE usuario SET sexo = '$sexo' WHERE id='$id'"; 
$result_tipo = "UPDATE usuario SET tipo = '$tipo' WHERE id='$id'";
$result_avatar = "UPDATE usuario SET avatar = '$imagem' WHERE id='$id'";

$resultado_nome = mysqli_query($conn, $result_nome);
$resultado_email = mysqli_query($conn, $result_email);
$resultado_senha = mysqli_query($conn, $result_senha);
$resultado_telefone = mysqli_query($conn, $result_telefone);
$resultado_nascimento = mysqli_query($conn, $result_nascimento);
$resultado_sexo = mysqli_query($conn, $result_sexo);
$resultado_tipo = mysqli_query($conn, $result_tipo);
$resultado_avatar = mysqli_query($conn, $result_avatar);



header('Location:../view/exibirUsuarios.php');
