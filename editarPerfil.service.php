<?php

include('connect.inc.php');
session_start();

function verificaConexao($conn, $insere)
{
    if ($conn->query($insere) === TRUE) {
        $_SESSION['mensagem'] =  "<p style='color:green;'>Usuario atualizado com sucesso!</p>";
        header("Location: editarPerfil.php ");
    } else {
        echo "Error: " . $insere . "<br>" . $conn->error;
    }
}

if (isset($_SESSION['id_email'])) {
    $email_id = $_SESSION['id_email'];

    $email = $_GET['email'];
    $nome = $_GET['nome'];

    $sql = "UPDATE usuarios 
            SET Nome='$nome', Email='$email' 
            WHERE Email='$email_id'";

    verificaConexao($conn, $sql);
}
