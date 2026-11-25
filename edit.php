<?php
    if(!empty($_GET['id'])){
        
    //  verifica se o id foi passado na URL
        include_once('config.php');
    //  inclui o arquivo config.php, que é onde está a conexão com o banco de dados
        $id = $_GET['id'];


        $sqlSelect = "SELECT * FROM usuarios WHERE id=$id"; 

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                
            $nome = $user_data['nome'];
            $email = $user_data['email'];
            $telefone = $user_data['telefone'];
            $genero = $user_data['genero'];
            $data_nascimento = $user_data['data_nascimento'];
            $cidade = $user_data['cidade'];
            $estado = $user_data['estado'];
            $endereco = $user_data['endereco'];
            }
           
        
    }
        else
        {
            header('Location: sistema.php');
        }
    
    }
    else
    {
        header('Location: sistema.php');
    }


?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario | Customer Registration</title>

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, #a6b6c2, #6753a7);      
        }

        .box{position: absolute;
         color: white; /*  diminui  o fieldset que é a linha de quadrado, ela fica de acordo com o texto  */
         top: 50%; /*  deixa no meio horizontal  */
         left: 50%; /*  deixa no meio horizontal, mas ainda fica em baixo  */
         transform: translate(-50%, -50%); /*  centraliza na tela  */
         background-color: rgba(0, 0, 0, 0.6); /*  deixa o fundo preto com transparencia  */
         padding: 15px; /*  espaço entre os elementos e a borda  */
         border-radius: 15px; /*  deixa as bordas arredondadas  */
         width: 20%; /*  daumenta o elemento  */
         min-width: 350px; /*  deixa o elemento com tamanho minimo de 300px, caso a tela seja pequena  */
            
        }

        fieldset{
            border: 3px solid purple;
        }

        legend{/* sobre a legenda, o ttulo prncipal que é a escita "formulario do cliente */
            border: 1px solid purple; /* bordinha do "formulario */
            padding: 10px; /* espaço entre o texto e a borda  */
            text-align: center; /* centraliza o texto  */
            background-color: purple; /* cor de fundo do "formulario" */
            border-radius: 8px; /* deixa as bordas arredondadas  */
            /* cor do texto  */
            
        }

        .inputbox{
            position: relative; /*  deixa o label em cima do input  */
        }
        .inputUser{
            background: none; /*  deixa o fundo transparente  */
            border: none; /*  tira a borda do input  */
            border-bottom: 1px solid white; /*  deixa a borda de baixo branca  */
            outline: none; /*  tira a borda azul do input quando clica nele  */
            color: white; /*  cor do texto que vai ser digitado no input  */
            font-size: 15px; /*  tamanho da letra do input  */
            width: 100%; /*  deixa o input com o tamanho do box, ou seja, do fieldset  */
            letter-spacing: 2px; /*  espaçamento entre as letras do input  */

        }
        .labelInput{
            position: absolute; /*  deixa o label em cima do input  */
            top: 0px; /*  deixa o label em cima do input  */
            left: 0px; /*  deixa o label em cima do input  */
            pointer-events: none; /*  deixa o label em cima do input, mas não deixa clicar nele  */
            transition: .5s; /*  deixa a transição do label suave  */
        }

        .inputUser:focus ~ .labelInput, /*  quando o usuario digitar sera feito essas ações no label (os nomes que referente a cada input)  */
        .inputUser:valid ~ .labelInput{  /*  após digitado, o label permanecerá com a animação)  */
            top: -20px; /*  quando o input estiver em foco, o label vai subir  */
            font-size: 15px; /*  diminui o tamanho da letra do label quando clicar no input */
            color: purple; /*  muda a cor do label quando clicar no input  */

        }

        #data_nascimento{
            border: none; /*  tira a borda do input  */
            padding: 8px; /*  espaço entre o texto e a borda  */
            border-radius: 10px; /*  deixa as bordas arredondadas  */
            outline: none; /*  tira a borda azul do input quando clica nele  */
            font-size: 15px; /*  tamanho da letra do input  */
        }

        #update{
            background-image: linear-gradient(to right, #a6b6c2, #6753a7); /*  deixa o fundo do botão com um degradê  */
            width: 100%; /*  deixa o botão com o tamanho do box, ou seja, do fieldset  */
            border: none; /*  tira a borda do botão  */
            padding: 15px; /*  espaço entre o texto e a borda  */
            color: white; /*  cor do texto do botão  */
            font-size: 15px; /*  tamanho da letra do botão  */
            cursor: pointer; /*  muda o cursor para uma mãozinha quando passa o mouse em cima do botão  */
            border-radius: 10px; /*  deixa as bordas arredondadas  */
        }

        #update:hover{ /*  quando o mouse passar em cima do botão  */
            background-image: linear-gradient(to right, #4727ad, #7a9cb6); /*  muda a cor do botão  */
        }
        

