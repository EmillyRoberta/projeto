<?php
session_start();
ob_start();

include('connect.inc.php');

$email = $_GET['email'];

if (isset($_GET['email'])) {
    $email = $_GET['email'];
}
if ($email != null) {

    $verifica_email = "SELECT * FROM usuarios WHERE Email LIKE '%$email%'";
    $result_verifica_email = $conn->query($verifica_email);

    if ($result_verifica_email->num_rows != 0) {
        $_SESSION['id_email'] = $email;
        header("Location: index.php");
    } else {
        header("Location: login.php ");
        $_SESSION['mensagem'] =  "<p style='color:red;'>Usuário não encontrado!</p>";
    }
} else {
    echo ("dados não inseridos corretamente");
}
