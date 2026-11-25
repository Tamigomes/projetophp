<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login | Customer Registration</title>
     <!-- parte do visual -->
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
             background-image: linear-gradient(to right, #a6b6c2, #6753a7);
        }

        div{
            background-color: rgba(0, 0, 0, 0.6); /*  Transparecencia  */
            position: absolute; /*  Ocupa apenas o espaço dos elementos  */
            top: 50%; /*  No meio  vertical canto da tela  */
            left: 50%; /* Meio da tela  */
            transform: translate(-50%, -50%); 
            padding: 80px; /* Distancia entre os elementos e a borda  */
            border-radius: 15px; /* Arrendondar as bordas  */
            color: white; /* Para o texto login ficar branco  */
        }
       input{
            padding: 15px; /* Deixa maior */
            border: none; /*  Retirar a borda  */
            outline: none; /* Quando clicar, aparecer a linha */
            font-size: 15px;
        }
        button{
            background-color: purple;
            border:none; /*  Rsem borda  */
            padding: 15px; /*  A distancia entre os elementos e a borda  */
            width: 100%; /*  Ocupando toda a largura  */           
         }

        .inputSubmit{
            background-image: linear-gradient(to right, #a6b6c2, #6753a7);
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-size: 15px;
            cursor: pointer; /*  muda o cursor para uma mãozinha quando passa o mouse em cima do botão  */
        }

        .inputSubmit:hover{
            background-image: linear-gradient(to right, #4727ad, #7a9cb6); ;;
         
            
        }

    </style>
 
</head>
<body>
    <a href="home.php">Voltar</a>
    <br><br>
    <div>
        <h1>Login</h1>
        <form action="testLogin.php" method="POST">
        <input type="text" name="email" id="email" placeholder="Digite o seu e-mail">
        <br><br>
        <input type="password" name="senha" id="senha" placeholder="Digite a sua senha">
         <br><br>
         <input class="inputSubmit" type="submit" name="submit" value="Entrar">

    </div>
</body>
</html>