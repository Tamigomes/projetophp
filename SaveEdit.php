<?php
include_once("config.php");

if (!isset($_POST["update"])) {
    header("Location: sistema.php");
    exit;
}

$id = (int)($_POST['id'] ?? 0);

if ($id <= 0) {
    header("Location: sistema.php");
    exit;
}

$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$telefone = $_POST['telefone'] ?? '';
$genero = $_POST['genero'] ?? '';
$data_nascimento = $_POST['data_nascimento'] ?? '';
$cidade = $_POST['cidade'] ?? '';
$estado = $_POST['estado'] ?? '';
$endereco = $_POST['endereco'] ?? '';
$senhaNova = $_POST['senha'] ?? '';

if ($senhaNova !== '') {
    $senhaHash = password_hash($senhaNova, PASSWORD_DEFAULT);

    $stmt = $conexao->prepare(
        "UPDATE usuarios
         SET nome=?, email=?, telefone=?, genero=?, data_nascimento=?,
             cidade=?, estado=?, endereco=?, senha=?
         WHERE id=?"
    );
    $stmt->bind_param(
        "sssssssssi",
        $nome, $email, $telefone, $genero, $data_nascimento,
        $cidade, $estado, $endereco, $senhaHash, $id
    );
} else {
    $stmt = $conexao->prepare(
        "UPDATE usuarios
         SET nome=?, email=?, telefone=?, genero=?, data_nascimento=?,
             cidade=?, estado=?, endereco=?
         WHERE id=?"
    );
    $stmt->bind_param(
        "ssssssssi",
        $nome, $email, $telefone, $genero, $data_nascimento,
        $cidade, $estado, $endereco, $id
    );
}

if (!$stmt->execute()) {
    die("Erro ao atualizar: " . $stmt->error);
}

header("Location: sistema.php");
exit;
?>