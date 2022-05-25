<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/boostrap.bundle.min.js"></script>

    <title>Login</title>
</head>

<body>

    <div class="container">
        <div class="pt-2">
            <div class="card bg-light">
                <div class="card-header bg-dark text-white">
                    <h1>Login</h1>
                </div>
                <div class="card-body">
                    <form method="post" action="#" enctype="multipart/form-data">

                        <div class="row g-3">
                            <div class="col-md "></div>
                            <div class="col-md">
                                <label for="inputEmail" class="form-label">Email</label>
                                <input type="email" name="email" placeholder="Informe Seu Email" id="inputEmail" class="form-control" required>
                            </div>
                            <div class="col-md"></div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md"></div>
                            <div class="col-md">
                                <label for="inputSenha" class="form-label">Senha</label>
                                <input type="password" name="senha" placeholder="Informe Sua Senha" id="inputSenha" class="form-control" required>
                            </div>
                            <div class="col-md"></div>
                        </div>




                        <div class="row g-3 pt-3">
                            <div class="col-md">
                                <button type="submit" class="btn btn-dark text-white float-end">Entrar</button>
                            </div>
                        </div>
                </div>

                <?php

                include "../model/connect.php";


                $email = isset($_POST['email']) ? $_POST['email'] : '';
                $senha = isset($_POST['senha']) ? $_POST['senha'] : '';


                if (isset($_POST['email']) && isset($_POST['senha'])) {
                    $sql = "SELECT senha, email FROM usuario WHERE email='$email' AND senha='$senha'";

                    $result = $conn->query($sql);



                    if ($result->num_rows === 1) {
                        
                        session_start();

                        $_SESSION['email'] = $email;


                        header("Location: formulario.php");
                    } else {
                        echo "Não foi possível logar, verifique usuário e senha!";
                    }
                }
                ?>
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