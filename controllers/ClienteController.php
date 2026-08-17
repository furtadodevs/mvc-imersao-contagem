<?php

// ======================================================
// RESPOSTA EM JSON
// ======================================================

header("Content-Type: application/json; charset=utf-8");


// ======================================================
// VERIFICA O MÉTODO DA REQUISIÇÃO
// ======================================================

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    http_response_code(405);

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Método não permitido. Esperava POST."
    ], JSON_UNESCAPED_UNICODE);

    exit;
}


// ======================================================
// RECEBE OS DADOS
// ======================================================

$nome = trim($_POST["nome"] ?? "");
$cpf = trim($_POST["cpf"] ?? "");
$email = trim($_POST["email"] ?? "");
$telefone = trim($_POST["telefone"] ?? "");


// ======================================================
// VALIDAÇÃO DOS CAMPOS
// ======================================================

if (
    $nome === "" ||
    $cpf === "" ||
    $email === "" ||
    $telefone === ""
) {

    http_response_code(400);

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Preencha todos os campos."
    ], JSON_UNESCAPED_UNICODE);

    exit;
}


// ======================================================
// VALIDAÇÕES ESPECÍFICAS
// ======================================================

// Nome
if (strlen($nome) < 3) {

    http_response_code(422);

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "O nome deve ter pelo menos 3 caracteres."
    ], JSON_UNESCAPED_UNICODE);

    exit;
}


// CPF
if (strlen($cpf) !== 11) {

    http_response_code(422);

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Informe um CPF válido."
    ], JSON_UNESCAPED_UNICODE);

    exit;
}


// E-mail
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    http_response_code(422);

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Informe um e-mail válido."
    ], JSON_UNESCAPED_UNICODE);

    exit;
}


// Telefone
if (strlen($telefone) !== 11) {

    http_response_code(422);

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Informe um telefone válido."
    ], JSON_UNESCAPED_UNICODE);

    exit;
}


// ======================================================
// TODO:
// AQUI SERIA O BANCO DE DADOS
// ======================================================


// ======================================================
// RETORNA SUCESSO
// ======================================================

http_response_code(200);

echo json_encode([
    "sucesso" => true,
    "mensagem" => "Cliente cadastrado com sucesso!",
    "cliente" => [
        "nome" => $nome,
        "cpf" => $cpf,
        "email" => $email,
        "telefone" => $telefone
    ]
], JSON_UNESCAPED_UNICODE);

exit;
