<!-- CSS da página -->
<link rel="stylesheet" href="assets/css/contato.css">

<section class="contato-container">

    <div class="contato-card">

        <!-- Cabeçalho -->
        <div class="contato-header">

            <div class="contato-icon">
                <i class="bi bi-envelope"></i>
            </div>

            <div>
                <h2>Entre em contato</h2>

                <p>
                    Preencha os dados abaixo para enviar uma mensagem.
                </p>
            </div>

        </div>


        <!-- Formulário -->
        <form id="formContato">


            <!-- Nome -->
            <div class="mb-4">

                <label for="nome" class="form-label">
                    Nome
                </label>

                <div class="input-group">

                    <span class="input-group-text">
                        <i class="bi bi-person"></i>
                    </span>

                    <input
                        type="text"
                        id="nome"
                        name="nome"
                        class="form-control"
                        placeholder="Digite seu nome completo"
                    >

                </div>

                <div class="invalid-feedback"></div>
                <div class="valid-feedback"></div>

            </div>


            <!-- E-mail -->
            <div class="mb-4">

                <label for="email" class="form-label">
                    E-mail
                </label>

                <div class="input-group">

                    <span class="input-group-text">
                        <i class="bi bi-envelope"></i>
                    </span>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control"
                        placeholder="Digite seu e-mail"
                    >

                </div>

                <div class="invalid-feedback"></div>
                <div class="valid-feedback"></div>

            </div>


            <!-- Telefone -->
            <div class="mb-4">

                <label for="telefone" class="form-label">
                    Telefone
                </label>

                <div class="input-group">

                    <span class="input-group-text">
                        <i class="bi bi-telephone"></i>
                    </span>

                    <input
                        type="text"
                        id="telefone"
                        name="telefone"
                        class="form-control"
                        placeholder="(00) 00000-0000"
                    >

                </div>

                <div class="invalid-feedback"></div>
                <div class="valid-feedback"></div>

            </div>


            <!-- Assunto -->
            <div class="mb-4">

                <label for="assunto" class="form-label">
                    Assunto
                </label>

                <div class="input-group">

                    <span class="input-group-text">
                        <i class="bi bi-chat-left-text"></i>
                    </span>

                    <input
                        type="text"
                        id="assunto"
                        name="assunto"
                        class="form-control"
                        placeholder="Digite o assunto"
                    >

                </div>

                <div class="invalid-feedback"></div>
                <div class="valid-feedback"></div>

            </div>


            <!-- Mensagem -->
            <div class="mb-4">

                <label for="mensagemTexto" class="form-label">
                    Mensagem
                </label>

                <div class="input-group">

                    <span class="input-group-text contato-textarea-icon">
                        <i class="bi bi-pencil-square"></i>
                    </span>

                    <textarea
                        id="mensagemTexto"
                        name="mensagem"
                        class="form-control contato-textarea"
                        placeholder="Digite sua mensagem"
                        rows="5"
                    ></textarea>

                </div>

                <div class="invalid-feedback"></div>
                <div class="valid-feedback"></div>

            </div>


            <!-- Botão -->
            <button
                type="submit"
                class="btn btn-primary contato-button w-100"
            >

                <i class="bi bi-send me-2"></i>

                Enviar mensagem

            </button>


        </form>


        <!-- Mensagem de retorno -->
        <div
            id="mensagem"
            class="alert d-none mt-3"
        >
        </div>

    </div>

</section>


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- jQuery Validation -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

<!-- jQuery Mask -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<!-- Script da página -->
<script src="assets/js/contato.js"></script>