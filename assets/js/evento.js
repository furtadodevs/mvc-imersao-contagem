// =========================================
// EVENTO - JQUERY
// =========================================

$(document).ready(function () {

    console.log("evento.js carregado!");

    prepararCampos();

    aplicarMascaras();

    $("#formEvento").on("submit", function (event) {
        event.preventDefault();
    });

    validarFormulario();
 // =========================================
// BOTÃO CANCELAR
// =========================================

$(".btn-cancelar").on("click", function () {

    window.location.href = "index.php?page=home";

});

});


// =========================================
// PREPARA OS CAMPOS
// =========================================

function prepararCampos() {

    // =====================================
    // ADICIONA NAME AOS CAMPOS
    // =====================================

    $("#titulo").attr("name", "titulo");

    $("#categoria").attr("name", "categoria");

    $("#descricao").attr("name", "descricao");

    $("#imagem").attr("name", "imagem");

    $("#data").attr("name", "data");

    $("#horario").attr("name", "horario");

    $("#local").attr("name", "local");

    $("#endereco").attr("name", "endereco");

    $("#telefone").attr("name", "telefone");

    $("#email").attr("name", "email");

    $("#site").attr("name", "site");

}


// =========================================
// MÁSCARAS
// =========================================

function aplicarMascaras() {

    $("#telefone").mask("(00) 00000-0000");

}


// =========================================
// VALIDAÇÕES PERSONALIZADAS
// =========================================

function configurarValidacoesCustomizadas() {

    // =====================================
    // TELEFONE
    // =====================================

    $.validator.addMethod(
        "telefoneValido",
        function (value, element) {

            if (this.optional(element)) {
                return true;
            }

            return /^\(\d{2}\) \d{5}-\d{4}$/.test(value);

        },
        "Informe um telefone válido."
    );


    // =====================================
    // SITE
    // =====================================

    $.validator.addMethod(
        "siteValido",
        function (value, element) {

            if (this.optional(element)) {
                return true;
            }

            value = value.trim();

            return /^(https?:\/\/)?(www\.)?[a-zA-Z0-9-]+(\.[a-zA-Z]{2,})(\/.*)?$/.test(value);

        },
        "Digite um site válido."
    );


    // =====================================
    // DATA
    // =====================================

    $.validator.addMethod(
        "dataValida",
        function (value, element) {

            if (this.optional(element)) {
                return true;
            }

            if (!/^\d{4}-\d{2}-\d{2}$/.test(value)) {
                return false;
            }

            const partes = value.split("-");

            const ano = parseInt(partes[0]);
            const mes = parseInt(partes[1]) - 1;
            const dia = parseInt(partes[2]);

            const data = new Date(
                ano,
                mes,
                dia
            );

            return (
                data.getFullYear() === ano &&
                data.getMonth() === mes &&
                data.getDate() === dia
            );

        },
        "Informe uma data válida."
    );


    // =====================================
    // HORÁRIO
    // =====================================

    $.validator.addMethod(
        "horarioValido",
        function (value, element) {

            if (this.optional(element)) {
                return true;
            }

            return /^(?:[01]\d|2[0-3]):[0-5]\d$/.test(value);

        },
        "Informe um horário válido."
    );


    // =====================================
    // IMAGEM
    // =====================================

    $.validator.addMethod(
        "imagemValida",
        function (value, element) {

            if (!element.files || element.files.length === 0) {
                return false;
            }

            const arquivo = element.files[0];

            return arquivo.type.startsWith("image/");

        },
        "Selecione uma imagem válida."
    );

}


// =========================================
// VALIDAÇÃO
// =========================================

