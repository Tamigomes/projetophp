<?php 
session_start(); // Inicia a sessão para armazenar informações do usuário
unset($_SESSION['email']); // Remove o e-mail do usuário da sessão
unset($_SESSION['senha']); // Remove a senha do usuário da sessão
header("Location: home.php"); // Redireciona para a página de home



?>