<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/editarPerfil.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Sobre</title>
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(Página atual)</span></a>
                    <a class="nav-item nav-link" href="sobre.php">Sobre</a>
                    <a class="nav-item nav-link" href="#">Postar Noticia</a>
                    <a class="nav-item nav-link disabled" href="editarPerfil.php">Editar Perfil</a>
                    <a class="nav-item nav-link" href="listagem.service.php">Listagens</a>
                </div>
            </div>
        </nav>

        <h1>Sobre</h1>
        <h5>Nome, matrícula e e-mail dos integrantes do grupo:</h5>
<?php
    echo "Matrícula: 5978<br>Nome: Emilly Roberta da Silva<br>E-mail: emilly.silva@ufv.br";
    echo "<br><br>";
    echo "Matrícula: 5960<br>Nome: Jeanluca Martins de Abreu<br>E-mail: jeanluca.abreu@ufv.br";
    echo "<br><br>";
    echo "Matrícula: 6020 <br>Nome: Gabriel Henrique Gontijo Basílio<br>E-mail: gabriel.basilio@ufv.br";
?>
</body>
</html>