function validarFormulario() {

    console.log("Validação do evento iniciada!");

    const mensagem = $("#mensagem");

    configurarValidacoesCustomizadas();


    $("#formEvento").validate({
        

        // =====================================
        // NÃO PERMITE ENVIO SE EXISTIREM ERROS
        // =====================================

        onsubmit: true,

        // =====================================
        // REGRAS
        // =====================================

        rules: {

            titulo: {
                required: true,
                minlength: 3,
                maxlength: 100
            },

            categoria: {
                required: true
            },

            descricao: {
                required: true,
                minlength: 10,
                maxlength: 2000
            },

            imagem: {
                required: true,
                imagemValida: true
            },

            data: {
                required: true,
                dataValida: true
            },

            horario: {
                required: true,
                horarioValido: true
            },

            local: {
                required: true,
                minlength: 3,
                maxlength: 150
            },

            endereco: {
                required: true,
                minlength: 5,
                maxlength: 200
            },

            telefone: {
                required: true,
                telefoneValido: true
            },

            email: {
                required: true,
                email: true
            },

            site: {
                required: true,
                siteValido: true
            }

        },


        // =====================================
        // MENSAGENS
        // =====================================

        messages: {

            titulo: {
                required: "Informe o título do evento.",
                minlength: "O título deve ter pelo menos 3 caracteres.",
                maxlength: "O título deve ter no máximo 100 caracteres."
            },

            categoria: {
                required: "Selecione uma categoria."
            },

            descricao: {
                required: "Informe a descrição do evento.",
                minlength: "A descrição deve ter pelo menos 10 caracteres.",
                maxlength: "A descrição deve ter no máximo 2000 caracteres."
            },

            imagem: {
                required: "Selecione uma imagem de capa.",
                imagemValida: "Selecione uma imagem válida."
            },

            data: {
                required: "Informe a data do evento.",
                dataValida: "Informe uma data válida."
            },

            horario: {
                required: "Informe o horário do evento.",
                horarioValido: "Informe um horário válido."
            },

            local: {
                required: "Informe o local do evento.",
                minlength: "O local deve ter pelo menos 3 caracteres.",
                maxlength: "O local deve ter no máximo 150 caracteres."
            },

            endereco: {
                required: "Informe o endereço do evento.",
                minlength: "O endereço deve ter pelo menos 5 caracteres.",
                maxlength: "O endereço deve ter no máximo 200 caracteres."
            },

            telefone: {
                required: "Informe o telefone.",
                telefoneValido: "Informe o telefone completo: (00) 00000-0000."
            },

            email: {
                required: "Informe o e-mail.",
                email: "Digite um e-mail válido."
            },

            site: {
                required: "Informe o site.",
                siteValido: "Digite um site válido."
            }

        },


        // =====================================
        // MOSTRA O ERRO
        // =====================================

        errorPlacement: function (error, element) {

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

highlight: function (element) {

    const campo = $(element).closest(
        ".col-md-4, .col-md-6, .col-12"
    );

    $(element)
        .removeClass("is-valid")
        .addClass("is-invalid")
        .css("background-image", "none");

    campo
        .find(".invalid-feedback")
        .first()
        .addClass("d-block");

},


        // =====================================
        // CAMPO VÁLIDO
        // =====================================

unhighlight: function (element) {

    const campo = $(element).closest(
        ".col-md-4, .col-md-6, .col-12"
    );

    $(element)
        .removeClass("is-invalid")
        .addClass("is-valid")
        .css("background-image", "none");

    campo
        .find(".invalid-feedback")
        .first()
        .text("")
        .removeClass("d-block");

},
        // =====================================
        // FORMULÁRIO VÁLIDO
        // =====================================

        submitHandler: async function (formulario) {

            console.log(
                "FORMULÁRIO LOCALMENTE VÁLIDO!"
            );


            const dados = new FormData(
                formulario
            );


            console.table(
                Object.fromEntries(
                    dados.entries()
                )
            );


            mensagem
                .removeClass(
                    "d-none alert-danger alert-success"
                )
                .addClass("alert-info");


            mensagem.text(
                "Enviando dados do evento..."
            );


            try {

                const resposta = await fetch(
                    "controllers/EventoController.php",
                    {
                        method: "POST",
                        body: dados
                    }
                );


                const resultado =
                    await resposta.json();


                console.log(
                    "Resposta do Controller:",
                    resultado
                );


                // =================================
                // CONTROLLER REJEITOU
                // =================================

                if (!resposta.ok || resultado.sucesso !== true) {

                    mensagem
                        .removeClass(
                            "alert-info alert-success"
                        )
                        .addClass("alert-danger");


                    mensagem.text(
                        resultado.mensagem ||
                        "Corrija os campos indicados."
                    );


                    mostrarErrosController(
                        resultado.erros
                    );


                    return false;
                }


                // =================================
                // SUCESSO
                // =================================

                const toastElemento = document.getElementById("toastSucesso");

                const toastMensagem = $(toastElemento)
                    .find(".toast-body");

                toastMensagem.text(
                    resultado.mensagem ||
                    "Evento cadastrado com sucesso!"
                );

                const toast = new bootstrap.Toast(
                    toastElemento,
                    {
                        autohide: true,
                        delay: 4000
                    }
                );

                toast.show();


                // =================================
                // LIMPA O FORMULÁRIO
                // =================================

                formulario.reset();


                $(formulario)
                    .find(
                        ".form-control, .form-select"
                    )
                    .removeClass(
                        "is-valid is-invalid"
                    );


                $(formulario)
                    .find(".invalid-feedback")
                    .text("")
                    .removeClass("d-block");

                    
                    // =================================
                    // REDIRECIONA PARA HOME
                    // =================================

                    setTimeout(function () {

                        window.location.href = "index.php?page=home";

                    }, 3000);

            }

            


            catch (erro) {

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
                        .find(
                            ".form-control, .form-select"
                        )
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


            // =========================================
            // ERROS DO CONTROLLER
            // =========================================

            function mostrarErrosController(erros) {

                if (!erros) {
                    return;
                }


                $.each(
                    erros,
                    function (campo, mensagens) {

                        const elemento = $("#" + campo);


                        if (!elemento.length) {
                            return;
                        }


                        const container = elemento.closest(
                            ".col-md-4, .col-md-6, .col-12"
                        );


                        let mensagemErro = mensagens;


                        if (Array.isArray(mensagens)) {
                            mensagemErro = mensagens[0];
                        }


                        elemento
                            .removeClass("is-valid")
                            .addClass("is-invalid");


                        container
                            .find(".invalid-feedback")
                            .first()
                            .text(mensagemErro)
                            .addClass("d-block");

                    }
                );

            }