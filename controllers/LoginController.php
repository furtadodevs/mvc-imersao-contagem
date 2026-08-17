<?php

// A resposta será enviada no formato JSON
header("Content-Type: application/json; charset=utf-8");


// Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    http_response_code(405); // 405 - método não permitido

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Método não permitido, esperava POST"
    ]);

    exit;
}


// Recebe os dados enviados pelo formulário
$email = trim($_POST["email"] ?? "");
$senha = trim($_POST["senha"] ?? "");


// Valida os campos obrigatórios
if ($email === "" || $senha === "") {

    http_response_code(400);

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Preencha todos os campos"
    ]);

    exit;
}


// Valida o e-mail
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    http_response_code(422);

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Informe um e-mail válido"
    ]);

    exit;
}


// Valida a senha
if (strlen($senha) < 6) {

    http_response_code(422);

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "A senha deve possuir no mínimo 6 caracteres"
    ]);

    exit;
}


// -------> TODO: Aqui seria o banco de dados.


// Retornar após sucesso
http_response_code(200);

echo json_encode([
    "sucesso" => true,
    "mensagem" => "Login realizado com sucesso!",
    "cliente" => [
        "email" => $email
    ]
]);

?>
