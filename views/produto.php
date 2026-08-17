<!-- CSS da página -->
<link rel="stylesheet" href="assets/css/produto.css">

<section class="produto-container">

    <div class="produto-card">

        <!-- Cabeçalho -->
        <div class="produto-header">

            <div class="produto-icon">
                <i class="bi bi-box-seam"></i>
            </div>

            <div>
                <h2>Cadastro de produtos</h2>

                <p>
                    Preencha os dados abaixo para cadastrar um novo produto.
                </p>
            </div>

        </div>


        <!-- Formulário -->
        <form id="formProduto">


            <!-- Nome -->
            <div class="mb-4">

                <label for="nome" class="form-label">
                    Nome do produto
                </label>

                <div class="input-group">

                    <span class="input-group-text">
                        <i class="bi bi-box"></i>
                    </span>

                    <input
                        type="text"
                        id="nome"
                        name="nome"
                        class="form-control"
                        placeholder="Digite o nome do produto"
                    >

                </div>

                <div class="invalid-feedback"></div>
                <div class="valid-feedback"></div>

            </div>


            <!-- Categoria -->
            <div class="mb-4">

                <label for="categoria" class="form-label">
                    Categoria
                </label>

                <div class="input-group">

                    <span class="input-group-text">
                        <i class="bi bi-tags"></i>
                    </span>

                    <input
                        type="text"
                        id="categoria"
                        name="categoria"
                        class="form-control"
                        placeholder="Digite a categoria"
                    >

                </div>

                <div class="invalid-feedback"></div>
                <div class="valid-feedback"></div>

            </div>


            <!-- Preço -->
            <div class="mb-4">

                <label for="preco" class="form-label">
                    Preço
                </label>

                <div class="input-group">

                    <span class="input-group-text">
                        R$
                    </span>

                    <input
                        type="text"
                        id="preco"
                        name="preco"
                        class="form-control"
                        placeholder="0,00"
                    >

                </div>

                <div class="invalid-feedback"></div>
                <div class="valid-feedback"></div>

            </div>


            <!-- Quantidade -->
            <div class="mb-4">

                <label for="quantidade" class="form-label">
                    Quantidade
                </label>

                <div class="input-group">

                    <span class="input-group-text">
                        <i class="bi bi-123"></i>
                    </span>

                    <input
                        type="text"
                        id="quantidade"
                        name="quantidade"
                        class="form-control"
                        placeholder="Digite a quantidade"
                    >

                </div>

                <div class="invalid-feedback"></div>
                <div class="valid-feedback"></div>

            </div>


            <!-- Botão -->
            <button
                type="submit"
                class="btn btn-primary produto-button w-100"
            >

                <i class="bi bi-check-circle me-2"></i>

                Cadastrar produto

            </button>

        </form>


        <!-- Mensagem de Retorno -->
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
<script src="assets/js/produto.js"></script>
