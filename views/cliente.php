<!-- CSS da página -->
<link rel="stylesheet" href="assets/css/cliente.css">

<section class="cliente-container">

    <div class="cliente-card">

        <!-- Cabeçalho -->
        <div class="cliente-header">

            <div class="cliente-icon">
                <i class="bi bi-people"></i>
            </div>

            <div>
                <h2>Cadastro de clientes</h2>

                <p>
                    Preencha os dados abaixo para cadastrar um novo cliente.
                </p>
            </div>

        </div>


        <!-- Formulário -->
        <form id="formCliente">


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
                        placeholder="Digite o nome completo"
                    >

                </div>

                <div class="invalid-feedback"></div>
                <div class="valid-feedback"></div>

            </div>


            <!-- CPF -->
            <div class="mb-4">

                <label for="cpf" class="form-label">
                    CPF
                </label>

                <div class="input-group">

                    <span class="input-group-text">
                        <i class="bi bi-card-text"></i>
                    </span>

                    <input
                        type="text"
                        id="cpf"
                        name="cpf"
                        class="form-control"
                        placeholder="000.000.000-00"
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
                        placeholder="exemplo@email.com"
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


            <!-- Botão cadastrar -->
            <button
                type="submit"
                class="btn btn-primary cliente-button w-100"
            >

                <i class="bi bi-person-plus me-2"></i>

                Cadastrar cliente

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
<script src="assets/js/cliente.js"></script>
