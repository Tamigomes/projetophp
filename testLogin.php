<?php
session_start();

if (
    !isset($_POST['submit']) ||
    empty($_POST['email']) ||
    empty($_POST['senha'])
) {
    header("Location: login.php");
    exit;
}

include_once('config.php');

$email = $_POST['email'];
$senha = $_POST['senha'];

$stmt = $conexao->prepare(
    "SELECT email, senha FROM usuarios WHERE email = ?"
);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($emailBanco, $hashBanco);

$usuarioEncontrado = $stmt->fetch();
$stmt->close();

if ($usuarioEncontrado && password_verify($senha, $hashBanco)) {
    $_SESSION['email'] = $emailBanco;
    header("Location: sistema.php");
    exit;
}

unset($_SESSION['email']);
header("Location: login.php");
exit;
?>