/* action é para onde vai enviar os dados do formulário, e method é o método de envio dos dados, POST que é mais seguro que GET, pois não aparece na URL */
        </style>
</head>
<body>
    <a href="sistema.php">Voltar</a>
    <br><br>
    <div class="box">
        <form action="SaveEdit.php" method="POST">    
            <fieldset>
                <legend><b>Formulário de Clientes</b></legend>

           
            <div class="inputbox">
                <input type="text" name="nome" id="nome" class="inputUser" value="<?php echo $nome ?>" required>
                <label for="nome" class="labelInput">Nome completo</label></div>
                <br><br>

        

                <div class="inputbox">
                <input type="text" name="email" id="email" class="inputUser" value="<?php echo $email ?>" required>
                <label for="email" class="labelInput">E-mail</label>
            </div>
             <br><br>

            
            <div class="inputbox">
                <input type="tel" name="telefone" id="telefone" class="inputUser" value="<?php echo $telefone ?>" required>
                <label for="telefone" class="labelInput">Telefone</label>
            </div>
             <br>
            <p>Sexo:</p>
            <input type="radio" id="feminino" name="genero" value="feminino" <?php echo ($genero == 'feminino') ? 'checked' : ''; ?> required>
            <label for="feminino">Feminino</label>
            <br>
            <input type="radio" id="masculino" name="genero" value="masculino" <?php echo ($genero == 'masculino') ? 'checked' : ''; ?>required>
            <label for="masculino">Masculino</label>
            <br>
            <input type="radio" id="outro" name="genero" value="outro" <?php echo ($genero == 'outro') ? 'checked' : ''; ?> required>
            <label for="outro">Outro</label>
              <br><br>

                <label for="data_nascimento"><b>Data de nascimento:</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" value="<?php echo $data_nascimento ?>" required>
            
             <br><br><br>

                <div class="inputbox">
                <input type="text" name="cidade" id="cidade" class="inputUser" value="<?php echo $cidade ?>" required>
                <label for="cidade" class="labelInput">Cidade</label>
            </div>
             <br><br>

            <div class="inputbox">
                <input type="text" name="estado" id="estado" class="inputUser" value="<?php echo $estado ?>" required>
                <label for="estado" class="labelInput">Estado</label>
            </div>
             <br><br>

            <div class="inputbox">
                <input type="text" name="endereco" id="endereco" class="inputUser" value="<?php echo $endereco ?>" required>
                <label for="endereco" class="labelInput">Endereço</label>
            </div>
             <br><br>



            <input type="hidden" name="id" value="<?php echo $id; ?>"> <!--  campo oculto para enviar o id do usuário para o SaveEdit.php  -->
            <input type="submit" name="update" id="update"> <!-- vai submitar o formulario para algum lugar -->


            <input type="password" name="senha" id="senha" class="inputUser">
            <label for="senha" class="labelInput">Nova senha (opcional)</label>



            </fieldset>
 
        </form>




    </div>
</body>
</html>