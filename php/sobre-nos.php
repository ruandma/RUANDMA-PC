<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- SEO -->
    <meta name="description" content="RUANDMA PC - Os melhores computadores para gamers, editores e profissionais de tecnologia.">
    <meta name="keywords" content="PC Gamer, Hardware, Tecnologia, Computadores, Setup Gamer, Workstation, PC para edição, Upgrade de PC">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph (Redes sociais) -->
    <meta property="og:title" content="RUANDMA PC">
    <meta property="og:description" content="Os melhores computadores para gamers e profissionais!">
    <meta property="og:image" content="../imagens/logomarca/logomarca.png">
    <meta property="og:url" content="https://ruandmapc.com/sobre-nos">
    <meta property="og:type" content="website">
    
    <!-- Ícones -->
    <link rel="icon" href="../imagens/logomarca/logomarca.png" type="image/png">
    
    <!-- Font Awesome (Ícones) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <!-- CSS Global -->
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/loja.css">
    <link rel="stylesheet" href="../css/contato.css">
    
    <!-- CSS Específico da Página -->
    <link rel="stylesheet" href="../css/sobre-nos.css">
    
    <title>SOBRE NÓS - RUANDMA PC</title>
</head>
<body>
        <?php session_start(); ?>

<!-- Header -->
<header role="banner">
    <nav role="navigation" aria-label="Menu principal">
        <!-- Logo e Carrinho -->
        <div class="logo" role="button" aria-label="Abrir carrinho" tabindex="0">
            <img src="../imagens/logomarca/logomarca.png" alt="RUANDMA PC">
            <div class="cart-count" id="cart-count">0</div>
        </div>

        <!-- Menu de navegação principal -->
        <ul class="nav-links">
            <li><a href="/RUANDMA-PC/index.php" aria-current="page" aria-label="Ir para a página inicial">Início</a></li>
            <li><a href="/RUANDMA-PC/php/loja.php" aria-label="Visitar nossa loja">Loja</a></li>
            <li><a href="/RUANDMA-PC/php/sobre-nos.php" aria-label="Saber mais sobre nós">Sobre nós</a></li>
            <li><a href="/RUANDMA-PC/php/contato.php" aria-label="Entrar em contato conosco">Contato</a></li>
        </ul>

        <!-- Perfil do usuário -->
        <div class="profile" style="position: relative;">
            <img src="../imagens/perfil/perfil.png" alt="Foto de Perfil" class="profile-img" onerror="this.src='../imagens/perfil/perfil.png'" tabindex="0">

            <!-- Dropdown do perfil -->
            <div class="profile-dropdown" id="profile-dropdown" style="display: none;">
                <ul>
                    <?php if (isset($_SESSION['usuario_id'])): ?>
                        <li><a href="/RUANDMA-PC/php/minha-conta.php" class="profile-action"><i class="fas fa-user"></i> Minha Conta</a></li>
                        <li><a href="/RUANDMA-PC/php/historico.php" class="profile-action"><i class="fas fa-history"></i> Histórico</a></li>
                        <li><a href="/RUANDMA-PC/php/logout.php" class="profile-action"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
                    <?php else: ?>
                        <li><a href="/RUANDMA-PC/php/registrar.php" class="profile-action"><i class="fas fa-user-plus"></i> Registrar</a></li>
                        <li><a href="/RUANDMA-PC/php/entrar.php" class="profile-action"><i class="fas fa-sign-in-alt"></i> Entrar</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

        <!-- Botão Hamburger para mobile -->
        <div class="menu-toggle" id="menu-toggle" aria-label="Abrir menu" aria-expanded="false" tabindex="0">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </nav>
</header>

