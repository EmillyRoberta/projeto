<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body style="border:solid">
    <div class="container-fluid" style="padding:0">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(Página atual)</span></a>
                    <a class="nav-item nav-link" href="#">Sobre</a>
                    <a class="nav-item nav-link" href="cadastroNoticias.php">Postar Noticia</a>
                    <a class="nav-item nav-link" href="exibirNoticias.php">Editar Noticias</a>
                    <a class="nav-item nav-link disabled" href="editarPerfil.php">Editar Perfil</a>
                </div>
            </div>
        </nav>
    </div>

<?php

include("connect.inc.php");

session_start();

if (isset($_SESSION['id_email'])) {
    $email_id = $_SESSION['id_email'];
}



$sql = mysqli_query($conn, "SELECT n.ID, n.Titulo, n.Texto, n.Imagem FROM noticias as n
                            INNER JOIN usuarios as u
                            ON n.ID_Usuario = u.ID AND u.Email = '$email_id '"); //realiza uma consulta a partir do id do email


// Printa as informações da tabela
while ($tabela = mysqli_fetch_object($sql)) {

    echo "<p><br></br>Titulo da Noticia: $tabela->Titulo</p><br>";
    echo "<p>Descrição: $tabela->Texto</p><br>";
    // Exibi a foto
    echo "<p id='circle'><img src='$tabela->Imagem"  . "' alt='Foto de exibição ' /><br /></p>";
    echo "<p><a id='meio' href='edicaoNoticias.php?id=$tabela->ID'>Editar</a></p><br><br><br><br>";

}



?>















</body>

</html>