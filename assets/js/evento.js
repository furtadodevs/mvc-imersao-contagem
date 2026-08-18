// =========================================
// EVENTO - JQUERY
// =========================================

$(document).ready(function () {

    console.log("evento.js carregado!");

    aplicarMascaras();
    validarFormulario();

});


// =========================================
// MÁSCARAS
// =========================================

function aplicarMascaras() {

    // Telefone
    $("#telefone").mask("(00) 00000-0000");

}


// =========================================
// VALIDAÇÃO
// =========================================

function validarFormulario() {

    console.log("Validação do evento iniciada!");

    const mensagem = $("#mensagem");


    $("#formEvento").validate({

        // =====================================
        // REGRAS
        // =====================================

        rules: {

            titulo: {
                required: true,
                minlength: 3
            },

            categoria: {
                required: true
            },

            descricao: {
                required: true,
                minlength: 10
            },

            imagem: {
                required: true
            },

            data: {
                required: true
            },

            horario: {
                required: true
            },

            local: {
                required: true,
                minlength: 3
            },

            endereco: {
                required: true,
                minlength: 5
            },

            telefone: {
                required: true,
                minlength: 14
            },

            email: {
                required: true,
                email: true
            },

            site: {
                required: true
            }

        },


        // =====================================
        // MENSAGENS
        // =====================================

        messages: {

            titulo: {
                required: "Informe o título do evento.",
                minlength: "O título deve ter pelo menos 3 caracteres."
            },

            categoria: {
                required: "Selecione uma categoria."
            },

            descricao: {
                required: "Digite uma descrição para o evento.",
                minlength: "A descrição deve ter pelo menos 10 caracteres."
            },

            imagem: {
                required: "Selecione uma imagem de capa."
            },

            data: {
                required: "Informe a data do evento."
            },

            horario: {
                required: "Informe o horário do evento."
            },

            local: {
                required: "Informe o local do evento.",
                minlength: "O local deve ter pelo menos 3 caracteres."
            },

            endereco: {
                required: "Informe o endereço do evento.",
                minlength: "Digite um endereço válido."
            },

            telefone: {
                required: "Informe o telefone.",
                minlength: "Informe um telefone válido."
            },

            email: {
                required: "Informe o e-mail.",
                email: "Digite um e-mail válido."
            },

            site: {
                required: "Informe o site."
            }

        },


        // =====================================
        // MENSAGEM DE ERRO
        // =====================================

        errorPlacement: function (error, element) {

            console.log(
                "Erro no campo:",
                element.attr("id"),
                error.text()
            );
        
            const campo = element.closest(
                ".col-md-4, .col-md-6, .col-12"
            );
        
            campo
                .find(".invalid-feedback")
                .first()
                .text(error.text())
                .addClass("d-block");
        },

        // =====================================
        // CAMPO INVÁLIDO
        // =====================================

        unhighlight: function (element) {

            const campo = $(element).closest(
                ".col-md-4, .col-md-6, .col-12"
            );
        
            $(element)
                .removeClass("is-invalid")
                .addClass("is-valid");
        
            campo
                .find(".invalid-feedback")
                .first()
                .text("")
                .removeClass("d-block");
        },


        // =====================================
        // CAMPO VÁLIDO
        // =====================================

        unhighlight: function (element) {

            const campo = $(element)
                .closest(".col-md-4, .col-md-6, .col-12");


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

            console.log("FORMULÁRIO DE EVENTO VÁLIDO!");


            // =================================
            // FORMDATA
            // =================================

            const dados = new FormData(formulario);


            // =================================
            // MOSTRA DADOS NO CONSOLE
            // =================================

            console.table(
                Object.fromEntries(dados.entries())
            );


            // =================================
            // MENSAGEM
            // =================================

            mensagem
                .removeClass(
                    "d-none alert-danger alert-success"
                )
                .addClass("alert-info");

            mensagem.text(
                "Enviando dados do evento..."
            );


            // =================================
            // ENVIO PARA O CONTROLLER
            // =================================

            try {

                const resposta = await fetch(
                    "controllers/EventoController.php",
                    {
                        method: "POST",
                        body: dados
                    }
                );


                const resultado = await resposta.json();


                console.log(
                    "Resposta do PHP:",
                    resultado
                );


                // =================================
                // ERRO
                // =================================

                if (!resposta.ok) {

                    mensagem
                        .removeClass(
                            "alert-info alert-success"
                        )
                        .addClass("alert-danger");


                    mensagem.text(
                        resultado.mensagem ||
                        "Erro ao cadastrar evento."
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
                    resultado.mensagem ||
                    "Evento cadastrado com sucesso!"
                );


                // =================================
                // LIMPA FORMULÁRIO
                // =================================

                formulario.reset();


                $(formulario)
                    .find(".form-control, .form-select")
                    .removeClass(
                        "is-valid is-invalid"
                    );


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
                    "Erro ao conectar com o controller."
                );

            }

        }

    });


    // =========================================
    // RESET
    // =========================================

    $("#formEvento").on("reset", function () {

        $(this)
            .find(".form-control, .form-select")
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