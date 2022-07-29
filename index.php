<!DOCTYPE html>
<html lang="en" style="height:100%">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
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
                <a class="nav-item nav-link" href="ranking.php">Ranking</a>
                <a class="nav-item nav-link" href="sobre.php">Sobre</a>
            </div>
        </div>
    </nav>
    </div>

    <div class="container-fluid d-flex mt-5 justify-content-center align-items-center" style="flex-direction: column;height:100%">

        <?php

        include("connect.inc.php");

        //pega o id atual da pagina
        $pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);

        //estabelece quantos itens serão exibidos por pagina
        $itens_pagina = 5;

        //Caso o id da pagina esteja vazio, ele recebe 1, caso contrario recebe o id atual
        if (!$pagina) {
            $page_cont = "1";
        } else {
            $page_cont = $pagina;
        }
        //estabelece o numero de itens que serão exibidos e realiza a consulta ao banco utilizando LIMIT
        $inicio = $page_cont - 1;
        $inicio = $inicio * $itens_pagina;
        $sql = mysqli_query($conn, "SELECT n.Texto, u.Nome, n.Imagem, n.ID, u.Pontos FROM noticias as n
                                    INNER JOIN usuarios as u
                                    ON n.ID_Usuario = u.ID 
                                    ORDER BY n.ID DESC
                                    LIMIT $inicio, $itens_pagina "); //realiza uma consulta a partir do id do email



        $num_paginas = mysqli_query($conn, "SELECT * FROM noticias")->num_rows;  //pega o numero de noticias na tabela
        $num_final = ceil($num_paginas / $itens_pagina);       //arrendoda o valor 

        while ($tabela = mysqli_fetch_object($sql)) {

            // Exibi a foto
            echo "<div class='card shadow-sm bg-white rounded'><div class='card-body'><div class='row'><div class='col-5'><img style='width: 200px;height:200px'src='$tabela->Imagem"  . "' alt='Foto de exibição ' /></div><br />";
            echo "<div class='col-7'> <div style='white-space: nowrap; width: 20em; overflow: hidden; text-overflow: ellipsis'; >Texto da postagem: $tabela->Texto</div><br>";
            echo "</br>Autor: $tabela->Nome<br>";
            echo "</br>Pontos Na Rede: $tabela->Pontos<br>";
            echo "<div class='d-flex justify-content-center mt-4'><a id='meio' href='reacoesNoticias.php?id=$tabela->ID'>Ver Mais</a></div></div></div></div></div><br /><br />";
        }

        //Procedimentos para realizar a paginação
        $tp = $num_paginas / $itens_pagina; // verifica o número total de páginas

        $anterior = $page_cont - 1;
        $proximo = $page_cont + 1;
        $qnts_antes = 2;


        if ($page_cont != 1) {        //printa o link para direcionar a primeira pagina
            echo "<div class='container text-center'>
            <div class='row align-items-start'><div class='col'><a href='index.php?pagina=1'> <- Primeira </a></div>";
        }

        for ($page_ant = $page_cont - $qnts_antes; $page_ant <= $page_cont - 1; $page_ant++) {   //printa o link das paginas anteriores a atual

            if ($page_ant >= 1) {
                echo "<a href='?pagina=$page_ant'> $page_ant  </a>";
            }
        }

        echo " <a  <font face=\"Verdana\" \">$page_cont</font> </a>";   //identifica ao usuario a pagina em que ele se encontra


        for ($page_prox = $page_cont + 1; $page_prox <= $page_cont + $qnts_antes; $page_prox++) { //printa o link das paginas posteriores a atual

            if ($page_prox <= $num_final) {
                echo "<a href='?pagina=$page_prox'> $page_prox  </a>";
            }
        }

        if ($page_cont != $num_final) {   //printa o caminho para direcionar a ultima pagina
            echo " <a href='index.php?pagina=$num_final'> Ultima -> </a>";
        }


        ?>

    </div>

</body>

</html>