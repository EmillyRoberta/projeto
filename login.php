<script>
    function validaCadastro() {
        if (document.getElementById("email").value === "" || document.getElementById("senha").value === "") {
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
    <title>Login</title>
</head>

<body>

    <div class="container-fluid">
        <div class="card shadow-sm p-3 mb-5 bg-white rounded">
            <div class="card-body">
                <h1>Login</h1>
                <div class="d-flex justify-content-center">
                    <?php
                    session_start();
                    if (isset($_SESSION['mensagem'])) {
                        echo $_SESSION['mensagem'];
                        unset($_SESSION['mensagem']);
                    }
                    ?>
                </div>
                <hr>
                <form method="GET" action="login.service.php" enctype="multipart/form-data" onsubmit="return validaCadastro(this)">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Endereço de email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Seu email">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" aria-describedby="emailHelp">
                    </div>

                    <div class="row">
                        <div class="col-9"><a href="cadastro.php">Cadastre-se</a></div>
                        <div class="col-3 pr-5">
                            <div style="margin-left:14px"><button type="submit" class="btn btn-primary">Entrar</button></div>


                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>

</html>