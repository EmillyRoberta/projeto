<?php
$idN = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT); //captura o id do evento passado pelo href

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body style="border:solid">
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
                <a class="nav-item nav-link disabled" href="editarPerfil.php">Editar Perfil</a>
                <a class="nav-item nav-link" href="listagem.service.php">Listagens</a>
                <a class="nav-item nav-link" href="sobre.php">Sobre</a>
            </div>
        </div>
    </nav>
    </div>

</body>

</html>


<?php

include("connect.inc.php");

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT); //captura o id do evento passado pelo href


$sql = mysqli_query($conn, "SELECT n.Titulo, n.Texto, u.Nome, n.Imagem, n.ID, u.Pontos FROM noticias as n
                            INNER JOIN usuarios as u
                            ON n.ID = $id "); //realiza uma consulta a partir do id do email


// Printa as informações da tabela
while ($tabela = mysqli_fetch_object($sql)) {

    echo ("<br></br>");
    echo "<h6 id='circle'><img src='$tabela->Imagem"  . "' alt='Foto de exibição ' /><br /></h6>";
    echo "<p><br></br>Titulo da postagem: $tabela->Titulo</p>";
    echo "<p>Texto da postagem: $tabela->Texto</p>";
    echo "<p><br>Autor: $tabela->Nome</p>";
    echo "<p>Pontos Na Rede: $tabela->Pontos</p><br>";

    echo "<a href='contabilizaReacao.php?reac=0&id=$idN' ><img src='img/buttons/like.png"  . "' </a>";
    echo "<a href='contabilizaReacao.php?reac=1&id=$idN'><img src='img/buttons/dislike.png"  . "' alt='Foto de exibição ' <p/>";
    echo "<a href='contabilizaReacao.php?reac=2&id=$idN'><img src='img/buttons/fake.png"  . "' alt='Foto de exibição ' <p/><br />";
    echo "<p><a id='meio' href='edicaoNoticias.php?id=$tabela->ID'>Voltar</a></p><br><br><br><br>";
}
?>