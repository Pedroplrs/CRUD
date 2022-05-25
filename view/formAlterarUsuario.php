<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/boostrap.bundle.min.js"></script>

    <?php



if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (isset($_SESSION['email'])) {
    echo $_SESSION['email'];
} else {

    unset($_SESSION['email']);
    header("Location: ../index.php");
}


?>


    <title>Alterar Usuário</title>
</head>

<body>
    <?php

    $id = $_GET['id_usuario'];
    



    include "../model/connect.php";

    
    $sql = "SELECT * FROM usuario WHERE id='$id'";

    
    
    $result = $conn->query($sql);



        if ($linha = $result->fetch_array()) {
        $id = $linha['id'];
        $nome = $linha['nome'];
        $email = $linha['email'];
        $senha = $linha['senha'];
        $sexo = $linha['sexo'];
        $telefone = $linha['telefone'];
        $nascimento = $linha['dtnasc'];
        $tipo = $linha['tipo'];
        $imagem = $linha['avatar'];
    }

    ?>

    <div class="container">
        <div class="pt-2">
            <div class="card bg-light">
                <div class="card-header bg-dark text-white">
                    <h1>Alterar usuário</h1>
                </div>
                <div class="card-body">
                    <form method="post" action="../model/alterarUsuario.php" enctype="multipart/form-data">

                        <div class="row">
                        
                            <div class="col-md-1">
                                <label for="inputId" class="form-label">ID</label>
                                <input type="text"
                                name="id"
                                id="inputId"
                                class="form-control"
                                readonly
                                value="<?= isset($id)? $id: ''?>"
                                >
                            </div>
                            <div class="col-md-11">
                                <label for="inputNome" class="form-label">Nome</label>
                                <input 
                                type="text" 
                                name="nome" 
                                id="inputNome" 
                                class="form-control" 
                                required
                                value="<?= isset($nome)? $nome: ''?>"
                                >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <label for="inputEmail" class="form-label">Email</label>
                                <input 
                                type="email" 
                                name="email" 
                                id="inputEmail" 
                                class="form-control" 
                                required
                                value="<?= isset($email)? $email: ''?>"
                                >
                            </div>
                            <div class="col-md-4">
                                <label for="inputSenha" class="form-label">Senha</label>
                                <input type="password" name="senha" id="inputSenha" class="form-control" required maxlength="16"
                                 minlength="8"
                                value="<?= isset($senha)? $senha: ''?>">
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="inputPhone" class="form-label">Telefone</label>
                                <input 
                                type="telefone" 
                                name="telefone" 
                                type="number" 
                                class="form-control" 
                                id="inputPhone" 
                                placeholder="(XX) XXXXX-XXXX" 
                                required maxlength="15"
                                minlength="11"                                required
                                value="<?= isset($telefone)? $telefone: ''?>"
                                >
                            </div>
                            <div class="col-md-4">
                                <label for="inputDate" class="form-label">Data de Nascimento</label>
                                <input 
                                name="dtnasc" 
                                type="date" 
                                class="form-control" 
                                id="inputDate" 
                                required
                                value="<?= isset($nascimento)? $nascimento: ''?>"
                                >
                            </div>
                            <div class="col-md-4">
                                <label for="inputSexo" class="form-label">Sexo</label>
                                <select name="sexo" class="form-select" id="inputSexo" aria-label="Default" required>
                                    <option selected></option>
                                    <option value="M" <?= $sexo == 'M'? 'selected': ''?> >Masculino</option>
                                    <option value="F" <?= $sexo == 'F'? 'selected': ''?> >Feminino</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="inputTipo" class="form-label">Tipo</label>
                                <select name="tipo" class="form-select" id="inputTipo" required>
                                    <option selected></option>
                                    <option value="ADM" <?=  $tipo == 'ADM'? 'selected': ''?> >Administrador</option>
                                    <option value="USU" <?=  $tipo == 'USU'? 'selected': ''?> >Usuário</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="formFile" class="form-label">Avatar</label>
                                <input name="avatar" type="file" id="formFile" class="form-control">
                            </div>
                        </div>
                        <div class="row g-3 pt-3">
                            <div class="col-11">
                                <button type="submit" class="btn btn-dark text-white float-end">Atualizar</button>
                            </div>
                            <div class="col-1">
                                <a href="exibirUsuarios.php" class="btn btn-dark text-white float-end">Listar</a>
                            </div>
                        </div>
                </div>

                </form>
            </div>
            <div class="card-footer bg-dark text-white">
                Autor: Aluno Pedro Luis
            </div>
        </div>
    </div>
    </div>




</body>

</html>