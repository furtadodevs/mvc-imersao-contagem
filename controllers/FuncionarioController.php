<?php

//A resposta será enviada no formato JSON
header("Content-Type: application/json; charset=utf-8");

//Verifica se a requisição é do tipo POST
if($_SERVER["REQUEST_METHOD"] !== "POST"){
 http_response_code(405); //405 - método não permitido

 echo json_encode([
    "sucesso" => false, 
    "mensagem" => "Método não permitido, esperava GET"
 ]);

 exit;
}

//Recebe os dados enviados pelo formulário
$nome = trim($_POST['nome']);
$cnpj = trim($_POST['cnpj']);
$regFunc = trim($_POST['regFunc']);
$pis = trim($_POST['pis']);

//Valida os campos obrigatórios
if($nome === "" || $cnpj === "" || $regFunc === "" ||$pis === ""){
    http_response_code(400);

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Preencha todos os campos"
    ]);

    exit;
}


// -------> TODO: Aqui seria o banco de dados.

//Retornar após sucesso
http_response_code(200);

echo json_encode([
    "sucesso" => true,
    "mensagem" => "Funcionário cadastrado com sucesso!",
    "funcionario" => [
        "nome" => $nome,
        "cnpj" => $cnpj,
        "rf" => $regFunc,
        "pis" => $pis,
    ]
])


?>