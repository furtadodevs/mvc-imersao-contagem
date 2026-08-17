// =========================================
// CONTATO - JQUERY
// =========================================

$(document).ready(function () {

    console.log("contato.js carregado!");

    // Aplica as máscaras
    aplicarMascaras();

    // Configura a validação
    validarFormulario();

});


// =========================================
// MÁSCARAS
// =========================================

function aplicarMascaras() {

    // Telefone
    // (00) 00000-0000
    $("#telefone").mask("(00) 00000-0000");

}


// =========================================
// VALIDAÇÃO DO FORMULÁRIO
// =========================================

function validarFormulario() {

    console.log("Validação do contato iniciada!");

    const mensagem = $("#mensagem");


    $("#formContato").validate({

        // =====================================
        // REGRAS
        // =====================================

        rules: {

            nome: {
                required: true,
                minlength: 3,
                maxlength: 100
            },

            email: {
                required: true,
                email: true,
                maxlength: 150
            },

            telefone: {
                required: true,
                minlength: 15,
                maxlength: 15
            },

            assunto: {
                required: true,
                minlength: 3,
                maxlength: 100
            },

            mensagem: {
                required: true,
                minlength: 10,
                maxlength: 500
            }

        },


        // =====================================
        // MENSAGENS
        // =====================================

        messages: {

            nome: {
                required: "Informe seu nome.",
                minlength: "O nome deve ter pelo menos 3 caracteres.",
                maxlength: "O nome deve ter no máximo 100 caracteres."
            },

            email: {
                required: "Informe seu e-mail.",
                email: "Informe um e-mail válido.",
                maxlength: "O e-mail deve ter no máximo 150 caracteres."
            },

            telefone: {
                required: "Informe seu telefone.",
                minlength: "O telefone deve ter 15 caracteres.",
                maxlength: "O telefone deve ter 15 caracteres."
            },

            assunto: {
                required: "Informe o assunto.",
                minlength: "O assunto deve ter pelo menos 3 caracteres.",
                maxlength: "O assunto deve ter no máximo 100 caracteres."
            },

            mensagem: {
                required: "Digite sua mensagem.",
                minlength: "A mensagem deve ter pelo menos 10 caracteres.",
                maxlength: "A mensagem deve ter no máximo 500 caracteres."
            }

        },


        // =====================================
        // MENSAGEM DE ERRO
        // =====================================

        errorPlacement: function (error, element) {

            console.log(
                "Erro no campo:",
                element.attr("name"),
                error.text()
            );


            const campo = element.closest(".mb-4");


            campo
                .find(".invalid-feedback")
                .text(error.text())
                .addClass("d-block");

        },


        // =====================================
        // CAMPO INVÁLIDO
        // =====================================

        highlight: function (element) {

            $(element)
                .removeClass("is-valid")
                .addClass("is-invalid");

        },


        // =====================================
        // CAMPO VÁLIDO
        // =====================================

        unhighlight: function (element) {

            const campo = $(element).closest(".mb-4");


            $(element)
                .removeClass("is-invalid")
                .addClass("is-valid");


            campo
                .find(".invalid-feedback")
                .text("")
                .removeClass("d-block");

        },


        // =====================================
        // FORMULÁRIO VÁLIDO
        // =====================================

        submitHandler: async function (formulario) {

            console.log("FORMULÁRIO DE CONTATO VÁLIDO!");


            // Captura os dados
            const dados = new FormData(formulario);


            // =================================
            // REMOVE MÁSCARA DO TELEFONE
            // =================================

            const telefone = $("#telefone")
                .val()
                .replace(/\D/g, "");


            dados.set("telefone", telefone);


            // Mostra os dados no console
            console.table(
                Object.fromEntries(dados.entries())
            );


            // =================================
            // MENSAGEM DE ENVIO
            // =================================

            mensagem
                .removeClass(
                    "d-none alert-danger alert-success"
                )
                .addClass("alert-info");


            mensagem.text(
                "Enviando mensagem..."
            );


            try {

                // =================================
                // ENVIA PARA O CONTROLLER
                // =================================

                const resposta = await fetch(
                    "controllers/ContatoController.php",
                    {
                        method: "POST",
                        body: dados
                    }
                );


                // =================================
                // RESPOSTA JSON
                // =================================

                const resultado =
                    await resposta.json();


                console.log(
                    "Resposta do PHP:",
                    resultado
                );


                // =================================
                // ERRO HTTP
                // =================================

                if (!resposta.ok) {

                    mensagem
                        .removeClass(
                            "alert-info alert-success"
                        )
                        .addClass("alert-danger");


                    mensagem.text(
                        resultado.mensagem ??
                        "Erro ao enviar mensagem."
                    );


                    return;
                }


                // =================================
                // SUCESSO
                // =================================

                mensagem
                    .removeClass(
                        "alert-info alert-danger"
                    )
                    .addClass("alert-success");


                mensagem.text(
                    resultado.mensagem
                );


                // Limpa o formulário
                formulario.reset();


                // Remove as classes
                // de validação
                $(formulario)
                    .find(".form-control")
                    .removeClass(
                        "is-valid is-invalid"
                    );


                // Limpa mensagens dos campos
                $(formulario)
                    .find(".invalid-feedback")
                    .text("")
                    .removeClass("d-block");


            } catch (erro) {

                console.error(
                    "Erro no fetch:",
                    erro
                );


                mensagem
                    .removeClass(
                        "alert-info alert-success"
                    )
                    .addClass("alert-danger");


                mensagem.text(
                    "Erro ao enviar os dados para o controller de contato."
                );

            }

        }

    });


    // =========================================
    // RESET DO FORMULÁRIO
    // =========================================

    $("#formContato").on("reset", function () {

        $(this)
            .find(".form-control")
            .removeClass(
                "is-valid is-invalid"
            );


        $(this)
            .find(".invalid-feedback")
            .text("")
            .removeClass("d-block");


        mensagem
            .removeClass(
                "alert-info alert-danger alert-success"
            )
            .addClass("d-none");


        mensagem.text("");

    });

}