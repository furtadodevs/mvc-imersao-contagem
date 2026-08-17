<!-- CSS da página -->
<link rel="stylesheet" href="assets/css/funcionario.css">

<section class="funcionario-container">

    <div class="funcionario-card">

        <!-- Cabeçalho -->
        <div class="funcionario-header">

            <div class="funcionario-icon">
                <i class="bi bi-person-badge"></i>
            </div>

            <div>
                <h2>Cadastro de funcionário</h2>

                <p>
                    Preencha os dados abaixo para cadastrar um novo funcionário.
                </p>
            </div>

        </div>


        <!-- Formulário -->
        <form id="formFuncionario">


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


            <!-- CNPJ -->
            <div class="mb-4">

                <label for="cnpj" class="form-label">
                    CNPJ
                </label>

                <div class="input-group">

                    <span class="input-group-text">
                        <i class="bi bi-building"></i>
                    </span>

                    <input
                        type="text"
                        id="cnpj"
                        name="cnpj"
                        class="form-control"
                        placeholder="00.000.000/0000-00"
                    >

                </div>

                <div class="invalid-feedback"></div>
                <div class="valid-feedback"></div>

            </div>


            <!-- Registro do Funcionário -->
            <div class="mb-4">

                <label for="regFunc" class="form-label">
                    Registro do funcionário
                </label>

                <div class="input-group">

                    <span class="input-group-text">
                        <i class="bi bi-card-text"></i>
                    </span>

                    <input
                        type="text"
                        id="regFunc"
                        name="regFunc"
                        class="form-control"
                        placeholder="Digite o registro"
                    >

                </div>

                <div class="invalid-feedback"></div>
                <div class="valid-feedback"></div>

            </div>


            <!-- PIS -->
            <div class="mb-4">

                <label for="pis" class="form-label">
                    PIS
                </label>

                <div class="input-group">

                    <span class="input-group-text">
                        <i class="bi bi-credit-card-2-front"></i>
                    </span>

                    <input
                        type="text"
                        id="pis"
                        name="pis"
                        class="form-control"
                        placeholder="000.00000.00-0"
                    >

                </div>

                <div class="invalid-feedback"></div>
                <div class="valid-feedback"></div>

            </div>


            <!-- Botão cadastrar -->
            <button
                type="submit"
                class="btn btn-primary funcionario-button w-100"
            >

                <i class="bi bi-person-plus me-2"></i>

                Cadastrar funcionário

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
<script src="assets/js/funcionario.js"></script>
