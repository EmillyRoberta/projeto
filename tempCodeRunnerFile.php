<?php
include("connect.inc.php");
session_start();
if (isset($_SESSION['id_email'])) {
    $email = $_SESSION['id_email'];

    $consulta = "SELECT * FROM usuarios WHERE Email = '$email'";
    $result = $conn->query($consulta);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome = $row['Nome'];
        $email = $row['Email'];
    }
} else {
    echo ('deu ruim');
}

?>

<script>
    function validaCadastro() {
        if (document.getElementById("nome").value === "" || document.getElementById("email").value === "") {
            alert('Por favor, preencha todos os campos obrigatórios');
            return false
        }
    }
</script>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/editarPerfil.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Editar Perfil</title>
</head>

<body>
    <div class="container-fluid d-flex pr-0 pl-0" style="height:100%;flex-direction: column;">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(Página atual)</span></a>
<<<<<<< HEAD
                    <a class="nav-item nav-link" href="#">Sobre</a>
                    <a class="nav-item nav-link" href="cadastroNoticias.php">Postar Noticia</a>
                    <a class="nav-item nav-link" href="exibirNoticias.php">Editar Noticias</a>
=======
                    <a class="nav-item nav-link" href="sobre.php">Sobre</a>
                    <a class="nav-item nav-link" href="#">Postar Noticia</a>
                
>>>>>>> 8e1b124821cc154a53cac3486a5a7dbcc7573550
                    <a class="nav-item nav-link disabled" href="editarPerfil.php">Editar Perfil</a>
                    <a class="nav-item nav-link" href="listagem.service.php">Listagens</a>
                </div>
            </div>
        </nav>

        <div class="container-fluid d-flex justify-content-center align-items-center" style="height:100%">
            <div class="card shadow-sm bg-white rounded">
                <div class="card-body">
                    <h1>Editar Perfil</h1>
                    <p><?php

                        if (isset($_SESSION['mensagem'])) {
                            echo $_SESSION['mensagem'];
                            unset($_SESSION['mensagem']);
                        } ?>
                    </p>
                    <hr>
                    <form method="GET" action="editarPerfil.service.php" enctype="multipart/form-data" onsubmit="return validaCadastro(this)">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Seu nome" value="<?php echo $nome; ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Endereço de email</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Seu email" value="<?php echo $email; ?>">

                        </div>

                        <div class="d-flex justify-content-end mt-5"><button type="submit" class="btn btn-primary">Salvar</button></div>

                    </form>
                </div>
            </div>

        </div>

</body>

</html>