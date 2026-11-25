<?php
session_start();
$mensagemErro = $_SESSION['erro_cadastro']
    ?? $_SESSION['erro_login']
    ?? '';
unset($_SESSION['erro_cadastro'], $_SESSION['erro_login']);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="pt-br">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home | Customer Registration</title>
    <style>
        body{
        font-family: Arial, Helvetica, sans-serif;
        background-image: linear-gradient(to right, #a6b6c2, #6753a7);
        text-align: center;
        color: white;
        }

        .box{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.6); /*  deixa o fundo preto com transparencia  */
            padding: 60px; /*  espaço entre os elementos e a borda  */
            border-radius: 10px; /*  deixa as bordas arredondadas  */
            }


        a{
            text-decoration: none; /*  tira o sublinhado do link  */
            color: white; /*  cor do link  */
            padding: 10px; /*  espaço entre o link e a borda  */
            border: 3px solid white; /*  bordinha do link  */
            border-radius: 10px;
            transition: 0.3s;
        }

        a:hover{
            background-color: purple; /*  cor de fundo do link quando passa o mouse em cima  */
            background-image: linear-gradient(to right, #4727ad, #7a9cb6); /*  bordinha do link quando passa o mouse em cima  */
        }

        
   
        
     </style>
</head>
<?php if ($mensagemErro !== ''): ?>
    <p role="alert" style="color: white; background: #b02a37; padding: 10px;">
        <?= htmlspecialchars($mensagemErro, ENT_QUOTES, 'UTF-8') ?>
    </p>
<?php endif; ?>








    <h1>Bem-vindo ao sistema Customer Registration</h1>
    <h4>Para cadastrar um novo cliente, clique  em cadastrar, caso já tenha cadastro, clique em login</4>


    <div class="box">
        <a href="login.php">Login</a>
        <a href="formulario.php">cadastre-se</a>
    </div>
</body>
</html>