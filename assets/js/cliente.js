// ======================================================
// PROJETO USANDO JQUERY
// ======================================================

$(document).ready(function () {

    // Aplica as máscaras
    aplicarMascaras();

    // Configura a validação
    validarFormulario();

});


// ======================================================
// MÁSCARAS
// ======================================================

function aplicarMascaras() {

    // CPF: 000.000.000-00
    $("#cpf").mask("000.000.000-00");

    // Telefone: (00) 00000-0000
    $("#telefone").mask("(00) 00000-0000");

}


// ======================================================
// VALIDAÇÃO DO FORMULÁRIO
// ======================================================

function validarFormulario() {

    // Verifica se o formulário existe
    if ($("#formCliente").length === 0) {

        console.error("ERRO: #formCliente não foi encontrado.");
        return;

    }


    // Verifica se o jQuery Validation foi carregado
    if (typeof $.fn.validate !== "function") {

        console.error(
            "ERRO: o plugin jQuery Validation não foi carregado."
        );

        return;

    }


    // ==================================================
    // CONFIGURAÇÃO DO JQUERY VALIDATION
    // ==================================================

    $("#formCliente").validate({

        // ==================================================
        // REGRAS
        // ==================================================

        rules: {

            nome: {
                required: true,
                minlength: 3,
                maxlength: 100
            },

            cpf: {
                required: true,
                minlength: 14,
                maxlength: 14
            },

            email: {
                required: true,
                email: true
            },

            telefone: {
                required: true,
                minlength: 15,
                maxlength: 15
            }

        },


        // ==================================================
        // MENSAGENS
        // ==================================================

        messages: {

            nome: {
                required: "Informe o nome do cliente.",
                minlength: "O nome deve ter pelo menos 3 caracteres.",
                maxlength: "O nome deve ter no máximo 100 caracteres."
            },

            cpf: {
                required: "Informe o CPF do cliente.",
                minlength: "Informe o CPF completo.",
                maxlength: "Informe um CPF válido."
            },

            email: {
                required: "Informe o e-mail do cliente.",
                email: "Verifique o formato do e-mail. Ex: cliente@email.com"
            },

            telefone: {
                required: "Informe o telefone do cliente.",
                minlength: "Informe o telefone completo.",
                maxlength: "Informe um telefone válido."
            }

        },


        // ==================================================
        // ONDE MOSTRAR A MENSAGEM
        // ==================================================

        errorPlacement: function (error, element) {

            const campo = $(element);

            const grupo = campo.closest(".mb-4");

            const mensagemErro = grupo.find(".invalid-feedback");

            mensagemErro
                .text(error.text())
                .css("display", "block");

        },


        // ==================================================
        // CAMPO INVÁLIDO
        // ==================================================

        highlight: function (element) {

            const campo = $(element);

            const grupo = campo.closest(".mb-4");

            campo
                .removeClass("is-valid")
                .addClass("is-invalid");

            grupo
                .find(".invalid-feedback")
                .css("display", "block");

            grupo
                .find(".valid-feedback")
                .css("display", "none");

        },


        // ==================================================
        // CAMPO VÁLIDO
        // ==================================================

        unhighlight: function (element) {

            const campo = $(element);

            const grupo = campo.closest(".mb-4");

            campo
                .removeClass("is-invalid")
                .addClass("is-valid");

            grupo
                .find(".invalid-feedback")
                .text("")
                .css("display", "none");

            grupo
                .find(".valid-feedback")
                .text("")
                .css("display", "none");

        },


        // ==================================================
        // FORMULÁRIO VÁLIDO
        // ==================================================

        submitHandler: async function (formulario) {

            console.log(
                "FORMULÁRIO VALIDADO COM SUCESSO!"
            );


            // Pega a div de mensagem
            const mensagem =
                document.getElementById("mensagem");


            // Captura os dados
            const dados =
                new FormData(formulario);


            // ==================================================
            // REMOVE MÁSCARA DO CPF
            // ==================================================

            const cpf =
                $("#cpf")
                    .val()
                    .replace(/\D/g, "");


            // ==================================================
            // REMOVE MÁSCARA DO TELEFONE
            // ==================================================

            const telefone =
                $("#telefone")
                    .val()
                    .replace(/\D/g, "");


            // Atualiza os valores
            dados.set("cpf", cpf);
            dados.set("telefone", telefone);


            // Mostra os dados no console
            console.table(
                Object.fromEntries(dados.entries())
            );


            // ==================================================
            // MENSAGEM DE ENVIO
            // ==================================================

            mensagem.className =
                "alert alert-info mt-3";

            mensagem.classList.remove("d-none");

            mensagem.textContent =
                "Enviando dados...";


            try {

                // ==================================================
                // ENVIA PARA O CONTROLLER
                // ==================================================

                const resposta = await fetch(
                    "controllers/ClienteController.php",
                    {
                        method: "POST",
                        body: dados
                    }
                );


                // ==================================================
                // LÊ A RESPOSTA
                // ==================================================

                const resultado =
                    await resposta.json();


                console.log(
                    "Resposta do servidor:",
                    resultado
                );


                // ==================================================
                // ERRO HTTP
                // ==================================================

                if (!resposta.ok) {

                    mensagem.className =
                        "alert alert-danger mt-3";

                    mensagem.classList.remove("d-none");

                    mensagem.textContent =
                        resultado.mensagem ??
                        "Erro ao cadastrar cliente.";

                    return;

                }


                // ==================================================
                // SUCESSO
                // ==================================================

                mensagem.className =
                    "alert alert-success mt-3";

                mensagem.classList.remove("d-none");

                mensagem.textContent =
                    resultado.mensagem ??
                    "Cliente cadastrado com sucesso!";


                // ==================================================
                // LIMPA FORMULÁRIO
                // ==================================================

                formulario.reset();


                $(formulario)
                    .find(".form-control")
                    .removeClass(
                        "is-valid is-invalid"
                    );


                $(formulario)
                    .find(".invalid-feedback")
                    .text("")
                    .css("display", "none");

            }


            // ==================================================
            // ERRO NO FETCH
            // ==================================================

            catch (erro) {

                console.error(
                    "Erro completo:",
                    erro
                );


                mensagem.className =
                    "alert alert-danger mt-3";

                mensagem.classList.remove("d-none");

                mensagem.textContent =
                    "Erro ao enviar os dados para o controller de cliente.";

            }

        }

    });

}


// ======================================================
// RESET DO FORMULÁRIO
// ======================================================

$("#formCliente").on("reset", function () {

    const formulario = $(this);

    const mensagem =
        document.getElementById("mensagem");


    // Remove classes
    formulario
        .find(".form-control")
        .removeClass(
            "is-valid is-invalid"
        );


    // Limpa mensagens
    formulario
        .find(".invalid-feedback")
        .text("")
        .css("display", "none");


    // Limpa mensagem geral
    mensagem.className =
        "alert d-none mt-3";

    mensagem.textContent = "";

});
