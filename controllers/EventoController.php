<?php

// =========================================
// RESPOSTA JSON
// =========================================

header("Content-Type: application/json; charset=utf-8");


// =========================================
// CARREGA O VALIDATOR
// =========================================

require __DIR__ . "/../libs/php/Validator.php";


// =========================================
// VERIFICA O MÉTODO
// =========================================

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    http_response_code(405);

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Método não permitido, esperava POST."
    ], JSON_UNESCAPED_UNICODE);

    exit;
}


// =========================================
// CRIA O VALIDATOR
// =========================================

$validator = new Validator($_POST);


// =========================================
// VALIDAÇÃO
// =========================================

validarCadastro($validator);


// =========================================
// IMAGEM
// =========================================

validarImagem($validator);


// =========================================
// VERIFICA ERROS
// =========================================

if ($validator->fails()) {

    http_response_code(422);

    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Corrija os campos indicados.",
        "erros" => $validator->errors()
    ], JSON_UNESCAPED_UNICODE);

    exit;
}


// =========================================
// BANCO DE DADOS
// =========================================

// TODO: Aqui será feito o cadastro


// =========================================
// SUCESSO
// =========================================

http_response_code(200);

echo json_encode([
    "sucesso" => true,
    "mensagem" => "Evento validado com sucesso.",
    "dados" => $validator->data()
], JSON_UNESCAPED_UNICODE);

exit;


// =========================================
// VALIDAÇÃO DO CADASTRO
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

    $validator->in(
        "categoria",
        [
            "Música",
            "Cultura"
        ],
        "Selecione uma categoria válida."
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

    $validator->maxLength(
        "descricao",
        2000,
        "A descrição deve ter no máximo 2000 caracteres."
    );


    // =====================================
    // DATA
    // =====================================

    $validator->required(
        "data",
        "Informe a data do evento."
    );

    $validator->regex(
        "data",
        "/^\d{4}-\d{2}-\d{2}$/",
        "Informe uma data válida."
    );


    // =====================================
    // HORÁRIO
    // =====================================

    $validator->required(
        "horario",
        "Informe o horário do evento."
    );

    $validator->regex(
        "horario",
        "/^(?:[01]\d|2[0-3]):[0-5]\d$/",
        "Informe um horário válido."
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

    $validator->maxLength(
        "local",
        150,
        "O local deve ter no máximo 150 caracteres."
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

    $validator->maxLength(
        "endereco",
        200,
        "O endereço deve ter no máximo 200 caracteres."
    );


    // =====================================
    // TELEFONE
    // =====================================

    $validator->required(
        "telefone",
        "Informe o telefone."
    );

    $validator->regex(
        "telefone",
        "/^\(\d{2}\) \d{5}-\d{4}$/",
        "Informe o telefone completo no formato (00) 00000-0000."
    );


    // =====================================
    // E-MAIL
    // =====================================

    $validator->required(
        "email",
        "Informe o e-mail."
    );

    $validator->email(
        "email",
        "Digite um e-mail válido."
    );


    // =====================================
    // SITE
    // =====================================

    $validator->required(
        "site",
        "Informe o site."
    );

    $validator->regex(
        "site",
        "/^(https?:\/\/)?(www\.)?[a-zA-Z0-9-]+(\.[a-zA-Z]{2,})(\/.*)?$/",
        "Digite um site válido."
    );
}


// =========================================
// VALIDAÇÃO DA IMAGEM
// =========================================

function validarImagem($validator)
{

    if (
        !isset($_FILES["imagem"]) ||
        $_FILES["imagem"]["error"] === UPLOAD_ERR_NO_FILE
    ) {

        adicionarErroManual(
            $validator,
            "imagem",
            "Selecione uma imagem de capa."
        );

        return;
    }


    if (
        $_FILES["imagem"]["error"] !== UPLOAD_ERR_OK
    ) {

        adicionarErroManual(
            $validator,
            "imagem",
            "Não foi possível enviar a imagem."
        );

        return;
    }


    $tiposPermitidos = [
        "image/jpeg",
        "image/png",
        "image/webp",
        "image/gif"
    ];


    if (
        !in_array(
            $_FILES["imagem"]["type"],
            $tiposPermitidos,
            true
        )
    ) {

        adicionarErroManual(
            $validator,
            "imagem",
            "Selecione uma imagem válida."
        );

    }

}


// =========================================
// ADICIONA ERRO MANUAL
// =========================================

function adicionarErroManual(
    $validator,
    $campo,
    $mensagem
) {

    /*
     * Como os erros do Validator são privados,
     * adicionamos a validação utilizando
     * uma regra que sempre falha.
     */

    $validator->regex(
        $campo,
        "/^__ARQUIVO_VALIDO__$/",
        $mensagem
    );

}