<?php

$titulo = $_POST['titulo'];
$texto = $_POST['texto'];
$idP =  $_POST['idP'];
$imagem = $_FILES['img'];


include("connect.inc.php");

$titulo = $_POST['titulo'];
$texto = $_POST['texto'];
$imagem = $_FILES['img'];


if (empty($imagem["name"])) {
    

    $sql = mysqli_query($conn, "UPDATE noticias 
            SET Titulo = '$titulo', Texto = '$texto'
            WHERE ID = $idP");
    echo "<p><font face=\"Verdana\"  color=\"#FFF\">Alteração realizada com sucesso</font></p>";

}

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


        $sql = mysqli_query($conn, "UPDATE noticias 
                                    SET Titulo = '$titulo', Texto = '$texto', Imagem = '$caminho_imagem'
                                    WHERE ID = $idP");

        //Caso não hajam erros, realiza a inserção da imagem/dados no banco  
        echo "<p><font face=\"Verdana\"  color=\"#FFF\">Alteração realizada com sucesso</font></p>";
    }
}

?>

