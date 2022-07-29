<!DOCTYPE html>
<html lang="en" style="height: 100%;">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleList.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Ranking</title>
</head>

<body>
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

    <div class="container-fluid d-flex justify-content-center align-items-center" style="height:100%">
        <div class="card shadow-sm bg-white rounded mt-5">
            <div class="card-body">
                <h1 style="text-align: center">Ranking 👑</h1></br>
                <table class="table" style="text-align:center">
                    <thead>
                        <tr>
                            <th scope="col">Posição</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col">Pontuação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("connect.inc.php");

                        $pagina_atual = filter_input(INPUT_GET, "page", FILTER_SANITIZE_NUMBER_INT);

                        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

                        $limite_resultado = 30;

                        $inicio = ($limite_resultado * $pagina) - $limite_resultado;


                        $query_ranking = "SELECT Nome, Email, Pontos FROM usuarios ORDER BY Pontos DESC LIMIT $inicio, $limite_resultado";
                        $result_query = $conn->query($query_ranking);

                        $position = 0;

                        if (($result_query) and ($result_query->num_rows != 0)) {
                            while ($ranking = $result_query->fetch_assoc()) {
                                $position = $position + 1;
                                extract($ranking);
                                echo "<tr>";
                                echo "<th scope='row'>$position</th>";
                                echo "<td>$Nome</td>";
                                echo "<td>$Email</td>";
                                echo "<td>$Pontos</td>";
                                echo "</tr>";
                            }

                            echo "</tbody></table>";
                            echo "</br>";
                            echo "</br>";

                            //quantidade de registros no bd
                            $quantidade_reg = "SELECT COUNT(Id) AS num_result FROM noticias";
                            $result_quantidade_reg = $conn->query($quantidade_reg);
                            $row_quantidade_reg = $result_quantidade_reg->fetch_assoc();

                            //quantidade de pagina
                            $quantidade_pag = ceil($row_quantidade_reg['num_result'] / $limite_resultado);

                            $total = 2; //maximo link

                            echo "<div style='text-align: center;'><a href='ranking.php?page=1' style='text-decoration:none;color:#D719DE;background-color:#ebebeb'>Primeira</a> ";

                            for ($pagina_anterior =  $pagina - $total; $pagina_anterior <= $pagina - 1; $pagina_anterior++) {
                                if ($pagina_anterior >= 1) {
                                    echo "<a href='ranking.php?page=$pagina_anterior' style='text-decoration:none;color:#D719DE;background-color:#ebebeb'>$pagina_anterior&nbsp&nbsp </a> ";
                                }
                            }
                            echo "<a href='#' style='text-decoration:none;color:#D719DE;background-color:#ebebeb'>$pagina</a>";

                            for ($proxima_pagina = $pagina + 1; $proxima_pagina <= $pagina + $total; $proxima_pagina++) {
                                if ($proxima_pagina <= $quantidade_pag) {
                                    echo "<a href='ranking.php?page=$proxima_pagina' style='text-decoration:none;color:#D719DE;background-color:#ebebeb'>&nbsp$proxima_pagina&nbsp</a> ";
                                }
                            }

                            echo "<a href='ranking.php?page=$quantidade_pag' style='text-decoration:none;color:#D719DE;background-color:#ebebeb'> Última</a> </div>";
                        } else {
                            echo ("nenhum evento cadastrado");
                        }

                        ?>

            </div>
        </div>

    </div>

</body>

</html>

</body>

</html>