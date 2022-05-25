<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/boostrap.bundle.min.js"></script>

    <title>Cadastro de Usuários</title>
</head>

<body>

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

    <div class="container">
        <div class="pt-2">
            <div class="card bg-light">
                <div class="card-header bg-dark text-white">
                    <div class="row">
                        <div class="col-md-8">
                            <h1>Cadastro de usuários</h1>
                        </div>
                        <div class="col-md"> <a href="../model/sair.php" class="btn btn-dark text-white float-end border border-white">Sair</a></div>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <form method="post" action="../model/cadastrarUsuario.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="inputNome" class="form-label">Nome</label>
                            <input type="text" name="nome" id="inputNome" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" name="email" id="inputEmail" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputSenha" class="form-label">Senha</label>
                            <input type="password" name="senha" id="inputSenha" class="form-control" required maxlength="16" minlength="8">
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="inputPhone" class="form-label">Telefone</label>
                            <input type="tel" name="telefone" type="tel" class="form-control" id="inputPhone" placeholder="(XX) XXXXX-XXXX" required maxlength="15" minlength="11">
                        </div>
                        <div class="col-md-4">
                            <label for="inputDate" class="form-label">Data de Nascimento</label>
                            <input name="dtnasc" type="date" class="form-control" id="inputDate" required>
                        </div>
                        <div class="col-md-4">
                            <label for="inputSexo" class="form-label">Sexo</label>
                            <select name="sexo" class="form-select" id="inputSexo" aria-label="Default" required>
                                <option selected></option>
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="inputTipo" class="form-label">Tipo</label>
                            <select name="tipo" class="form-select" id="inputTipo" required>
                                <option selected></option>
                                <option value="ADM">Administrador</option>
                                <option value="USU">Usuário</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Avatar</label>
                            <input name="avatar" type="file" class="form-control">
                        </div>
                    </div>
                    <div class="row g-3 pt-3">
                        <div class="col-11">
                            <button type="submit" class="btn btn-dark text-white float-end">Cadastrar</button>
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