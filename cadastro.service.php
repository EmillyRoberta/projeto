<?php
session_start();
ob_start();

include('connect.inc.php');

function verificaConexao($conn, $insere)
{
    if ($conn->query($insere) === TRUE) {
        $_SESSION['mensagem'] =  "<p style='color:green;'>Usuario com sucesso!</p>";
        header("Location: login.php ");
    } else {
        echo "Error: " . $insere . "<br>" . $conn->error;
    }
}

$senha = md5($_POST['senha']);

if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
}


if ($nome != null && $email != null) {

    $verifica_usuario = "SELECT * FROM usuarios WHERE Email LIKE '%$email%'";
    $result_verifica_usuario = $conn->query($verifica_usuario);

    $insere_usuario = "INSERT INTO usuarios (Nome, Email, Pontos, Senha)
                    VALUES ('$nome', '$email', 0, '$senha')";


    if ($result_verifica_usuario->num_rows != 0) {
        $_SESSION['mensagem'] =  "<p style='color:red;'>Este usuário já existe!</p>";
        header("Location: login.php ");
    } else {
        verificaConexao($conn, $insere_usuario);
    }
} else {
    echo ("dados não inseridos corretamente");
}
