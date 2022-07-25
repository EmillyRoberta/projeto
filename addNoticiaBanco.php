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
    </div>

</html>


<?php

include("connect.inc.php");

$titulo = $_POST['titulo'];
$texto = $_POST['texto'];
$imagem = $_FILES['img'];


if (!empty($imagem["name"])) {


    $larg = 1280;    // Largura máxima em pixels
    $alt = 720;    // Altura máxima em pixels
    $tam = 1000000;   // Tamanho máximo do arquivo em bytes


    $erros = array();
    // Verifica se o arquivo é uma imagem
    if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $imagem["type"])) {
        $erros[1] = "Isso não é uma imagem.";
    }

    $dimensoes = getimagesize($imagem["tmp_name"]);


    try {
        if (is_bool($dimensoes)) {
            throw new Exception('');
        } else {
            // Verifica se a imagem ultrapassa a largura exigida
            if ($dimensoes[0] > $larg) {
                $erros[2] = "A largura da imagem não deve ultrapassar " . $larg . " pixels";
            }
            // Verifica se a imagem ultrapassa a altura exigida
            if ($dimensoes[1] > $alt) {
                $erros[3] = "Altura da imagem não deve ultrapassar " . $alt . " pixels";
            }

            // Verifica se a imagem possui o tamanho exigido
            if ($imagem["size"] > $tam) {
                $erros[4] = "A imagem deve ter no máximo " . $tam . " bytes";
            }
        }
    } catch (Exception $ex) {
        $erros[1] = "Isso não é uma imagem.";
    }


    // caso não haja erros
    if (count($erros) == 0) {

        // Pega extensão da imagem
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);
        // atribui um nome para a imagem
        $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
        // especifica o caminho onde a imagem será armazenada
        $caminho_imagem = "img/" . $nome_imagem;
        // Realiza o upload para o caminho especificado
        move_uploaded_file($imagem["tmp_name"], $caminho_imagem);
    }


    // Caso haja erros, os mesmos são exibidos na tela 
    if (count($erros) != 0) {
        foreach ($erros as $err) {
            echo "<p><font face=\"Verdana\"  color=\"#FFF\">$err</font></p>";
        }
    } else {

        session_start();

        if (isset($_SESSION['id_email'])) {

            $email_id = $_SESSION['id_email'];

            $sql = "SELECT ID FROM usuarios 
            WHERE Email='$email_id'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                    $id_user = $row["ID"];
                }

                echo ($id_user);
            }
        }

        //Caso não hajam erros, realiza a inserção da imagem/dados no banco  
        $operacao = mysqli_query($conn, "INSERT INTO noticias (Titulo, Texto, Imagem, ID_Usuario, Fake) VALUES ('$titulo', '$texto', '$caminho_imagem', $id_user, '0')");
        echo "<p><font face=\"Verdana\"  color=\"#FFF\">Inserção realizada com sucesso</font></p>";
    }
}


?>