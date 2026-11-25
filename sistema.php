<?php
    session_start(); // Inicia a sessão para armazenar informações do usuário
    include_once('config.php'); // Inclui o arquivo de configuração do banco de dados
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
        {
            unset($_SESSION['email']); // Remove o e-mail do usuário da sessão
            unset($_SESSION['senha']); // Remove a senha do usuário da sessão
            header("Location: login.php"); // Redireciona para a página de login se o usuário não estiver logado
        }

        $logado = $_SESSION['email']; // Armazena o e-mail do usuário logado em uma variável


  
        $sql = "SELECT * FROM usuarios order by id DESC"; // Consulta SQL para selecionar todos os usuários da tabela "usuarios" ordenados pelo ID em ordem decrescente
        $result = $conexao->query($sql); // Executa a consulta SQL e armazena o resultado na variável $result// 
           
        
        
        ?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SISTEMA | Customer Registration</title>
    <style>

        body{
            
        background-image: linear-gradient(to right, #a6b6c2, #6753a7);
        color: white;
        text-align: center;

        .table-bg{
            background-color: rgba(0, 0, 0, 0.3); /*  deixa o fundo preto com transparencia  */
            border-radius: 12px 12px 0 0; /*  deixa as bordas arredondadas  */



        }
        }

    </style>


</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark position-relative" style="background-color: #3b0764;">
    <div class="container-fluid">
        <a class="navbar-brand position-absolute top-50 start-50 translate-middle" href="#">Customer Registration</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="d-flex">
        <a href="sair.php" class="btn btn-danger me-5">Sair</a>
    </div>
</nav>
<br>
<?php
    echo "Bem-vindo ao sistema Customer Registration <u>$logado</u></h1>";
    ?>
    <div class="m-5">
        <table class="table text-white table-bg"> 
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Gênero</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Senha</th>
                    <th scope="col">...</th>

                </tr>
            </thead>
            <tbody>
            <?php
                while ($user_data = mysqli_fetch_assoc($result)) 
                {
                    echo "<tr>";
                    echo "<td>" .$user_data['id']."</td>";
                    echo "<td>" .($user_data['nome'])."</td>";
                    echo "<td>" .($user_data['email'])."</td>";
                    echo "<td>" .($user_data['telefone'])."</td>";
                    echo "<td>" .($user_data['genero'])."</td>";
                    echo "<td>" .($user_data['data_nascimento'])."</td>";
                    echo "<td>" .($user_data['cidade'])."</td>";
                    echo "<td>" .($user_data['estado'])."</td>";
                    echo "<td>" .($user_data['endereco'])."</td>";
                    echo "<td>" .($user_data['senha'])."</td>";
                    echo "<td>
                        <a class='btn btn-sm btn-primary' href='edit.php?id=$user_data[id]'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                                <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                                <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/>
                            </svg>
                        </a>


                        <a class='btn btn-sm btn-danger' href='delete.php?id=$user_data[id]'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                                <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5'/>
                            </svg>
                        </a>
                    </td>";
                    echo"</td>";
                    
                }
            ?>     
                                
            </tbody>
        </table>
    </div>
</body>
</html>