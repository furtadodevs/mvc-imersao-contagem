// =========================================
// PRODUTO - JQUERY
// =========================================

$(document).ready(function () {

    console.log("produto.js carregado!");

    aplicarMascaras();
    validarFormulario();

});


// =========================================
// MÁSCARAS
// =========================================

function aplicarMascaras() {

    $("#preco").mask("000.000.000,00", {
        reverse: true
    });

    $("#quantidade").mask("000000");

}


// =========================================
// VALIDAÇÃO
// =========================================

function validarFormulario() {

    console.log("Validação iniciada!");

    const mensagem = $("#mensagem");


    $("#formProduto").validate({

        // =====================================
        // REGRAS
        // =====================================

        rules: {

            nome: {
                required: true,
                minlength: 3
            },

            categoria: {
                required: true,
                minlength: 3
            },

            preco: {
                required: true
            },

            quantidade: {
                required: true,
                digits: true,
                min: 1
            }

        },


        // =====================================
        // MENSAGENS
        // =====================================

        messages: {

            nome: {
                required: "Informe o nome do produto.",
                minlength: "O nome deve ter pelo menos 3 caracteres."
            },

            categoria: {
                required: "Informe a categoria do produto.",
                minlength: "A categoria deve ter pelo menos 3 caracteres."
            },

            preco: {
                required: "Informe o preço do produto."
            },

            quantidade: {
                required: "Informe a quantidade.",
                digits: "Digite somente números inteiros.",
                min: "A quantidade deve ser maior ou igual a 1."
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

            console.log("FORMULÁRIO VÁLIDO!");

            const dados = new FormData(formulario);


            // Converte preço
            const preco = $("#preco")
                .val()
                .replace(/\./g, "")
                .replace(",", ".");

            dados.set("preco", preco);


            console.table(
                Object.fromEntries(dados.entries())
            );


            // Mensagem
            mensagem
                .removeClass("d-none alert-danger alert-success")
                .addClass("alert-info");

            mensagem.text("Enviando dados...");


            try {

                const resposta = await fetch(
                    "controllers/ProdutoController.php",
                    {
                        method: "POST",
                        body: dados
                    }
                );


                const resultado = await resposta.json();

                console.log("Resposta do PHP:", resultado);


                // =================================
                // ERRO
                // =================================

                if (!resposta.ok) {

                    mensagem
                        .removeClass("alert-info alert-success")
                        .addClass("alert-danger");

                    mensagem.text(
                        resultado.mensagem ||
                        "Erro ao cadastrar produto."
                    );

                    return;
                }


                // =================================
                // SUCESSO
                // =================================

                mensagem
                    .removeClass("alert-info alert-danger")
                    .addClass("alert-success");

                mensagem.text(
                    resultado.mensagem
                );


                formulario.reset();


                $(formulario)
                    .find(".form-control")
                    .removeClass("is-valid is-invalid");


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
                    .removeClass("alert-info alert-success")
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

    $("#formProduto").on("reset", function () {

        $(this)
            .find(".form-control")
            .removeClass("is-valid is-invalid");

        $(this)
            .find(".invalid-feedback")
            .text("")
            .removeClass("d-block");

        mensagem
            .removeClass("alert-info alert-danger alert-success")
            .addClass("d-none");

        mensagem.text("");

    });

}
