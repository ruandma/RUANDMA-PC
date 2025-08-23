<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- SEO -->
    <meta name="description" content="RUANDMA PC - Os melhores computadores para gamers, editores e profissionais de tecnologia.">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph (Redes sociais) -->
    <meta property="og:title" content="RUANDMA PC">
    <meta property="og:description" content="Os melhores computadores para gamers e profissionais!">
    <meta property="og:image" content="../imagens/logomarca/logomarca.png">
    <meta property="og:url" content="https://ruandmapc.com/loja">   
    <meta property="og:type" content="website">
    
    <!-- Ícones -->
    <link rel="icon" href="../imagens/logomarca/logomarca.png" type="image/png">
    
    <!-- Font Awesome (Ícones) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">   
    
    <!-- CSS Global -->
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/contato.css">

    <!-- CSS Específico da Página -->
    <link rel="stylesheet" href="../css/loja.css">

    <title>LOJA - RUANDMA PC</title>
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
    <!-- Título Centralizado -->
    <section class="titulo-loja" aria-labelledby="pagina-titulo">
        <h2 id="pagina-titulo">O que você está procurando?</h2>
    </section>

<form class="barra-pesquisa" role="search" aria-label="Pesquisar produtos">
    <div>
        <input type="search" id="pesquisa-produto" name="pesquisa-produto" placeholder="Buscar produto..." 
            style="width: 100%; padding: 10px 40px 10px 10px; border-radius: 5px; border: 1px solid #ccc;">
        <button type="submit" 
            style="position: absolute; right: 0; top: 0; height: 100%; width: 40px; border: none; background: transparent; color: #007bff; cursor: pointer;">
            <i class="fas fa-search"></i>
        </button>
    </div>
</form>
    
    <!-- Conteúdo Principal -->
    <main class="loja-container">
        <!-- Barra lateral de categorias (Lado esquerdo) -->
        <div class="categorias" role="region" aria-label="Filtrar por Categoria">
            <ul>
                <li><button class="categoria-btn">Placa-mãe</button></li>
                <li><button class="categoria-btn">Processador</button></li>
                <li><button class="categoria-btn">Placa de Vídeo</button></li>
                <li><button class="categoria-btn">Memória RAM</button></li>
                <li><button class="categoria-btn">Cooler</button></li>
                <li><button class="categoria-btn">Cooler de Processador</button></li>
                <li><button class="categoria-btn">Gabinete</button></li>
                <li><button class="categoria-btn">Fonte</button></li>
                <li><button class="categoria-btn">Armazenamento</button></li>
                <li><button class="categoria-btn">Wi-Fi e Bluetooth</button></li>
                <button class="categoria-btn" id="acessorio-btn" aria-controls="dualshock4">Acessório</button>
                <li><button class="categoria-btn">Monitor</button></li>
                <li><button class="categoria-btn">Kits</button></li>
            </ul>
        </div>

        <!-- Área de Produtos -->
<div class="produto-container" role="region" aria-label="Produtos">
    <div class="dualshock4" id="dualshock4" style="display: none;">
        <!-- Imagem do produto clicável -->
        <img src="/RUANDMA-PC/imagens/acessorios/dualshock-4.webp" alt="DualShock 4" class="product-image" id="dualshock">

        <h3>DualShock 4</h3>
        <p class="preco">R$ 120,00</p>
        <button class="descricao-btn">Descrição ↓</button>

        <!-- Descrição e botões dentro do .dualshock4 -->
        <div class="descricao-produto">
            <p>O controle sem fio DualShock 4 oferece uma experiência de jogo precisa, com design ergonômico e sensores avançados.</p>
        </div>
        <div class="botoes-compra">
            <button class="add-to-cart" 
                data-product-id="1" 
                data-product-name="DualShock 4" 
                data-product-price="120.00" 
                data-product-image="/RUANDMA-PC/imagens/acessorios/dualshock-4.webp">
                <i class="fas fa-shopping-cart cart-fly-icon"></i>
                Adicionar ao Carrinho
            </button>
            <button class="buy-now" 
                data-product-id="1" 
                data-product-name="DualShock 4" 
                data-product-price="120.00" 
                data-product-image="/RUANDMA-PC/imagens/acessorios/dualshock-4.webp">
                <i class="fas fa-money-bill-wave"></i>
                Comprar Agora
            </button>
        </div>
    </div>
</div>

<!-- Modal de imagem -->
<div id="imageModal" class="produto-popup">
    <span class="close-btn">&times;</span>
    <div class="popup-content">
        <img id="modalImg" src="" alt="Imagem ampliada do produto">
    </div>
</div>

    </main>

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