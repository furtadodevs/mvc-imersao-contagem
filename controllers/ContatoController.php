<?php

// =========================================
// RESPOSTA JSON
// =========================================

header("Content-Type: application/json; charset=utf-8");


// =========================================
// VERIFICA MÉTODO
// =========================================

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    http_response_code(405);

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Método não permitido, esperava POST"
    ]);

    exit;
}


// =========================================
// RECEBE OS DADOS
// =========================================

$nome = trim($_POST["nome"] ?? "");
$email = trim($_POST["email"] ?? "");
$telefone = trim($_POST["telefone"] ?? "");
$assunto = trim($_POST["assunto"] ?? "");
$mensagem = trim($_POST["mensagem"] ?? "");


// =========================================
// VALIDA CAMPOS OBRIGATÓRIOS
// =========================================

if (
    $nome === "" ||
    $email === "" ||
    $telefone === "" ||
    $assunto === "" ||
    $mensagem === ""
) {

    http_response_code(400);

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Preencha todos os campos"
    ]);

    exit;
}


// =========================================
// VALIDA E-MAIL
// =========================================

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    http_response_code(400);

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Informe um e-mail válido"
    ]);

    exit;
}


// =========================================
// TODO:
// AQUI SERIA O ENVIO DO E-MAIL
// OU INSERÇÃO NO BANCO DE DADOS.
// =========================================


// =========================================
// RETORNO DE SUCESSO
// =========================================

http_response_code(200);

echo json_encode([
    "sucesso" => true,
    "mensagem" => "Mensagem enviada com sucesso!",

    "contato" => [
        "nome" => $nome,
        "email" => $email,
        "telefone" => $telefone,
        "assunto" => $assunto,
        "mensagem" => $mensagem
    ]
]);

?>