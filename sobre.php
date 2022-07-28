<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/editarPerfil.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Sobre</title>
</head>

<body>
    <div class="container-fluid" style="padding:0">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">Insta Fake</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="index.php">Página Inicial <span class="sr-only">(Página atual)</span></a>
                    <a class="nav-item nav-link" href="cadastroNoticias.php">Postar Notícia</a>
                    <a class="nav-item nav-link" href="exibirNoticias.php">Editar Notícia</a>
                    <a class="nav-item nav-link" href="editarPerfil.php">Editar Perfil</a>
                    <a class="nav-item nav-link" href="listagem.service.php">Listagens</a>
                    <a class="nav-item nav-link" href="ranking.php">Ranking</a>
                    <a class="nav-item nav-link" href="sobre.php">Sobre</a>
                </div>
            </div>
        </nav>
    </div>

    <h1 style="color: white" ;>Sobre</h1>
    <h5 style="color: white" ;>Nome, matrícula e e-mail dos integrantes do grupo:</h5>
    <?php

    echo "<p>Matrícula: 5978<br>Nome: Emilly Roberta da Silva<br>E-mail: emilly.silva@ufv.br</p>";
    echo "<br><br>";
    echo "<p>Matrícula: 5960<br>Nome: Jeanluca Martins de Abreu<br>E-mail: jeanluca.abreu@ufv.br</p>";
    echo "<br><br>";
    echo "<p>Matrícula: 6020 <br>Nome: Gabriel Henrique Gontijo Basílio<br>E-mail: gabriel.basilio@ufv.br</p>";
    ?>
</body>

</html>