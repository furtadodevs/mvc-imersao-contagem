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


<!-- Fonte Poppins -->
<link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
    rel="stylesheet"
>


<!-- CSS da página -->
<link rel="stylesheet" href="assets/css/landing.css">


</head>

<body>

<!-- =========================================
     CABEÇALHO
     ========================================= -->

<header class="landing-header">


<nav class="navbar">

    <div class="container">

        <div class="landing-nav">


            <!-- Logo -->

            <a
                href="index.php?page=landing"
                class="landing-logo"
            >

                <span class="logo-icon">
                    <i class="bi bi-grid-1x2-fill"></i>
                </span>

                <span>
                    Sistema de Cadastros
                </span>

            </a>


            <!-- Botão Login -->

            <a
                href="index.php?page=login"
                class="btn-login"
            >

                <i class="bi bi-box-arrow-in-right"></i>

                Entrar

            </a>

        </div>

    </div>

</nav>


</header>

<!-- =========================================
     CONTEÚDO PRINCIPAL
     ========================================= -->

<main>


<!-- =====================================
     HERO
     ===================================== -->

<section class="hero">

    <div class="container">

        <div class="row align-items-center">


            <!-- Texto -->

            <div class="col-lg-6">

                <span class="hero-badge">

                    <i class="bi bi-stars"></i>

                    Sistema de Gestão

                </span>


                <h1>

                    Gerencie seus cadastros
                    <span>de forma simples.</span>

                </h1>


                <p class="hero-description">

                    Organize produtos, clientes e funcionários
                    em um único sistema, de forma prática,
                    rápida e eficiente.

                </p>


                <p class="hero-subtitle">

                    Uma solução desenvolvida com PHP, MVC,
                    Bootstrap, JavaScript e jQuery.

                </p>


                <!-- Botão -->

                <div class="hero-buttons">

                    <a
                        href="index.php?page=login"
                        class="btn-primary-purple"
                    >

                        <i class="bi bi-box-arrow-in-right"></i>

                        Acessar o sistema

                    </a>

                </div>

            </div>



            <!-- Painel visual -->

            <div class="col-lg-6 mt-5 mt-lg-0">

                <div class="dashboard-card">


                    <div class="dashboard-header">

                        <div>

                            <span class="small-label">
                                PAINEL
                            </span>

                            <h3>
                                Sistema de Cadastros
                            </h3>

                        </div>

                        <div class="dashboard-icon">

                            <i class="bi bi-speedometer2"></i>

                        </div>

                    </div>


                    <p class="dashboard-text">

                        Tenha suas principais informações
                        organizadas em um só lugar.

                    </p>


                    <!-- Categorias -->

                    <div class="dashboard-options">


                        <!-- Produtos -->

                        <a
                            href="index.php?page=produtos"
                            class="dashboard-option"
                        >

                            <div class="option-icon">

                                <i class="bi bi-box-seam"></i>

                            </div>

                            <div>

                                <strong>
                                    Produtos
                                </strong>

                                <small>
                                    Gerenciar produtos
                                </small>

                            </div>

                        </a>


                        <!-- Clientes -->

                        <a
                            href="index.php?page=clientes"
                            class="dashboard-option"
                        >

                            <div class="option-icon">

                                <i class="bi bi-people"></i>

                            </div>

                            <div>

                                <strong>
                                    Clientes
                                </strong>

                                <small>
                                    Gerenciar clientes
                                </small>

                            </div>

                        </a>


                        <!-- Funcionários -->

                        <a
                            href="index.php?page=funcionarios"
                            class="dashboard-option"
                        >

                            <div class="option-icon">

                                <i class="bi bi-person-badge"></i>

                            </div>

                            <div>

                                <strong>
                                    Funcionários
                                </strong>

                                <small>
                                    Gerenciar funcionários
                                </small>

                            </div>

                        </a>


                        <!-- Contato -->

                        <a
                            href="index.php?page=contato"
                            class="dashboard-option"
                        >

                            <div class="option-icon">

                                <i class="bi bi-envelope"></i>

                            </div>

                            <div>

                                <strong>
                                    Contato
                                </strong>

                                <small>
                                    Enviar uma mensagem
                                </small>

                            </div>

                        </a>


                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- =====================================
     RECURSOS
     ===================================== -->

