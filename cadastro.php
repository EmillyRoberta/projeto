<script>
    function validaCadastro() {
        if (document.getElementById("nome").value === "" || document.getElementById("email").value === "") {
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
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Cadastro</title>
</head>

<body>

    <div class="container-fluid">
        <div class="card shadow-sm mb-5 bg-white rounded">
            <div class="card-body">
                <h1>Cadastro</h1>
                <hr>
                <form method="POST" action="cadastro.service.php" enctype="multipart/form-data" onsubmit="return validaCadastro(this)">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Seu nome">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Endereço de email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Seu email">

                    </div>

                    <div class="d-flex justify-content-end"><button type="submit" class="btn btn-primary">cadastrar</button></div>

                </form>
            </div>
        </div>

    </div>

</body>

</html>