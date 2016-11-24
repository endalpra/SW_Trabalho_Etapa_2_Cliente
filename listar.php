<?php

//$lista = file_get_contents("http://localhost:8080/SW_Trabalho_Etapa_2/servicos/livro/listar");
//Inicia a biblioteca cURL do PHP
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_PORT => "8080", //porta do WS
    CURLOPT_URL => "http://localhost:8080/SW_Trabalho_Etapa_2/servicos/livro/listar", //Caminho do WS que vai receber o GET
    CURLOPT_RETURNTRANSFER => true, //Recebe resposta
    CURLOPT_ENCODING => "JSON", //Decodificação
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET", //metodo do servidor
    CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
    ),
)); //recebe retorno
$lista = curl_exec($curl); //Recebe a lista no formato jSon do WS
curl_close($curl); //Encerra a biblioteca


echo $lista;
