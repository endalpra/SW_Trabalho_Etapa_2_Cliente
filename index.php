<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="RestCliente.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    </head>
    <body onload="listar()">
        <h1>Listagem de livros</h1>
        <table border="1">
            <th>ID</th>
            <th>Título</th>
            <th>Editora</th>
            <th>Quantidade de páginas</th>
            <th>Ações</th>
            <tbody id="tabela"></tbody>
        </table>
        <a href="formulario.php">Novo</a>
        <?php
        if (isset($_GET['idDel'])) {
            //Inicia a biblioteca cURL do PHP
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_PORT => "8080", //porta do WS
                CURLOPT_URL => "http://localhost:8080/SW_Trabalho_Etapa_2/servicos/livro/" . $_GET['idDel'], //Caminho do WS + string do DELETE, recuperado pelo GET
                CURLOPT_RETURNTRANSFER => true, //Recebe resposta
                CURLOPT_ENCODING => "", //Decodificação
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "DELETE", //metodo
                CURLOPT_HTTPHEADER => array(
                    "cache-control: no-cache",
                ),
            ));
            $response = curl_exec($curl); //recebe a resposta do WS
            $err = curl_error($curl); //recebe o erro da classe ou WS

            curl_close($curl); //encerra classe
            //echo $response;
        } 
        //Adicionar registro no banco
        else if (isset($_REQUEST['titulo']) && isset($_REQUEST['editora']) && isset($_REQUEST['qtd_pag']) && empty($_REQUEST['id'])) {
               //Cria a array com os dados recebido, sendo q o ID é gerado pelo WS
                $postArray = array(
                    "titulo" => $_POST['titulo'],
                    "editora" => $_POST['editora'],
                    "qtd_paginas" => $_POST['qtd_pag'],
                );
                // Converte os dados para o formato jSon
                $json = json_encode($postArray);
          
            //Inicia a biblioteca cURL do PHP
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_PORT => "8080", //porta do WS
                CURLOPT_URL => "http://localhost:8080/SW_Trabalho_Etapa_2/servicos/livro/", //Caminho do WS que vai receber o GET
                CURLOPT_RETURNTRANSFER => true, //Recebe resposta
                CURLOPT_ENCODING => "JSON", //Decodificação
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST", //metodo
                CURLOPT_POSTFIELDS => $json, //string com dados à serem postados      
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($json)),
            ));
            $result = curl_exec($curl); //recebe o resultado
            $err = curl_error($curl); //recebe o erro da classe ou WS

            curl_close($curl); //Encerra a biblioteca
            
            
        }
        
        //Editar registro
        else if (isset($_REQUEST['titulo']) && isset($_REQUEST['editora']) && isset($_REQUEST['qtd_pag']) && !empty ($_REQUEST['id'])) {
            //Cria a array com os dados recebido, sendo q o ID é gerado pelo WS
                $postArray = array(
                    "id" => $_POST['id'],
                    "titulo" => $_POST['titulo'],
                    "editora" => $_POST['editora'],
                    "qtd_paginas" => $_POST['qtd_pag'],
                );
                // Converte os dados para o formato jSon
                $json = json_encode($postArray);
          
            //Inicia a biblioteca cURL do PHP
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_PORT => "8080", //porta do WS
                CURLOPT_URL => "http://localhost:8080/SW_Trabalho_Etapa_2/servicos/livro/", //Caminho do WS que vai receber o GET
                CURLOPT_RETURNTRANSFER => true, //Recebe resposta
                CURLOPT_ENCODING => "JSON", //Decodificação
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "PUT", //metodo
                CURLOPT_POSTFIELDS => $json, //string com dados à serem postados      
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($json)),
            ));
            $result = curl_exec($curl); //recebe o resultado
            $err = curl_error($curl); //recebe o erro da classe ou WS

            curl_close($curl); //Encerra a biblioteca
            
        }
        ?>
    </body>
</html>
