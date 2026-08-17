// =========================================
// FUNCIONÁRIO - JQUERY
// =========================================

$(document).ready(function () {

    console.log("funcionario.js carregado!");

    // Aplica as máscaras
    aplicarMascaras();

    // Configura a validação
    validarFormulario();

});


// =========================================
// MÁSCARAS
// =========================================

function aplicarMascaras() {

    // CNPJ
    // 00.000.000/0000-00
    $("#cnpj").mask("00.000.000/0000-00");


    // PIS
    // 000.00000.00-0
    $("#pis").mask("000.00000.00-0");


    // Registro
    // 0-0000
    $("#regFunc").mask("0-0000");

}


// =========================================
// VALIDAÇÃO DO FORMULÁRIO
// =========================================

function validarFormulario() {

    console.log("Validação do funcionário iniciada!");

    const mensagem = $("#mensagem");


    $("#formFuncionario").validate({

        // =====================================
        // REGRAS
        // =====================================

        rules: {

            nome: {
                required: true,
                minlength: 3,
                maxlength: 100
            },

            cnpj: {
                required: true,
                minlength: 18,
                maxlength: 18
            },

            regFunc: {
                required: true
            },

            pis: {
                required: true,
                minlength: 14,
                maxlength: 14
            }

        },


        // =====================================
        // MENSAGENS
        // =====================================

        messages: {

            nome: {
                required: "Informe o nome do funcionário.",
                minlength: "O nome deve ter pelo menos 3 caracteres.",
                maxlength: "O nome deve ter no máximo 100 caracteres."
            },

            cnpj: {
                required: "Informe o CNPJ do funcionário.",
                minlength: "O CNPJ deve ter 18 caracteres.",
                maxlength: "O CNPJ deve ter 18 caracteres."
            },

            regFunc: {
                required: "Informe o registro do funcionário."
            },

            pis: {
                required: "Informe o PIS do funcionário.",
                minlength: "O PIS deve ter 14 caracteres.",
                maxlength: "O PIS deve ter 14 caracteres."
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


            // Procura a mensagem dentro do bloco
            // do campo
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

            console.log("FORMULÁRIO DE FUNCIONÁRIO VÁLIDO!");


            // Captura os dados
            const dados = new FormData(formulario);


            // =================================
            // REMOVE MÁSCARAS
            // =================================

            // CNPJ
            const cnpj = $("#cnpj")
                .val()
                .replace(/\D/g, "");


            // PIS
            const pis = $("#pis")
                .val()
                .replace(/\D/g, "");


            // Registro
            const regFunc = $("#regFunc")
                .val()
                .replace(/\D/g, "");


            // Atualiza o FormData
            dados.set("cnpj", cnpj);
            dados.set("pis", pis);
            dados.set("regFunc", regFunc);


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
                "Enviando dados..."
            );


            try {

                // =================================
                // ENVIA PARA O CONTROLLER
                // =================================

                const resposta = await fetch(
                    "controllers/FuncionarioController.php",
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
                        "Erro ao cadastrar funcionário."
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
                    "Erro ao enviar os dados para o controller de funcionário."
                );

            }

        }

    });


    // =========================================
    // RESET DO FORMULÁRIO
    // =========================================

    $("#formFuncionario").on("reset", function () {

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
