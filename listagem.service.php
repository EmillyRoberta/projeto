<!DOCTYPE html>
<html style="height:100%;" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/listagem.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>listagem</title>
</head>

<body>
    <?php
    session_start();
    include('connect.inc.php');
    $ID = filter_input(INPUT_GET, 'ID', FILTER_SANITIZE_NUMBER_INT);
    $usuariosSQL = "SELECT * FROM usuarios ORDER BY ID DESC";
    $noticiasSQL = "SELECT * FROM noticias ORDER BY ID DESC";
    $rankingSQL = "SELECT ID, Pontos FROM usuarios ORDER BY ID";
    $fakeSQL = "SELECT Titulo, Fake FROM noticias ORDER BY ID DESC";
    $usuarios = $conn->query($usuariosSQL);
    $noticias = $conn->query($noticiasSQL);
    $noticiasRanking = $conn->query($rankingSQL);
    $noticiasFake = $conn->query($fakeSQL);

    ?>
    <div class="container-fluid d-flex pr-0 pl-0" style="height:100%;flex-direction: column;">
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

    <div class="container-fluid d-flex justify-content-center align-items-center" style="height:100%">
        <div class="card shadow-sm bg-white rounded mt-5" style=" width: 700px;">
            <h1 style="text-align: center;margin-top:30px;margin-bottom:30px">Listagens (Relatórios)</h1>
            <hr>

            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-usuario" type="button" role="tab" aria-controls="nav-home" aria-selected="true" style="color: #da18e0">Usuários</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-noticias" type="button" role="tab" aria-controls="nav-profile" aria-selected="false" style="color: #da18e0">Notícias</button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-ranking" type="button" role="tab" aria-controls="nav-contact" aria-selected="false" style="color: #da18e0">Ranking</button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-fakenews" type="button" role="tab" aria-controls="nav-profile" aria-selected="false" style="color: #da18e0">Fake News</button>

                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-usuario" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                    <div>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Pontos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($dataa = mysqli_fetch_assoc($usuarios)) {
                                    echo "<tr>";
                                    echo "<th scope='row'>" . $dataa['ID'] . "</th>";
                                    echo "<td>" . $dataa['Nome'] . "</td>";
                                    echo "<td>" . $dataa['Email'] . "</td>";
                                    echo "<td>" . $dataa['Pontos'] . "</td>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-noticias" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                    <div>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">Titulo</th>
                                    <th scope="col">Texto</th>
                                    <th scope="col">Id_Usuario</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($dataa = mysqli_fetch_assoc($noticias)) {
                                    echo "<tr>";
                                    echo "<td>" . $dataa['Titulo'] . "</td>";
                                    echo "<td>" . $dataa['Texto'] . "</td>";
                                    echo "<th scope='row'>" . $dataa['ID_Usuario'] . "</th>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-ranking" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
                    <div>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Pontos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($dataa = mysqli_fetch_assoc($noticiasRanking)) {
                                    echo "<tr>";
                                    echo "<th scope='row'>" . $dataa['ID'] . "</th>";
                                    echo "<td>" . $dataa['Pontos'] . "</td>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-fakenews" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">
                    <div>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">Título</th>
                                    <th scope="col">Notícia falsa?
                                </tr>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($dataa = mysqli_fetch_assoc($noticiasFake)) {
                                    echo "<tr>";
                                    echo "<td>" . $dataa['Titulo'] . "</td>";
                                    if ($dataa['Fake'] == 1) {
                                        echo "<td>Esta notícia é falsa</td>";
                                    } else {
                                        echo "<td>Esta notícia não é falsa</td>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>