<?php

/*
+----------+--------------+------+-----+-------------------+----------------+
| Field    | Type         | Null | Key | Default           | Extra          |
+----------+--------------+------+-----+-------------------+----------------+
| id       | int(11)      | NO   | PRI | NULL              | auto_increment |
| nome     | varchar(255) | YES  |     | NULL              |                |
| email    | varchar(255) | YES  | UNI | NULL              |                |
| sexo     | varchar(10)  | YES  |     | NULL              |                |
| telefone | varchar(25)  | YES  |     | NULL              |                |
| senha    | varchar(255) | YES  |     | NULL              |                |
| dtnasc   | varchar(25)  | YES  |     | NULL              |                |
| tipo     | varchar(25)  | YES  |     | NULL              |                |
| avatar   | varchar(255) | YES  |     | NULL              |                |
| data     | timestamp    | YES  |     | CURRENT_TIMESTAMP |                |
+----------+--------------+------+-----+-------------------+----------------+
*/

// inserir os dados do formulário na tabela usuário;
$nome = $_POST['nome'];
$email = $_POST['email'];
$sexo = $_POST['sexo'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];
$dtnasc = $_POST['dtnasc'];
$tipo = $_POST['tipo'];

// receber a imagem e salvar no diretório da aplicação
if($_FILES['avatar']['name']){ 
    $dir = "../assets/avatar/"; 
    $arr_ext = $_FILES['avatar']['name']; 
    $separa = explode(".", $arr_ext);
    $ext = array_reverse($separa); 
    $avatar = strtolower($email . "." . $ext[0]);
    // mover o arquivo para o diretório
    $from = $_FILES['avatar']['tmp_name']; // arquivo em memória
    $to = $dir . $avatar; // caminho completo do arquivo
	if(move_uploaded_file($from, $to)
        echo "ok";
    }else {
        echo "error";
    }


} else {
    $avatar = null;
}
// include do script de conexão com o banco de dados
include "connect.php";

//variavel da query
$sql = "INSERT INTO usuario (
        nome,
        email,
        sexo,
        telefone,   
        senha,
        dtnasc,
        tipo,
        avatar
    ) VALUES (
        '$nome',
        '$email',
        '$sexo',
        '$telefone',
        '$senha',
        '$dtnasc',
        '$tipo',
        '$avatar'
    )";



// realizar o insert de dados
$result = $conn->query($sql);

//testar se o cadastro foi feito com sucesso
if ($result) {
    header('Location:../view/exibirUsuarios.php');

} else {
    echo "Deu ruim no cadastro...";
}

//encerra a conexão com o banco de dados
$conn->close();