<!-- Seção Sobre a Empresa -->
<section class="sobre-nos">
    <div class="container">
        <h2><i class="fas fa-building"></i> Sobre a RUANDMA PC</h2>
        <p class="intro">
            Bem-vindo à <strong>RUANDMA PC</strong>! Somos movidos pela paixão por tecnologia e pelo compromisso de entregar computadores de alto desempenho para gamers, criadores e profissionais exigentes.
        </p>
        <div class="sobre-grid">
            <div class="sobre-bloco">
                <h3><i class="fas fa-user-tie"></i> Nossa História</h3>
                <p>
                    Fundada no final de 2023 como um projeto acadêmico, consolidou-se desde então como uma iniciativa em constante evolução. Idealizada por <strong>Ruan de Morais Arruda</strong>, estudante de Análise e Desenvolvimento de Sistemas no <strong>Senac-DF</strong>, a RUANDMA PC é uma iniciativa pessoal para aprender, praticar e compartilhar soluções em tecnologia e montagem de computadores.
                </p>
            </div>
            <div class="sobre-bloco">
                <h3><i class="fas fa-bullseye"></i> Missão</h3>
                <p>
                    Proporcionar soluções de alta performance, com equipamentos de última geração, atendimento consultivo e garantia de qualidade. Nosso objetivo é potencializar a criatividade, produtividade e diversão dos nossos clientes.
                </p>
            </div>
            <div class="sobre-bloco">
                <h3><i class="fas fa-handshake"></i> Compromisso</h3>
                <p>
                    Mais do que vender computadores, buscamos construir relacionamentos duradouros. Oferecemos suporte técnico especializado, atendimento humanizado e soluções sob medida para cada necessidade.
                </p>
            </div>
            <div class="sobre-bloco">
                <h3><i class="fas fa-lightbulb"></i> Visão</h3>
                <p>
                    Ser referência nacional em inovação, excelência e confiança no mercado de computadores, entregando tecnologia que impulsiona sonhos e conquistas.
                </p>
            </div>
        </div>
        <div class="sobre-valores">
            <h3><i class="fas fa-star"></i> Nossos Valores</h3>
            <ul>
                <li>Inovação constante</li>
                <li>Ética e transparência</li>
                <li>Respeito ao cliente</li>
                <li>Paixão por tecnologia</li>
                <li>Compromisso com resultados</li>
            </ul>
        </div>
    </div>
</section>
    
<!-- Sidebar (Carrinho) -->
<div class="sidebar" id="cart-sidebar" aria-hidden="true">
    <!-- Cabeçalho -->
    <div class="sidebar-header">
        <h3>Carrinho de Compras</h3>
        <button id="close-btn" class="close-btn" aria-label="Fechar carrinho">✖</button>
    </div>

    <!-- Ações do Carrinho -->
    <div class="cart-actions">
        <button class="cart-btn clear-cart-btn" id="clear-cart-btn" aria-label="Limpar todos os itens do carrinho">
            Limpar Carrinho
        </button>
    </div>

    <!-- Itens do Carrinho -->
    <div id="cart-items" class="cart-items" aria-live="polite"></div>

    <!-- Total -->
    <div class="cart-total">
        <p>Total: <span id="cart-total">R$ 0,00</span></p>
    </div>

    <!-- Finalizar Compra -->
    <div class="cart-actions">
        <button class="cart-btn checkout-btn" aria-label="Finalizar compra">
            Finalizar Compra
        </button>
    </div>
</div>

    <!-- Overlay -->
    <div class="overlay" id="overlay" aria-hidden="true"></div>

    <!-- Footer -->
<footer role="contentinfo">
    <div class="footer-content">
        <ul>
            <li>&copy; 2025 RUANDMA PC - Todos os direitos reservados.</li>
            <li>CNPJ: 00.000.000/0001-00</li>
            <li>Contato: <a href="mailto:ruan.morais.arruda@gmail.com">ruan.morais.arruda@gmail.com</a></li>
            <li>
                <a href="politica-de-privacidade.pdf" download="Politica_de_Privacidade_RUANDMA_PC.pdf" class="footer-link">Política de Privacidade</a> |
                <a href="termos-de-uso.pdf" download="Termos_de_Uso_RUANDMA_PC.pdf" class="footer-link">Termos de Uso</a>
            </li>
        </ul>
    </div>
</footer>

    <!-- Scripts -->
    <script src="../js/cart.js" defer></script>
    <script src="../js/shared.js" defer></script>
</body>
</html>
