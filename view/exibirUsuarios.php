<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/boostrap.bundle.min.js"></script>
</head>

<body>
    <!--
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
-->
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
                            <h1>Lista de usuários</h1>
                        </div>
                        <div class="col-md"> <a href="../model/sair.php" class="btn btn-dark text-white float-end border border-white">Sair</a></div>
                    </div>
                </div>




                <div class="card-body">
                    <!-- Adcionar um form -->
                    <form method="POST" action="#">
                        <div class="row pb-3">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-6">
                                <input name="pesq" type="search" class="form-control" id="inputPesq" value="<?= isset($_POST['pesq']) ? $_POST['pesq'] : "" ?>">
                            </div>
                            <div class="col" -md-4>
                                <button type="submit" class="btn btn-dark text-white">Pesquisar por Nome</button>

                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table align-middle table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">NOME</th>
                                        <th scope="col">EMAIL</th>
                                        <th scope="col">SEXO</th>
                                        <th scope="col">TELEFONE</th>
                                        <th scope="col">NASCIMENTO</th>
                                        <th scope="col">TIPO</th>
                                        <th scope="col">AÇÃO</th>
                                    </tr>
                                </thead>
                                <tbody>




                                    <?php



                                    include "../model/connect.php";

                                    $nomePesq = isset($_POST['pesq']) ? $_POST['pesq'] : "";

                                    $sql = "SELECT * FROM usuario WHERE nome LIKE '%$nomePesq%'";

                                    // buscar no banco de dados por meio da query select
                                    // para isso usamos o objeto de conexão e o método query()

                                    $result = $conn->query($sql);

                                    // montar a lista na tabela
                                    // enquanto o fetch array possui registros ele retorna TRUE e quando ele termina FALSE
                                    //while ($linha = mysqli_fetch_array($result)) {

                                    while ($linha = $result->fetch_array()) {
                                        $id = $linha['id'];
                                        $nome = $linha['1'];
                                        $email = $linha['2'];
                                        $sexo = $linha['3'];
                                        $telefone = $linha['4'];
                                        // formatar a data a ser exibida
                                        //$nascimento = $linha['6'];
                                        $date = date_create($linha['dtnasc']);
                                        $nascimento = date_format($date, "d/m/Y");
                                        $tipo = $linha['7'];
                                        $imagem = $linha['8'];

                                        // montar a tabela
                                        $html = <<<HTML
                            
                        <tr>
                        <td>$id</td>
                        <td>$nome</td>
                        <td>$email</td>
                        <td>$sexo</td>
                        <td>$telefone</td>
                        <td>$nascimento</td>
                        <td>$tipo</td>
                        <td>
                            <a href="formAlterarUsuario.php?id_usuario=$id" class="text-decoration-none">
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                width="16px" height="16px" viewBox="0 0 528.899 528.899" style="enable-background:new 0 0 528.899 528.899;"
                                xml:space="preserve">
                                <path d="M328.883,89.125l107.59,107.589l-272.34,272.34L56.604,361.465L328.883,89.125z M518.113,63.177l-47.981-47.981
                                    c-18.543-18.543-48.653-18.543-67.259,0l-45.961,45.961l107.59,107.59l53.611-53.611
                                    C532.495,100.753,532.495,77.559,518.113,63.177z M0.3,512.69c-1.958,8.812,5.998,16.708,14.811,14.565l119.891-29.069
                                    L27.473,390.597L0.3,512.69z"/>
                                </svg>
                                </a>
                                
                                <a href='../model/excluirUsuario.php?id_usuario=$id&imagem=$imagem' class='text-decoration-none'>
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    width="16px" height="16px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                
                                <path d="M432,96h-48V32c0-17.672-14.328-32-32-32H160c-17.672,0-32,14.328-32,32v64H80c-17.672,0-32,14.328-32,32v32h416v-32
                                    C464,110.328,449.672,96,432,96z M192,96V64h128v32H192z"/>
                                <path d="M80,480.004C80,497.676,94.324,512,111.996,512h288.012C417.676,512,432,497.676,432,480.008v-0.004V192H80V480.004z
                                    M320,272c0-8.836,7.164-16,16-16s16,7.164,16,16v160c0,8.836-7.164,16-16,16s-16-7.164-16-16V272z M240,272
                                    c0-8.836,7.164-16,16-16s16,7.164,16,16v160c0,8.836-7.164,16-16,16s-16-7.164-16-16V272z M160,272c0-8.836,7.164-16,16-16
                                    s16,7.164,16,16v160c0,8.836-7.164,16-16,16s-16-7.164-16-16V272z"/>
                                    </svg>
                                </a>
                                
                            
                        </td>
                        </tr>

HTML;
                                        echo $html;
                                    }

                                    $result->free_result();

                                    $conn->close();




                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </form>

                    <div class="row g-3 pt-3">
                        <div class="col-md pb-2">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="formulario.php" class="btn btn-dark text-white float-end">Voltar</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container card-footer bg-dark text-white">
                    Autor: Aluno Pedro Luis
                </div>
            </div>
        </div>







</body>

</html>