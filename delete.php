<?php
    if(!empty($_GET['id']))
    {
       
        include_once('config.php');
    //  inclui o arquivo config.php, que é onde está a conexão com o banco de dados
        $id = $_GET['id'];


        $sqlSelect = "SELECT * FROM usuarios WHERE id=$id"; 

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM usuarios WHERE id=$id"; //  cria a query para deletar o usuário com o id especificado
            $resultDelete = $conexao->query($sqlDelete); //  executa a
        }
            
            
    }  
        

        header('Location: sistema.php');
?>