<!DOCTYPE html>

<html lang="pt-BR">

<head>


<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Sistema de Cadastros</title>


<!-- Bootstrap -->
<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
>


<!-- Bootstrap Icons -->
<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
>


<!-- Fonte -->
<link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
    rel="stylesheet"
>


<!-- CSS geral -->
<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<?php

// Captura a página atual
$page = $_GET["page"] ?? "landing";


// Se estiver na Landing ou Login,
// não mostra o menu interno.
$paginaInicial = ($page === "landing" || $page === "login");

?>

<?php if (!$paginaInicial): ?>


<!-- ==============================
     NAVBAR
     ============================== -->

<header class="navbar-sistema">

    <div class="container">

        <div class="navbar-content">


            <!-- Logo -->

            <a
                href="index.php?page=home"
                class="logo-sistema"
            >

                <i class="bi bi-grid-1x2-fill"></i>

                <span>
                    Sistema de Cadastros
                </span>

            </a>


            <!-- Menu -->

            <nav class="menu-sistema">


                <!-- Home -->

                <a
                    href="index.php?page=home"
                    class="<?= $page === 'home' ? 'active' : '' ?>"
                >

                    <i class="bi bi-house"></i>

                    Home

                </a>


                <!-- Produtos -->

                <a
                    href="index.php?page=produtos"
                    class="<?= $page === 'produtos' ? 'active' : '' ?>"
                >

                    <i class="bi bi-box-seam"></i>

                    Produtos

                </a>


                <!-- Clientes -->

                <a
                    href="index.php?page=clientes"
                    class="<?= $page === 'clientes' ? 'active' : '' ?>"
                >

                    <i class="bi bi-people"></i>

                    Clientes

                </a>


                <!-- Funcionários -->

                <a
                    href="index.php?page=funcionarios"
                    class="<?= $page === 'funcionarios' ? 'active' : '' ?>"
                >

                    <i class="bi bi-person-badge"></i>

                    Funcionários

                </a>


                <!-- Contato -->

                <a
                    href="index.php?page=contato"
                    class="<?= $page === 'contato' ? 'active' : '' ?>"
                >

                    <i class="bi bi-envelope"></i>

                    Contato

                </a>


                <!-- Sair -->

                <a
                    href="index.php?page=landing"
                    class="sair"
                >

                    <i class="bi bi-box-arrow-right"></i>

                    Sair

                </a>


            </nav>

        </div>

    </div>

</header>


<?php endif; ?>

<!-- ==============================
     CONTEÚDO
     ============================== -->

<main class="<?= $paginaInicial ? '' : 'conteudo-sistema' ?>">


<?php

// Carrega todas as páginas através do routes.php
require __DIR__ . "/routes.php";

?>


</main>

<?php if (!$paginaInicial): ?>


<!-- ==============================
     FOOTER
     ============================== -->

<footer class="footer-sistema">

    <p>
        Sistema de Cadastros
    </p>

</footer>


<?php endif; ?>

<!-- Bootstrap -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js">
</script>

<!-- Constantes -->

<script src="config/constants.js"></script>

<!-- Helpers -->

<script src="js/helpers.js"></script>

</body>

</html>