<section class="resources">

    <div class="container">


        <div class="section-title">

            <span>
                FUNCIONALIDADES
            </span>

            <h2>
                Tudo organizado em um só lugar
            </h2>

            <p>
                Tenha acesso rápido às principais áreas
                do sistema.
            </p>

        </div>


        <div class="row g-4">


            <!-- Produtos -->

            <div class="col-md-4">

                <div class="feature-card">

                    <div class="feature-icon">

                        <i class="bi bi-box-seam"></i>

                    </div>

                    <h5>
                        Produtos
                    </h5>

                    <p>
                        Cadastre e gerencie os produtos
                        do sistema de maneira organizada.
                    </p>

                    <a href="index.php?page=produtos">

                        Acessar

                        <i class="bi bi-arrow-right"></i>

                    </a>

                </div>

            </div>



            <!-- Clientes -->

            <div class="col-md-4">

                <div class="feature-card">

                    <div class="feature-icon">

                        <i class="bi bi-people"></i>

                    </div>

                    <h5>
                        Clientes
                    </h5>

                    <p>
                        Organize os dados e informações
                        dos clientes cadastrados.
                    </p>

                    <a href="index.php?page=clientes">

                        Acessar

                        <i class="bi bi-arrow-right"></i>

                    </a>

                </div>

            </div>



            <!-- Funcionários -->

            <div class="col-md-4">

                <div class="feature-card">

                    <div class="feature-icon">

                        <i class="bi bi-person-badge"></i>

                    </div>

                    <h5>
                        Funcionários
                    </h5>

                    <p>
                        Gerencie os funcionários
                        cadastrados no sistema.
                    </p>

                    <a href="index.php?page=funcionarios">

                        Acessar

                        <i class="bi bi-arrow-right"></i>

                    </a>

                </div>

            </div>



            <!-- Contato -->

            <div class="col-md-4">

                <div class="feature-card">

                    <div class="feature-icon">

                        <i class="bi bi-envelope"></i>

                    </div>

                    <h5>
                        Contato
                    </h5>

                    <p>
                        Entre em contato conosco
                        através do formulário do sistema.
                    </p>

                    <a href="index.php?page=contato">

                        Acessar

                        <i class="bi bi-arrow-right"></i>

                    </a>

                </div>

            </div>


        </div>

    </div>

</section>



<!-- =====================================
     CHAMADA PARA LOGIN
     ===================================== -->

<section class="access-section">

    <div class="container">

        <div class="access-card">

            <div>

                <span>
                    ACESSO ADMINISTRATIVO
                </span>

                <h2>
                    Pronto para começar?
                </h2>

                <p>
                    Acesse o sistema e gerencie
                    seus cadastros.
                </p>

            </div>


            <a
                href="index.php?page=login"
                class="btn-access"
            >

                <i class="bi bi-box-arrow-in-right"></i>

                Entrar no sistema

            </a>

        </div>

    </div>

</section>


</main>

<!-- =========================================
     RODAPÉ
     ========================================= -->

<footer class="landing-footer">

<div class="container">

    <div class="footer-content">


        <div>

            <strong>

                <i class="bi bi-grid-1x2-fill"></i>

                Sistema de Cadastros

            </strong>

            <p>
                Sistema de gerenciamento de cadastros.
            </p>

        </div>


        <div>

            <span>
                Desenvolvido com PHP • MVC • Bootstrap
            </span>

        </div>

    </div>

</div>


</footer>

<!-- Bootstrap JS -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>
