<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

</html>

<?php
include("connect.inc.php");

$IDNoticia = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT); //captura o id do evento passado pelo href
$reacao = filter_input(INPUT_GET, "reac", FILTER_SANITIZE_NUMBER_INT); //captura o id do evento passado pelo href


$sql = mysqli_query($conn, "SELECT ID_Usuario FROM noticias 
                            WHERE ID = $IDNoticia"); //realiza uma consulta a partir do id do email


// Printa as informações da tabela
while ($tabela = mysqli_fetch_object($sql)) {
    $userID = $tabela->ID_Usuario;
}


if ($reacao == 0) {
    $sql = mysqli_query($conn, "UPDATE usuarios 
                                SET Pontos = Pontos + 1
                                WHERE ID = $userID");
}

if ($reacao == 1) {
    $sql = mysqli_query($conn, "UPDATE usuarios 
                                    SET Pontos = Pontos - 2
                                    WHERE ID = $userID");
}

if ($reacao == 2) {
    $sql = mysqli_query($conn, "UPDATE usuarios 
                                    SET Pontos = Pontos - 4
                                    WHERE ID = $userID");

    $sql2 = mysqli_query($conn, "UPDATE noticias 
                                 SET Fake = 1
                                 WHERE ID = $IDNoticia");
}

echo ("<p>Reação Computada com Sucesso</p>");
echo "<p><a  href='reacoesNoticias.php?id=$IDNoticia'>Voltar</a></p><br><br><br><br>";

?>