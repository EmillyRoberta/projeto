<!DOCTYPE html>
<html lang="en" style="height:100%">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleHome.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Insta Fake</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="index.php">Pagina Inicial <span class="sr-only">(Página atual)</span></a>
                <a class="nav-item nav-link" href="cadastroNoticias.php">Postar Noticia</a>
                <a class="nav-item nav-link" href="exibirNoticias.php">Editar Noticias</a>
                <a class="nav-item nav-link" href="editarPerfil.php">Editar Perfil</a>
                <a class="nav-item nav-link" href="listagem.service.php">Listagens</a>
                <a class="nav-item nav-link" href="sobre.php">Sobre</a>
            </div>
        </div>
    </nav>
    </div>

    <div class="container-fluid d-flex mt-5 justify-content-center align-items-center" style="flex-direction: column;height:100%">

        <?php

        include("connect.inc.php");

        session_start();

        $sql = mysqli_query($conn, "SELECT n.Texto, u.Nome, n.Imagem, n.ID, u.Pontos FROM noticias as n
                            INNER JOIN usuarios as u
                            ON n.ID_Usuario = u.ID 
                            ORDER BY n.ID DESC"); //realiza uma consulta a partir do id do email


        // Printa as informações da tabela
        while ($tabela = mysqli_fetch_object($sql)) {

            // Exibi a foto
            echo "<div class='card shadow-sm bg-white rounded'><div class='card-body'><div class='row'><div class='col-5'><img src='$tabela->Imagem"  . "' alt='Foto de exibição ' /></div><br />";
            echo "<div class='col-7'>Texto da postagem: $tabela->Texto<br>";
            echo "</br>Autor: $tabela->Nome<br>";
            echo "</br>Pontos Na Rede: $tabela->Pontos<br>";
            echo "<div class='d-flex justify-content-center mt-4'><a id='meio' href='reacoesNoticias.php?id=$tabela->ID'>Ver Mais</a></div></div></div></div></div><br /><br />";
        }
        ?>

    </div>

</body>

</html>