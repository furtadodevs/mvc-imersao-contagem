<?php

// =========================================
// RESPOSTA JSON
// =========================================

header("Content-Type: application/json; charset=utf-8");


// =========================================
// CARREGA O VALIDATOR
// =========================================

require __DIR__ . "/../libs/Validator.php";


// =========================================
// VERIFICA O MÉTODO DA REQUISIÇÃO
// =========================================

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    http_response_code(405);

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Método não permitido, esperava POST."
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    exit;
}


// =========================================
// CRIA O VALIDADOR
// =========================================

$validator = new Validator($_POST);


// =========================================
// EXECUTA AS REGRAS DE VALIDAÇÃO
// =========================================

validarCadastro($validator);


// =========================================
// BANCO DE DADOS
// =========================================

// TODO: Aqui seria o banco de dados


// =========================================
// VERIFICA SE EXISTEM ERROS
// =========================================

if ($validator->fails()) {

    http_response_code(422);

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Corrija os campos indicados.",
        "erros" => $validator->errors()
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    exit;
}


// =========================================
// RETORNA SUCESSO
// =========================================

http_response_code(200);

echo json_encode([
    "sucesso" => true,
    "mensagem" => "Evento validado com sucesso.",
    "dados" => $validator->data()
], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

exit;


// =========================================
// FUNÇÕES AUXILIARES
// =========================================

function validarCadastro($validator)
{

    // =====================================
    // TÍTULO
    // =====================================

    $validator->required(
        "titulo",
        "Informe o título do evento."
    );

    $validator->string(
        "titulo",
        "O título deve ser um texto."
    );

    $validator->minLength(
        "titulo",
        3,
        "O título deve ter pelo menos 3 caracteres."
    );

    $validator->maxLength(
        "titulo",
        100,
        "O título deve ter no máximo 100 caracteres."
    );


    // =====================================
    // CATEGORIA
    // =====================================

    $validator->required(
        "categoria",
        "Selecione uma categoria."
    );


    $validator->string(
        "categoria",
        "A categoria deve ser um texto."
    );


    // =====================================
    // DESCRIÇÃO
    // =====================================

    $validator->required(
        "descricao",
        "Informe a descrição do evento."
    );


    $validator->string(
        "descricao",
        "A descrição deve ser um texto."
    );


    $validator->minLength(
        "descricao",
        10,
        "A descrição deve ter pelo menos 10 caracteres."
    );


    // =====================================
    // DATA
    // =====================================

    $validator->required(
        "data",
        "Informe a data do evento."
    );


    // =====================================
    // HORÁRIO
    // =====================================

    $validator->required(
        "horario",
        "Informe o horário do evento."
    );


    // =====================================
    // LOCAL
    // =====================================

    $validator->required(
        "local",
        "Informe o local do evento."
    );


    $validator->string(
        "local",
        "O local deve ser um texto."
    );


    $validator->minLength(
        "local",
        3,
        "O local deve ter pelo menos 3 caracteres."
    );


    // =====================================
    // ENDEREÇO
    // =====================================

    $validator->required(
        "endereco",
        "Informe o endereço do evento."
    );


    $validator->string(
        "endereco",
        "O endereço deve ser um texto."
    );


    $validator->minLength(
        "endereco",
        5,
        "O endereço deve ter pelo menos 5 caracteres."
    );


    // =====================================
    // TELEFONE
    // =====================================

    $validator->required(
        "telefone",
        "Informe o telefone."
    );


    // =====================================
    // E-MAIL
    // =====================================

    $validator->required(
        "email",
        "Informe o e-mail."
    );


    // =====================================
    // SITE
    // =====================================

    $validator->required(
        "site",
        "Informe o site."
    );

}