<script>
    function validaCadastro() {
        if (document.getElementById("titulo").value === "" || document.getElementById("texto").value === "" || document.getElementById("img").value === "") {
            alert('Por favor, preencha todos os campos obrigatórios');
            return false
        }
    }
</script>


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
        <div id="container">

<h1>Postar Noticia</h1>

<form action='addNoticiaBanco.php' method="POST" enctype="multipart/form-data" name='formulario' onsubmit="return validaCadastro(this)">
    <div>
        <label for="nome">Titulo:</label>
        <input type="text" id="titulo" name="titulo" /> <br></br>
    </div>
    <div>
        <label for="descrição">Descrição:</label>
        <input type="text" id="texto" name="texto" /> <br></br>
    </div>

    <div>
        <label for="img">Imagem:</label>
        <input type="file" id="img" name="img" accept="image/*"> <br></br>
    </div>

    <div>
        <label><input type="submit" name="botao" value="Enviar" /></label></p>
    </div>
</div>
</body>

</html>